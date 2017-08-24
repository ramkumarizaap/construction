<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(COREPATH."controllers/Admin_controller.php");

class Project extends Admin_Controller
{

    protected $_project_validation_rules = array (
                 array('field' => 'first_name', 'label' => 'First Name', 'rules' => 'trim|required'),
                 array('field' => 'last_name', 'label' => 'Last Name', 'rules' => 'trim|required'),
                 array('field' => 'email', 'label' => 'Email', 'rules' => 'trim|required|valid_email'),
                 array('field' => 'se_email', 'label' => 'Email', 'rules' => 'trim|valid_email'),
                 array('field' => 'phone', 'label' => 'Phone', 'rules' => 'trim|required|numeric|max_length[12]|min_length[6]'),
                 array('field' => 'se_phone', 'label' => 'Phone', 'rules' => 'trim|numeric|max_length[12]|min_length[6]'),
                 array('field' => 'addr', 'label' => 'Address', 'rules' => 'trim|required'),
                 array('field' => 'city', 'label' => 'City', 'rules' => 'trim|required'),
                 array('field' => 'state', 'label' => 'State', 'rules' => 'trim|required'),
                 array('field' => 'country', 'label' => 'Country', 'rules' => 'trim|required'),
                 array('field' => 'zip_code', 'label' => 'Zipcode', 'rules' => 'trim|required'),
                 array('field' => 'a_c[]','label' =>'Assign Contractor','rules' => 'trim|required'),
                 array('field' => 'p_name','label' =>'Project Name','rules' => 'trim|required'),
                 array('field' => 'p_s_d','label' =>'Project Start Date','rules' => 'trim|required|callback_compareDates'),
                 array('field' => 'p_e_d','label' =>'Project End Date','rules' => 'trim|required|callback_compareDates'),
                 array('field' => 'p_addr1','label' =>'Project Address','rules' => 'trim|required'),
                 array('field' => 'p_city','label' =>'Project City','rules' => 'trim|required'),
                 array('field' => 'p_state','label' =>'Project State','rules' => 'trim|required'),
                 array('field' => 'p_zip_code','label' =>'Project Zip Code','rules' => 'trim|required'),
                 array('field' => 'r_name[]','label' =>'Room Name','rules' => 'trim|required'),
                 array('field' => 'r_no[]','label' =>'Room No','rules' => 'trim|required'),
            );


    function __construct()
    {
      parent::__construct();
      
      if(!is_logged_in())
        redirect('login');
      
      $this->load->model('projects_model');
    }    

    public function index()
    {
    	$this->layout->add_javascripts(array('listing'));

      $this->load->library('listing');
      
      $this->simple_search_fields = array('id'=>'Ticked id#','company_name' => 'Company Name','support_type'=>'Support Type','name'=>'Name','email'=>'Email','phone'=>'Phone','address'=>'Address');
      
      $this->_narrow_search_conditions = array("start_date");
      
      $str = '<a href="'.site_url('tickets/view/{id}').'" class="btn btn btn-padding yellow table-action"><i class="fa fa-edit edit"></i></a><a href="javascript:void(0);" data-original-title="Remove" data-toggle="tooltip" data-placement="top" class="table-action btn-padding btn red" onclick="delete_record(\'tickets/delete/{id}\',this);"><i class="fa fa-trash-o trash"></i></a>';        
      
      $this->listing->initialize(array('listing_action' => $str));
      
      $listing = $this->listing->get_listings('tickets_model', 'listing');
      
      $this->data['btn'] = "<a href=".site_url('project/add')." class='btn green'>Add New Project <i class='fa fa-plus'></i></a>";
      
      if($this->input->is_ajax_request())
        $this->_ajax_output(array('listing' => $listing), TRUE);
      
      $this->data['bulk_actions'] = array('' => 'select', 'delete' => 'Delete');
      
      $this->data['simple_search_fields'] = $this->simple_search_fields;
      
      $this->data['search_conditions'] = $this->session->userdata($this->namespace.'_search_conditions');
      
      $this->data['per_page'] = $this->listing->_get_per_page();
      
      $this->data['per_page_options'] = array_combine($this->listing->_get_per_page_options(), $this->listing->_get_per_page_options());
      
      $this->data['search_bar'] = $this->load->view('listing/search_bar', $this->data, TRUE);
      
      $this->data['listing'] = $listing;
      
      $this->data['grid'] = $this->load->view('listing/view', $this->data, TRUE);
    }


