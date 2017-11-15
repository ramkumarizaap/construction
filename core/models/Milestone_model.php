<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(COREPATH.'libraries/models/App_model.php');

class Milestone_model extends App_model
{
  function __construct()
  {
    parent::__construct();
    $this->_table = 'project_milestones';
  }
  
  function listing()
  {  
    
    $this->_fields = "a.*,b.first_name as c_name,c.project_name as p_name,d.first_name as superintendent";
    $this->db->from("project_milestones a","left");
    $this->db->join("contractor b","a.contractor_id=b.id","left");
    $this->db->join("project c","a.project_id=c.id","left");
    $this->db->join("admin_users d","c.superintendent=d.id","left");
    $this->db->group_by('id');

    foreach ($this->criteria as $key => $value)
    {
      if( !is_array($value) && strcmp($value, '') === 0 )
        continue;
      switch ($key)
      {
        case 'project_name':
          $this->db->like("c.project_name", $value);
        break;
        case 'a.name':
          $this->db->like("a.name", $value);
        break;
        case 'start_date':
          $this->db->like("a.start_date", $value);
        break;
        case 'end_date':
          $this->db->like("a.start_date", $value);
        break;
        case 'first_name':
          $this->db->like("b.first_name", $value);
        break;
        case 'status':
          $this->db->like("a.status", $value);
        break;
      }
    }
    return parent::listing();
  }
  function get_milestone_by_id($id='')
  {
    $this->db->select("a.*,b.name as m_name,d.work_name as w_name,b.start_date,b.end_date,c.project_name,e.room_name");
    $this->db->from("milestone_status a");
    $this->db->join("project_milestones b","a.milestone_id=b.id","left");
    $this->db->join("project c","b.project_id=c.id","left");
    $this->db->join("work_items d","a.work_item=d.id");
    $this->db->join("rooms e","a.room_no=e.id","left");
    $this->db->where("a.milestone_id",$id);
    $this->db->group_by('a.id');
    $q = $this->db->get();
    return $q->result_array();
  }


}
?>
