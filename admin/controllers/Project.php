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
                 array('field' => 'm_s_d[]','label' =>'Milestone Start Date','rules' => 'trim|callback_compareDates'),
                 array('field' => 'm_e_d[]','label' =>'Milestone End Date','rules' => 'trim|callback_compareDates'),
                 array('field' => 'p_addr1','label' =>'Project Address','rules' => 'trim|required'),
                 array('field' => 'p_city','label' =>'Project City','rules' => 'trim|required'),
                 array('field' => 'p_state','label' =>'Project State','rules' => 'trim|required'),
                 array('field' => 'p_zip_code','label' =>'Project Zip Code','rules' => 'trim|required')
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

      $this->layout->add_stylesheets(array('components.min','bootstrap-datepicker3.min'));
      
      $this->layout->add_javascripts(array('jquery.repeater','bootstrap-datepicker.min','app.min','form-repeater.min','components-date-time-pickers.min'));

      $this->data['contractor_info'] = $this->projects_model->get_data("contractor",$where=array('active'=>'Y'),'id,company_name')->result_array();
      
      $this->data['work_items'] = $this->projects_model->get_data("work_items",$where=array('active'=>'Y'),'id,work_name')->result_array();

      $this->data['country'] = $this->projects_model->get_data("countries",$where=array(),'code,name')->result_array();

      $this->data['state'] = $this->projects_model->get_data("states",$where=array(),'state_code,state_name')->result_array();
     
      $this->form_validation->set_rules($this->_project_validation_rules);
      
      $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

      if ($this->form_validation->run())
      {
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
          $this->data['editdata'] = array("first_name" => "","last_name"=>"","email"=>"","phone"=>"","addr"=>"","city"=>"","state"=>"","country"=>"","zip_code"=>"","se_first_name" => "","se_last_name"=>"","se_email"=>"","se_phone"=>"","se_addr"=>"","se_city"=>"","se_state"=>"","se_country"=>"","se_zip_code"=>"","a_c"=>"","p_name"=>"","p_s_d"=>"","p_e_d"=>"","p_addr1"=>"","p_addr2"=>"","p_city"=>"","p_state"=>"","p_zip_code"=>"","r_name"=>"","r_no"=>"","r_desc"=>"","m_name"=>"","m_cnt"=>"","m_s_d"=>"","m_e_d"=>"","m_desc"=>"");  
              
        }
        
        

      $this->layout->view('/frontend/project/add');
    }

    public function view($edit_id = 0)
    {
      try
      {
        if($this->input->post('edit_id'))            
          $edit_id = $this->input->post('edit_id');
        $this->form_validation->set_rules('status','Status','trim|required');
        $this->form_validation->set_error_delimiters('', '');
        if ($this->form_validation->run())
        {
          $ins_data= array();
          $ins_data['status']      = $this->input->post('status');
          $this->tickets_model->update(array('id'=>$edit_id), $ins_data);
          $this->session->set_flashdata('success_msg','Status updated successfully',TRUE);
          redirect('tickets');                
        }            
      }    
      catch (Exception $e)
      {
        $output['status']   = 'error';
        $output['message']  = $e->getMessage();                
      }
      $this->data['editdata'] = $this->tickets_model->get_edit_record($edit_id);
      $this->layout->view('frontend/tickets/view');   
    }


    function delete($del_id)
    {
      $access_data = $this->tickets_model->get_where(array("id"=>$del_id),'id')->row_array();
      $output=array();
      if(count($access_data) > 0)
      {
        $this->tickets_model->delete(array("id"=>$del_id));
        $output['message'] ="Record deleted successfuly.";
        $output['status']  = "success";
        
      }
      else
      {
        $output['message'] ="This record not matched by Customer.";
        $output['status']  = "error";
      }
      $this->_ajax_output($output, TRUE);            
    }

    function export(){

        try
        {
            $filename = 'Tickets.xls';

            //header('Content-type: application/vnd.ms-excel');
            //header('Content-Disposition: attachment; filename='.$filename);

            $result = $this->tickets_model->get_report();

            $str = '<table><tr>';

            $columns = array('Ticket id#','Created Date','Company Name','Customer_name','Email','Phone','Address','Support Type','Ticket status','Description');


            foreach($columns as $key) {
                $key = ucwords($key);
                $str .= '<th>'.$key.'</th>';
            }

            $str .= '</tr>';

            print_r($result);exit;

            foreach($result as $ke => $res)
            {
                 $str .= '<tr>';
                 $str .= '<td>'.$res['id'].'</td>';
                 $str .= '<td>'.$res['created_date'].'</td>';
                 $str .= '<td>'.$res['company_name'].'</td>';
                 $str .= '<td>'.$res['customer_name'].'</td>';
                 $str .= '<td>'.$res['email'].'</td>';
                 $str .= '<td>'.$res['phone'].'</td>';
                 $str .= '<td>'.$res['address'].'</td>';
                 $str .= '<td>'.$res['support_type'].'</td>';
                 $str .= '<td>'.$res['status'].'</td>';
                 $str .= '<td>'.$res['description'].'</td>';                   

                $str .= '</tr>';
            }

            $str .= '</table>';

           
        }
        catch (Exception $e)
        {
            $status   = 'error';
            $message  = $e->getMessage();                
        }

        echo $str;
        exit();    
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

  
}
?>