    public function add($edit_id ='')
    {

      $user_sess_data = $this->session->userdata("user_data");

      $form = $this->input->post();

      $this->layout->add_stylesheets(array('components.min','bootstrap-datepicker3.min'));
      
      $this->layout->add_javascripts(array('jquery.repeater','bootstrap-datepicker.min','app.min','form-repeater.min','components-date-time-pickers.min'));

      $this->data['contractor_info'] = $this->projects_model->get_data("contractor",$where=array('active'=>'Y'),'id,company_name')->result_array();
      
      $this->data['work_items'] = $this->projects_model->get_data("work_items",$where=array('active'=>'Y'),'id,work_name')->result_array();

      $this->data['country'] = $this->projects_model->get_data("countries",$where=array(),'code,name')->result_array();

      $this->data['state'] = $this->projects_model->get_data("states",$where=array(),'state_code,state_name')->result_array();
     
      $this->form_validation->set_rules($this->_project_validation_rules);

      $milestone_group = isset($form['group-a'])?$form['group-a']:'';
      
      if(!empty($milestone_group))
      {

          foreach($milestone_group as $key => $value)
          {
               $this->form_validation->set_rules('group-a['. $key .'][m_name]', 'Milestone Name', 'trim|required');
               $this->form_validation->set_rules('group-a['. $key .'][m_s_d]', 'Milestone Start Date', 'trim|required|callback_checkMilestoneStartDate');
               $this->form_validation->set_rules('group-a['. $key .'][m_e_d]', 'Milestone End Date', 'trim|required|callback_checkMilestoneEndDate');
               $this->form_validation->set_rules('group-a['. $key .'][m_work_items]', 'Milestone Work Items', 'trim|required');
               $this->form_validation->set_rules('group-a['. $key .'][m_cnt]', 'Milestone Contractor', 'trim|required');  

          }

      }


      $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');


      if ($this->form_validation->run())
      {
        

        $project_dtl = $client_dtl =$client_sec_dtl= $milestone_dtl = $room_dtl =$project_cnt_dtl= array();

        /* Insert Client Contact */
        
        $client_dtl['first_name'] = $form['first_name'];
        
        $client_dtl['last_name'] = $form['last_name'];
        
        $client_dtl['email'] = $form['email'];
        
        $client_dtl['phone'] = $form['phone'];  
        
        $client_dtl['address'] = $form['addr'];
        
        $client_dtl['city'] = $form['city'];
        
        $client_dtl['state'] = $form['state']; 
        
        $client_dtl['country'] = $form['country'];
        
        $client_dtl['zip'] = $form['zip_code'];
        
        $client_dtl['created_id'] = $user_sess_data['id'];
        
        $client_dtl['created_date'] = date("Y-m-d H:i:s");

        $client_info_id = $this->projects_model->insert($client_dtl,"client_contacts"); 

        $client_sec_dtl['first_name'] = $form['se_first_name'];
        
        $client_sec_dtl['last_name'] = $form['se_last_name'];
        
        $client_sec_dtl['email'] = $form['se_email'];
        
        $client_sec_dtl['phone'] = $form['se_phone'];  
        
        $client_sec_dtl['address'] = $form['se_addr'];
        
        $client_sec_dtl['city'] = $form['se_city'];
        
        $client_sec_dtl['state'] = $form['se_state']; 
        
        $client_sec_dtl['country'] = $form['se_country'];
        
        $client_sec_dtl['zip'] = $form['se_zip_code'];
        
        $client_sec_dtl['created_id'] = $client_info_id;
        
        $client_sec_dtl['created_date'] = date("Y-m-d H:i:s");

        $client_sec_info_id = $this->projects_model->insert($client_sec_dtl,"client_contacts");

        /* Insert Project Details */

        $project_dtl['project_name'] = $form['p_name'];
        
        $project_dtl['start_date'] = date("Y-m-d",strtotime($form['p_s_d']));
        
        $project_dtl['complete_date'] = date("Y-m-d",strtotime($form['p_e_d']));
        
        $project_dtl['client_contact1'] =$client_info_id;
        
        $project_dtl['client_contact2'] = $client_sec_info_id;
        
        $project_dtl['project_address1'] = $form['p_addr1'];
        
        $project_dtl['project_address2'] = $form['p_addr2'];
        
        $project_dtl['project_city'] = $form['p_city'];
        
        $project_dtl['project_state'] = $form['p_state'];
        
        $project_dtl['project_zip_code'] = $form['p_zip_code'];
        
        $project_dtl['created_id'] = $client_info_id;
        
        $project_dtl['created_date'] = date("Y-m-d H:i:s");

        $project_id = $this->projects_model->insert($project_dtl,"project");

        /* Insert Project Contractor */

        $project_cnt_dtl['project_id'] = $project_id;

        $project_cnt_dtl['contractor_id'] = implode(",",$form['a_c']);

        $project_cnt_id = $this->projects_model->insert($project_cnt_dtl,"project_contractors");

        /* Insert Project Milestone */

        foreach($form['group-a'] as $key=>$value)
        {
          $milestone_dtl['project_id'] = $project_id;

          $milestone_dtl['name'] = $value['m_name'];
          
          $milestone_dtl['description'] = $value['m_desc'];
          
          $milestone_dtl['start_date'] = date("Y-m-d",strtotime($value['m_s_d']));
          
          $milestone_dtl['end_date'] = date("Y-m-d",strtotime($value['m_e_d']));
          
          $milestone_dtl['work_items'] = implode(",",$value['m_work_items']);
          
          $milestone_dtl['status'] = "PENDING";
          
          $milestone_dtl['contractor_id'] = $value['m_cnt'];

          $this->projects_model->insert($milestone_dtl,"project_milestones");

          $this->send_mail($milestone_dtl,$form);

        }

        redirect("project");

      }
      
      if($edit_id)
      {
        $ins_data['updated_id']       = get_user_data()['id'];
          
        $ins_data['updated_date'] = date('Y-m-d H:i:s'); 
          
        $this->contractor_model->update(array("id" => $edit_id),$ins_data);
          
        $msg = 'Contractor updated successfully';
      }

      else if($this->input->post()) 
      { 
        $this->data['editdata'] = $_POST;
        
        $this->data['title']     = "ADD PROJECT";
        
        $this->data['crumb']   = "Add";
        
        $this->data['editdata']['id'] = $edit_id != ''?$edit_id:'';
      }

      else
      {  
        $this->data['title']     = "ADD PROJECTS";
        
        $this->data['crumb']   = "Add";
        
        $this->data['editdata'] = array("first_name" => "","last_name"=>"","email"=>"","phone"=>"","addr"=>"","city"=>"","state"=>"","country"=>"","zip_code"=>"","se_first_name" => "","se_last_name"=>"","se_email"=>"","se_phone"=>"","se_addr"=>"","se_city"=>"","se_state"=>"","se_country"=>"","se_zip_code"=>"","a_c"=>"","p_name"=>"","p_s_d"=>"","p_e_d"=>"","p_addr1"=>"","p_addr2"=>"","p_city"=>"","p_state"=>"","p_zip_code"=>"","r_name"=>"","r_no"=>"","r_desc_dtl"=>"","m_name"=>"","m_cnt"=>"","m_s_d"=>"","m_e_d"=>"","m_desc"=>"");  
      }
      
      $this->layout->view('/frontend/project/add');
    }


