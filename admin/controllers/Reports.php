<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(COREPATH."controllers/Admin_controller.php");

class Reports extends Admin_Controller
{
	function __construct()
  {
    parent::__construct();
    
    if(!is_logged_in())
      redirect('login');
    $this->user = get_user_data();
    $this->load->model('reports_model');
  }
  public function index()
  {
  	$this->layout->add_stylesheets(array('components.min','bootstrap-datepicker3.min'));
  	$this->layout->add_javascripts(array('listing','bootstrap-datepicker.min','app.min','components-date-time-pickers.min'));
    $this->load->library('listing');
    $this->simple_search_fields = array();
    $this->_narrow_search_conditions = array("project_name","manager","super","status","start_date","end_date");
    $str = '<a href="javascript:;" class="details-control btn btn-info"><i class="fa fa-eye"></i> View Milestones</a>';
    if($this->user['role']==1)
    $this->listing->initialize(array('listing_action' => $str));
    $listing = $this->listing->get_listings('reports_model', 'listing');
    if($this->input->is_ajax_request())
      $this->_ajax_output(array('listing' => $listing), TRUE);
    $this->data['bulk_actions'] = array('' => 'select', 'delete' => 'Delete');
    $this->data['simple_search_fields'] = $this->simple_search_fields;
    $this->data['search_conditions'] = $this->session->userdata($this->namespace.'_search_conditions');
    $this->data['per_page'] = $this->listing->_get_per_page();
    $this->data['per_page_options']=array_combine($this->listing->_get_per_page_options(), $this->listing->_get_per_page_options());
    $this->data['search_bar'] = $this->load->view('frontend/reports/search_bar', $this->data, TRUE);
    $this->data['listing'] = $listing;
    $this->data['grid'] = $this->load->view('listing/view', $this->data, TRUE);
  	$this->layout->view("frontend/reports/index");
  }

  public function export_excel()
  {
    $where = array();
    if(isset($_POST['project_name']) && $_POST['project_name']!='')
      $where['a.id'] = $_POST['project_name'];
    if(isset($_POST['manager']) && $_POST['manager']!='')
      $where['a.manager'] = $_POST['manager'];
    if(isset($_POST['super']) && $_POST['super']!='')
      $where['a.superintendent'] = $_POST['super'];
    if(isset($_POST['start_date']) && $_POST['start_date']!='')
      $where['a.start_date'] = $_POST['start_date'];
    if(isset($_POST['end_date']) && $_POST['end_date']!='')
      $where['a.complete_date'] = $_POST['end_date'];
    if(isset($_POST['status']) && $_POST['status']!='')
      $where['a.status'] = $_POST['status'];
  	$this->data['projects'] = $this->reports_model->get_projects($where);
  	$this->load->view('frontend/reports/excel',$this->data);
  }
}
?>