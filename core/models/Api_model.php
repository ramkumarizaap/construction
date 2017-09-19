<?php

require_once(COREPATH."libraries/models/App_model.php");
class Api_model extends App_Model {
    
    
    function __construct()
    {
        parent::__construct();
       
    }
   
	function login($name = "",$password = "")
	{
		$where=array('username'=>$name,'password'=>md5($password));
		
		$this->db->select("id,CONCAT(first_name,' ',last_name) as name,company_name,active,office_phone,cell_phone,email1,address1,city,state,zip",FALSE);
		$this->db->from('contractor');
		$this->db->where($where);

		$user = $this->db->get()->row_array();

		return $user;
		
	}

	function contractor_projects($id)
	{
		
		$this->db->select("p.id,p.project_name,p.blueprint,p.status,CONCAT(project_address1,',',project_address2,',',project_city) as address ",FALSE);
		$this->db->from('project p');
		$this->db->join('project_contractors pc','p.id=pc.project_id');
		$this->db->where("FIND_IN_SET('$id',pc.contractor_id) !=",0);
		$this->db->group_by("p.id");

		$user = $this->db->get()->result_array();

		return $user;
		
	}
    
}
?>
