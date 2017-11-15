<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(COREPATH."controllers/Admin_controller.php");

class Superintendent extends Admin_Controller
{

	protected $_super_validation_rules = array (
			          array('field' => 'first_name', 'label' => 'First Name', 'rules' => 'trim|required'),
			          array('field' => 'email', 'label' => 'Email', 'rules' => 'trim|required|valid_email'),
			          array('field' => 'phone', 'label' => 'Phone', 'rules' => 'trim|required'),
			          array('field' => 'address', 'label' => 'Address', 'rules' => 'trim|required'),
			          array('field' => 'status', 'label' => 'Enabled', 'rules' => 'trim|required')
               );

	function __construct()
  {
    parent::__construct();
    
    if(!is_logged_in())
      redirect('login');

    $this->load->model('superintendent_model');
  }

  
  public function index()
  {

  	$this->layout->add_javascripts(array('listing'));

    $this->load->library('listing');
    $this->simple_search_fields = array('first_name'=>'Name','email1'=>'Email','office_phone'=>'Phone');
    $this->_narrow_search_conditions = array("start_date");

    $str = '<a href="'.site_url('superintendent/add/{id}').'" class="btn btn btn-padding yellow table-action"><i class="fa fa-edit edit"></i></a><a href="javascript:void(0);" data-original-title="Remove" data-toggle="tooltip" data-placement="top" class="table-action btn-padding btn red" onclick="delete_record(\'superintendent/delete/{id}\',this);"><i class="fa fa-trash-o trash"></i></a>';
    
    $this->listing->initialize(array('listing_action' => $str));

    $listing = $this->listing->get_listings('superintendent_model', 'listing');
    $this->data['btn'] = "<a href=".site_url('superintendent/add')." class='btn green'>Add New Superintendent <i class='fa fa-plus'></i></a>";

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
  	$this->layout->view('/frontend/superintendent/index');
  }

  function add($edit_id =''){

       try
        {
            if($this->input->post('edit_id'))            
                $edit_id = $this->input->post('edit_id');

            $this->form_validation->set_rules('first_name','First Name','trim|required');
            $this->form_validation->set_rules('last_name','Last Name','trim|required');
            $this->form_validation->set_rules('email','Primary Email','trim|required|valid_email|callback_check_email['.$edit_id.']');
            $this->form_validation->set_rules('phone','Office Phone','trim|required');
            $this->form_validation->set_rules('address1','Address 1','trim|required');
            $this->form_validation->set_rules('address2','Address 2','trim');
            $this->form_validation->set_rules('city','City','trim|required');
            $this->form_validation->set_rules('state','State','trim|required');
            $this->form_validation->set_rules('zipcode','Zipcode','trim|required');
            $this->form_validation->set_rules('enabled','Enabled','trim|required');
            $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');                
            if ($this->form_validation->run())
            {
                $pwd = $this->input->post('password');

                $ins_data = array();
                $ins_data['first_name']   = $this->input->post('first_name');
                $ins_data['last_name']    = $this->input->post('last_name');
                $ins_data['email']       = $this->input->post('email');
                $ins_data['username']     = $this->input->post('username');
                if($pwd){
                  $ins_data['password']   = md5($pwd);
                }
                $ins_data['phone'] = $this->input->post('phone');
                $ins_data['username'] ='';
                $ins_data['password'] = '';
                $ins_data['address1']     = $this->input->post('address1');
                $ins_data['address2']     = $this->input->post('address2');
                $ins_data['city']         = $this->input->post('city');
                $ins_data['state']        = $this->input->post('state');
                $ins_data['zip']          = $this->input->post('zipcode');
                $ins_data['active']       = $this->input->post('enabled');
                $ins_data['role'] = 3;
                if($edit_id)
                {
                  // $ins_data['updated_id']   = get_user_data()['id'];
                  $ins_data['updated_date'] = date('Y-m-d H:i:s'); 
                  $this->superintendent_model->update(array("id" => $edit_id),$ins_data);
                  $msg = 'Superintendent updated successfully';
                }
                else
                {    
                  // $ins_data['created_id']   = get_user_data()['id'];
                  $ins_data['created_date'] = date('Y-m-d H:i:s'); 
                  $this->superintendent_model->insert($ins_data);
                  $msg = 'Superintendent added successfully';
                }
                $this->session->set_flashdata('success_msg',$msg,TRUE);
                redirect('superintendent');
            }    
            else
            {            
                $edit_data = array('id'=>'','username'=>'','first_name'=>'','last_name'=>'','email'=>'','phone'=>'','cell_phone'=>'','city'=>'','state'=>'','zip'=>'','address1'=>'','address2'=>'');
                $edit_data['active']        = 'Y';                    

            }

        }
        catch (Exception $e)
        {
            $this->data['status']   = 'error';
            $this->data['message']  = $e->getMessage();
                
        }

        if($edit_id)
            $edit_data =$this->superintendent_model->get_where(array("id" => $edit_id))->row_array();

        $this->data['editdata']  = $edit_data;

        $this->layout->view('frontend/superintendent/add');
   }

    function check_email($mail,$id)
    {
        $where = array();
     
        if($id)
            $where['id !='] = $id;
        $where['email'] = $mail;

        $result = $this->superintendent_model->get_where( $where)->num_rows();
     
        if ($result) {
            $this->form_validation->set_message('check_email', 'Given email already exists!');
            return FALSE;
        }
        return TRUE;
    }

    function delete($del_id)
    {
      $access_data = $this->superintendent_model->get_where(array("id"=>$del_id),'id')->row_array();     
      $output=array();
      if(count($access_data) > 0)
      {
        $this->superintendent_model->delete(array("id"=>$del_id));
        $output['message'] ="Record deleted successfuly.";
        $output['status']  = "success";
      }
      else
      {
        $output['message'] ="This record not matched by Contractor.";
        $output['status']  = "error";
      }      
      $this->_ajax_output($output, TRUE);            
    }

  
}
?>