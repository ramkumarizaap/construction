<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(COREPATH.'libraries/models/App_model.php');

class Reports_model extends App_model
{
  function __construct()
  {
    parent::__construct();
    $this->_table='';
  }
  function listing()
  {  
    
    $this->_fields = "a.*,CONCAT(a.project_address1,' ',a.project_address2,' ',a.project_city,' ',a.project_state,' ',a.project_zip_code) as project_address,b.first_name as manager,c.first_name as super";
    $this->db->from("project a");
    $this->db->join("admin_users b","a.manager=b.id");
    $this->db->join("admin_users c","a.superintendent=c.id");
    $this->db->group_by('a.id');

    foreach ($this->criteria as $key => $value)
    {
      if( !is_array($value) && strcmp($value, '') === 0 )
        continue;
      switch ($key)
      {
        case 'project_name':
          $this->db->like("a.id", $value);
        break;
        case 'manager':
          $this->db->like("a.manager", $value);
        break;
        case 'super':
          $this->db->like("a.superintendent", $value);
        break;
        case 'status':
          $this->db->like("a.status", $value);
        break;
        case 'start_date':
          $this->db->like("a.start_date", date("Y-m-d",strtotime($value)));
        break;
        case 'status':
          $this->db->like("a.complete_date", date("Y-m-d",strtotime($value)));
        break;
        // case 'active':
        //   $this->db->like($key, $value);
        // break;
      }
    }
    return parent::listing();
  }
  public function get_projects()
  {
    $this->db->select("a.*,b.first_name as manager,c.first_name as super");
    $this->db->from("project a");
    $this->db->join("admin_users b","a.manager=b.id");
    $this->db->join("admin_users c","a.superintendent=c.id");
    $q = $this->db->get();
    return $q->result_array();
  }
}
?>