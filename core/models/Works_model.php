<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(COREPATH.'libraries/models/App_model.php');

class Works_model extends App_model
{
  function __construct()
  {
    parent::__construct();
    $this->_table = 'work_items';
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
        case 'work_name':
          $this->db->like($key, $value);
        break;
      }
    }
    return parent::listing();
  }


}
?>