    function send_mail($milestone_dtl,$form)
    {

      $this->load->library('email');

      $contractor_dtl = $this->projects_model->get_data("contractor",array('id'=>$milestone_dtl['contractor_id']),'email1,email2')->row_array();


      $work_items_dtl = $this->db->query("select id,work_name from work_items where id in (".$milestone_dtl['work_items'].")")->result_array();
      
      $work_item_arr = array();

      if(count($work_items_dtl))
      {
        foreach ($work_items_dtl as $key => $value) 
        {
          $work_item_arr[] = $value['work_name'];
        }

        $work_item_final_list = implode(',',$work_item_arr); 
      }

      $cust_msg  =  'Hello,<br/> . <br/><br/> Your Project Milestone Information Details Listed Below.Please check it.<br/>';
      
      $cust_msg .=  '<h3>Project Details:</h3><br>';

      $cust_msg .=  '<b>Project Name:</b> '.$form['p_name'].'<br>';

      $cust_msg .=  '<b>Project Start Date:</b> '.$form['p_s_d'].'<br>';

      $cust_msg .=  '<b>Project End Date:</b> '.$form['p_e_d'].'<br>';

      $cust_msg .=  '<h3>Project Location:</h3><br>';

      $cust_msg .=  '<b>Project Address1:</b> '.$form['p_addr1'].'<br>';

      $cust_msg .=  '<b>Project Address2:</b> '.$form['p_addr2'].'<br>';

      $cust_msg .=  '<b>Project City:</b> '.$form['p_city'].'<br>';

      $cust_msg .=  '<b>Project State:</b> '.$form['p_state'].'<br>';

      $cust_msg .=  '<b>Project Zipcode:</b> '.$form['p_zip_code'].'<br>';

      $cust_msg .=  '<h3>Project Milestone Details:</h3><br>';

      $cust_msg .=  '<b>Milestone Name:</b> '.$milestone_dtl['name'].'<br>';

      $cust_msg .=  '<b>Milestone Start Date:</b> '.$milestone_dtl['start_date'].'<br>';

      $cust_msg .=  '<b>Milestone End Date:</b> '.$milestone_dtl['end_date'].'<br>';

      $cust_msg .=  '<b>Milestone Work Items:</b> '.$work_item_final_list.'<br>';

      $cust_msg .=  'Best Regards, <br/> Construction Team.';
            
      $this->email->set_mailtype("html");  
      
      $this->email->from('gavaskarizaap@gmail.com', 'Construction');
      
      $this->email->to($contractor_dtl['email1']);
      
      $this->email->cc($contractor_dtl['email2']);
      
      $this->email->subject('Project Milestone Information');
      
      $this->email->message($cust_msg);
      
      $this->email->send();

      return TRUE;
    }

