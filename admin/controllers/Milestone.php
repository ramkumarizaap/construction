<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(COREPATH."controllers/Admin_controller.php");

class Milestone extends Admin_Controller
{

	function __construct()
  {
    parent::__construct();
    
    if(!is_logged_in())
      redirect('login');

    $this->load->model('milestone_model');
  } 
  public function index()
  {
    $this->layout->add_javascripts(array('listing'));
    $this->load->library('listing');
    $this->simple_search_fields = array('project_name' => 'Project Name','name'=>'Milestone Name','start_date'=>'Start Date','end_date'=>'End Date','first_name'=>'Contractor Name','status'=>"Status");
    $this->_narrow_search_conditions = array("start_date");
    $str = '<a href="'.site_url('milestone/view/{id}').'" class="btn btn-info"><i class="fa fa-eye"></i> View</a>';    
    $this->listing->initialize(array('listing_action' => $str));
    $listing = $this->listing->get_listings('milestone_model', 'listing');
    if($this->input->is_ajax_request())
      $this->_ajax_output(array('listing' => $listing), TRUE);
    $this->data['bulk_actions'] = array('' => 'select', 'delete' => 'Delete');
    $this->data['simple_search_fields'] = $this->simple_search_fields;
    $this->data['search_conditions'] = $this->session->userdata($this->namespace.'_search_conditions');
    $this->data['per_page'] = $this->listing->_get_per_page();
    $this->data['per_page_options']=array_combine($this->listing->_get_per_page_options(), $this->listing->_get_per_page_options());
    $this->data['search_bar'] = $this->load->view('listing/search_bar', $this->data, TRUE);
    $this->data['listing'] = $listing;
    $this->data['grid'] = $this->load->view('listing/view', $this->data, TRUE);
    $this->layout->view('frontend/milestone/index');
  }
  public function view($id='')
  {
    if($id)
    {
      $this->data['milestone'] = $this->milestone_model->get_milestone_by_id($id);
      $this->layout->view('frontend/milestone/view');
    }
  }
  public function change_status()
  {
    $id = $this->input->post('id');
    $up['status'] = $this->input->post('status');
    $update = $this->milestone_model->update(array("id"=>$id),$up,"project_milestones");
    if($update)
    {
      $output['status'] = "success";
      $output['msg'] = "Status changed";
    }
    $this->_ajax_output($output,TRUE);
  }
}
?>