<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(COREPATH.'libraries/models/App_model.php');

class Projects_model extends App_model
{
  function __construct()
  {
    parent::__construct();
    $this->_table = 'project';
  }
  
  function listing()
  {  
    
    $this->_fields = "*";
    $this->db->group_by('id');

    foreach ($this->criteria as $key => $value)
    {
      if( !is_array($value) && strcmp($value, '') === 0 )
        continue;
      switch ($key)
      {
        case 'id':
          $this->db->like($key, $value);
        break;
        case 'project_name':
          $this->db->like($key, $value);
        break;
        case 'start_date':
          $this->db->like($key, $value);
        break;
        case 'complete_date':
          $this->db->like($key, $value);
        break;
        case 'status':
          $this->db->like($key, $value);
        break;
      }
    }
    return parent::listing();
  }

  function get_data($table_name,$where,$field_name)
  { 
    
    if(count($where))
    {
      if($field_name!='')
        $this->db->select($field_name); 
          
      $result = $this->db->get_where($table_name,$where);
    }
    else
    {
      if($field_name!='')
        $this->db->select($field_name); 

      $result = $this->db->get($table_name);
    }
    return $result;
  }

  function get_projects($id)
  {
    $this->db->select("a.id as p_id,a.project_name as p_name,DATE_FORMAT(a.start_date,'%m/%d/%Y') as p_s_d,DATE_FORMAT(a.complete_date,'%m/%d/%Y') as p_e_d,a.blueprint as p_b_f,b.id as client_id1,b.first_name,b.last_name,b.email,b.phone,b.address as addr,b.city,b.state,b.country,b.zip as zip_code,c.id as client_id2,c.first_name as se_first_name,c.last_name as se_last_name,c.email as se_email,c.phone as se_phone,c.address as se_addr,c.city as se_city,c.state as se_state,c.country as se_country,c.zip as se_zip_code,a.project_address1 as p_addr1,a.project_address2 as p_addr2,a.project_city as p_city,a.project_state as p_state,a.project_zip_code as p_zip_code,d.contractor_id as a_c,a.manager,a.superintendent");
    $this->db->where("a.id",$id);
    $this->db->from("project a");
    $this->db->join("client_contacts b","a.client_contact1=b.id");
    $this->db->join("client_contacts c","a.client_contact2=c.id");
    $this->db->join("project_contractors d","a.id=d.project_id");
    $q = $this->db->get();
    return $q->row_array();
  }

  function get_rooms($id)
  {
    $result = array();$i=0;
    $this->db->where("project_id",$id);
    $q = $this->db->get("rooms");
    foreach ($q->result_array() as $key => $value)
    {
      $result['r_id'][$i] = $value['id'];
      $result['r_name'][$i] = $value['room_name'];
      $result['r_no'][$i] = $value['room_no'];
      $result['r_desc_dtl'][$i] = $value['room_desc'];
      $i++;
    }
    return $result;
  }
}
?>