    function compareDates()
    {
      
      $startDate = strtotime($this->input->post('p_s_d'));
      
      $endDate = strtotime($this->input->post('p_e_d'));
      
      if($startDate > $endDate)
      {
        $this->form_validation->set_message('compareDates','Your start date must be earlier than your end date');
        return false;
      }
    }

    function checkMilestoneStartDate($msd)
    {
      $msd = strtotime($msd);

      $p_s_d = strtotime($this->input->post('p_s_d'));

      $p_e_d = strtotime($this->input->post('p_e_d'));

       //echo $this->input->post('p_s_d')."hi".$this->input->post('p_e_d')."how".$msd;die;

      //echo $p_s_d."hi".$p_e_d."how".$msd;die;

      if(($msd < $p_s_d) || ($msd >$p_e_d))
      {
        $this->form_validation->set_message('checkMilestoneStartDate','Your Milestone start date must be within the Project Date');
        return false;
      }
    }

    function checkMilestoneEndDate($med)
    {
        
      $med = strtotime($med);

      $p_s_d = strtotime($this->input->post('p_s_d'));

      $p_e_d = strtotime($this->input->post('p_e_d'));

      if(($med < $p_s_d) || ($med > $p_e_d))
      {
        $this->form_validation->set_message('checkMilestoneEndDate','Your Milestone end date must be within the Project Date');
        return false;
      }
    }
}
?>