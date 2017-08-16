<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(COREPATH.'libraries/models/App_model.php');

class Contractor_model extends App_model
{
  function __construct()
  {
    parent::__construct();
    $this->_table = 'contractor';
  }
  
  function listing()
  {  
    
    $this->_fields = "*,IF(active='Y','Active','Inactive') as status";
    $this->db->group_by('id');

    foreach ($this->criteria as $key => $value)
    {
      if( !is_array($value) && strcmp($value, '') === 0 )
        continue;
      switch ($key)
      {
        case 'company_name':
          $this->db->like($key, $value);
        break;
        case 'first_name':
          $this->db->like($key, $value);
        break;
        case 'email1':
          $this->db->like($key, $value);
        break;
        case 'office_phone':
          $this->db->like($key, $value);
        break;
        // case 'active':
        //   $this->db->like($key, $value);
        // break;
      }
    }
    return parent::listing();
  }


}
?>