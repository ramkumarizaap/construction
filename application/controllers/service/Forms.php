<?php if(!defined("BASEPATH")) exit("No direct script access allowed");

require_once(COREPATH."libraries/REST_Controller.php");

class Forms extends REST_Controller {
    
    
    function __construct()
    {

        parent::__construct();

        $this->load->model(array('api_model'));
        $key  = $this->get('X-APP-KEY');
        
    }

    public function get_forms_get(){

        try
        {
            $client_id = $this->get('client_id');

            if(!$client_id){
                 throw new Exception("Sorry! Not a valid user");
                break;
            }

            $output = array();

            $admin_list = get_role_users(1);

            array_push($admin_list,$client_id);

            $admin_list = implode(",",$admin_list);

            $data=$this->db->query("select id,form_name from hoa_form where user_id IN(".$admin_list.") AND id NOT IN(54,55,56,57) ORDER BY form_name ASC")->result_array();

            $output = array( "status" => "success","data"=> $data); 
            
            $this->response( $output, 200);
        }
        catch( Exception $e)
        {

            $output['message'] = $e->getMessage();
            $output['status'] = 'error';

            $this->response($output,200);
        }
    
    }

    public function explore_form_get(){

        try
        {
            $form_id = $this->get('form_id');

            if(!$form_id){
                 throw new Exception("Sorry! Not a valid form");
                break;
            }

            $output = array();

            $form = $this->db->query("select id,form_name from hoa_form where id=".$form_id)->row();

            $data['form_name'] = $form->form_name;

            $data['form_id'] = $form_id;

            $data['forms'] = $this->html_form($form_id);

            $output = array( "status" => "success","data"=> $data); 
            
            $this->response( $output, 200);
        }
        catch( Exception $e)
        {
            $output['message'] = $e->getMessage();
            $output['status'] = 'error';

            $this->response($output,200);
        }
    
    }
    public function formsubmit_post()
    {
        $this->load->library('safety_forms');
        $this->load->library("pdf");
        $output = array();

        try
        {
            $form = $this->post();    

            if(!isset($form['client_id']) || !$form['client_id'])
                throw new Exception("Sorry! Not a valid user");

             if(!isset($form['form_id']) || !$form['form_id'])
                throw new Exception("Sorry! Not a valid form");

             if(!isset($form['emp_id']) || !$form['emp_id'])
                throw new Exception("Sorry! Not a valid employee");


            $emp = $this->db->query("select id,employee_name,emp_id from employee where id=".$form['emp_id'])->row();

            $data = $form['sign'];
            $file_name = "sign-".$emp->emp_id."-".$emp->id.$form['client_id'].".png";
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);

            file_put_contents("./form_sign/".$file_name, $data);

            $signpath = "form_sign/".$file_name;

            //for avoiding duplicates on other signatuures
            unset($form['sign']);

            $signpath2 = array();
            if(isset($form['second_sign']) && is_array($form['second_sign'])){

                foreach($form['second_sign'] as $key=>$value)
                {
                    if(empty($form['second_sign'][$key]))
                        continue;

                    $data = $form['second_sign'][$key];
                    $file_name2 = $key."-".$emp->emp_id."-".$emp->id.$form['client_id'].".png";
                    list($type, $data) = explode(';', $data);
                    list(, $data)      = explode(',', $data);
                    $data = base64_decode($data);

                    file_put_contents("./form_sign/".$file_name2, $data);

                    $signpath2[] = "form_sign/".$file_name2;

                    $form[$key] = $file_name2;
                }    
            }

            $photopath = '';
            $photo_file_name = '';
            
            if(isset($form['photo']) && !empty($form['photo'])){

                $photo = $form['photo'];
                list($type, $photo) = explode(';', $photo);
                list(, $photo)      = explode(',', $photo);       
                $photo = base64_decode($photo);
                $photo_file_name = "photo-".$emp->emp_id."-".$emp->id.$form['client_id'].".jpg";
                
                $image = imagecreatefromstring($photo);
                imagesavealpha($image, true);
                $width = 225;
                $height = 190;
                $new_image = imagecreatetruecolor($width, $height);
                imagecopyresampled($new_image, $image, 0, 0, 0, 0, $width, $height, imagesx($image), imagesy($image));
                imagejpeg($new_image,"./assets/images/frontend/forms/".$photo_file_name,80);
                imagedestroy($image);
                imagedestroy($new_image);
                
                $photopath = "assets/images/frontend/forms/".$photo_file_name;
            }            
            
            $form['form_client_name1'] = $emp->employee_name.'('.$emp->emp_id.')';

            $lat = (isset($form['latitude']))?$form['latitude']:'';
            $lon = (isset($form['longitude']))?$form['longitude']:'';
            $timestamp = (isset($form['timestamp']))?$form['timestamp']:'';

            $form['geo_timestamp'] = ($timestamp)?date('m/d/Y H:i a',$timestamp/1000):'';

            $location = '';
            if($lat)
                $location = getGeoAddress($lat,$lon);

             $form['geo_location'] = $location;

            $html = $this->safety_forms->create_pdf($form,$file_name,$photo_file_name);

            $pdf = $this->pdf->load();

            $pdf->setFooter("Page {PAGENO} of {nb}"); 

            $pdf->WriteHTML($html);

            $clientDirectory = $this->db->get_where('users',array('id'=>$form['client_id']),'name,email,multiple_email,email2')->row();
            
            $folder = "./members/".$clientDirectory->name."/records/".date('Y')."/";
            
            if(!is_dir($folder))
              mkdir($folder,0755,TRUE);
            
           
            $pdfpath = "./members/". $clientDirectory->name . "/records/" . date("Y")."/";

            $filename =  $emp->emp_id . " - " .$form['form_name']."-".strtotime('now').".pdf";

            $pdfpath = $pdfpath.$filename;

            $pdf->Output($pdfpath, 'F');


            //get master branch id
            $branch = $this->api_model->get_branch($form['client_id']);

            //Insert form entry with pdf
            $ins_data = array();
            $ins_data['type'] = $form['form_name'];
            $ins_data['filename'] = $filename;
            $ins_data['path'] = $pdfpath;     
            $ins_data['sub_branch_id'] = $branch['branch_id'];      
            $ins_data['client_id']     = $branch['client_id'];
            $ins_data['emp_id'] = $emp->id;
            $ins_data['geo_loc'] = $location;
            $ins_data['geo_latlng'] = ($lat)?"$lat,$lon,$timestamp":'';
            $ins_data['geo_time'] =($timestamp)?date('Y:m:d H:i:s',$timestamp/1000):'';
            $ins_data['created_date'] = date("Y-m-d H:i:s");

            $this->db->insert("forms",$ins_data);

            //unlink the signature
            @unlink('./'.$signpath);

            //unlink photo image
            if($photopath)
            @unlink('./'.$photopath);

            //unlink second sign
            if(count($signpath2))
            {
                foreach($signpath2 as $value)                
                    @unlink('./'.$value);                
            }

            $config['protocol'] = 'sendmail';
            $config['mailpath'] = '/usr/sbin/sendmail';
            $config['charset']  = 'iso-8859-1';
            $config['wordwrap'] = TRUE;
            $config['mailtype'] = "html";

            $msg =  'Hi,<br/> The '.$emp->employee_name.'('.$emp->emp_id.') submitted a <b>'.$form['form_name'].'</b> form.<br/><br/> 
                     <a href="'.site_url().$pdfpath.'" target="_blank">'.$filename.'</a>';
          
            $this->email->set_mailtype("html");  
            $this->email->from('admin@gotsafety.com', 'Gotsafety');
            $this->email->to($clientDirectory->email); //$clientDirectory->email

            if($clientDirectory->multiple_email || $clientDirectory->email2){

                $cc_email = '';

                if($clientDirectory->multiple_email)
                    $cc_email = $clientDirectory->multiple_email;

                if($clientDirectory->email2)
                    $cc_email = (($cc_email)?',':'').$clientDirectory->email2;

                if($cc_email)
                    $this->email->cc($cc_email);

            }

            $this->email->subject('Form: '.$form['form_type'].' Report is ready for viewing');
            $this->email->message($msg);
            $this->email->attach($pdfpath);
            $this->email->send();

            $output['status']   = 'success';
            $output['message']  = "Form submited successfully!";

            $this->response( $output, 200);

        }   
        catch( Exception $e)
        {

            $output['message'] = $e->getMessage();
            $output['status'] = 'error';

            $this->response($output,200);
        }
    }

    public function html_form($form_id){

        $result=$this->db->query("select field from hoa_form_fields where form_id=".$form_id." ORDER BY page ASC,sort ASC")->result_array();

        $logo = $this->api_model->get_where(array('id'=>$form_id),"form_logo,logo_pos","hoa_form")->row_array();

        $html = '';

        if(isset($logo['form_logo']) && $logo['form_logo']!=''){
            $url = base_url().'assets/images/frontend/forms/logo/'.$logo['form_logo'];

            $html .= '<div style="text-align:center;"><img style="box-shadow:none; height:auto;max-width:200px;margin:0 auto;" src="'.$url.'" /></div> ';
        }

        foreach ($result as $key => $value) 
        {
            $json =  json_decode($value['field']);
            $type = $json->type;
            switch ($type) 
            {
                case 'title-field':
                        $html .= '<h2  class="padding">'.$json->label.'</h2>'; 
                        break;

                case 'input-field':

                    $html .= '<label class="item item-input"  name="'.$json->name.'">
                                <input placeholder="'.$json->label.'" type="text" ng-model="$scope.formdata.'.$json->name.'">
                            </label>
                            <div class="spacer"></div>';
                    break;

                case 'area-field':

                    $html .= '<div id="'.$json->name.'">
                                <p>'.$json->label.'</p>
                            </div>
                            <label class="item item-input " name="'.$json->name.'">
                                <textarea placeholder="" ng-model="$scope.formdata.'.$json->name.'"></textarea>
                            </label> 
                            <div class="spacer"></div>';

                    break;

                case 'select-field':
                    
                    $html .= '<label class="item item-select" name="'.$json->name.'"><span class="input-label">'.$json->label.'</span>
                               <select ng-model="$scope.formdata.'.$json->name.'">';
                                    $option = explode(",",$json->options);
                                    foreach ($option as $id => $opt)
                                    {
                                        $html .= '<option value="'.$opt.'">'.$opt.'</option>';
                                    }
                    $html .= '</select></label> <div class="spacer"></div>';      
                    
                    break;
              
                case 'radio-field':

                    $html .= '<p>'.$json->label.'</p>';
                                $option = explode(",",$json->options);
                                foreach ($option as $id => $opt)
                                {
                                    if($opt!='')
                                        $html .= '<ion-radio  name="'.$json->name.'" value="'.$opt.'" ng-model="$scope.formdata.'.$json->name.'">'.$opt.'</ion-radio>';
                                }
                    $html .= '<div class="spacer"></div>';
                
                    break;
               
                case 'check-field':

                    $option = explode(",",$json->options);

                    if(count($option) > 1)
                        $html .= '<p>'.$json->label.'</p>';
                    $i=0;
                    foreach ($option as $id => $opt){                    
                        $html .= ' <ion-checkbox name="'.$json->name.'" ng-true-value="\''.$opt.'\'" ng-model="$scope.formdata.'.$json->name.'['.$i.']" >'.$opt.'</ion-checkbox>';
                        $i++;
                    }
                    $html .= '<div class="spacer"></div>';
               
                    break;

                case 'signature-field':

                    $html .= '<div class="sigfield">';

                    $html .= '<p><b>'.$json->label.'</p></b>';
                    
                    $html .= '<ion-scroll class="signaturepad" scroll="false" scrollbar-x="false" scrollbar-y="false"> 
                                <div class="sign-pad">
                                  <canvas id="'.$json->name.'"></canvas>
                                </div>
                            </ion-scroll>
                            <div class="button-bar custom-buton-bar">               
                                <a class="button button-clear button-small button-assertive clrbtn" title = "'.$json->name.'"> Clear  </a>
                            </div>';
                    $html .= '</div>';
                    break;   
            
                default:
                    # code...
                    break;
            }            
        }


        return $html;
    }

    public function test_get(){

         $admin_list = get_role_users(1);

         array_push($admin_list,6778);

         print_r($admin_list);

      # Call function
      //echo getGeoAddress("13.0492297", "80.1973247");
    }

}
?>
