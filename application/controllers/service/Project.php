<?php if(!defined("BASEPATH")) exit("No direct script access allowed");

require_once(COREPATH."libraries/REST_Controller.php");

class Project extends REST_Controller {
	
	
    function __construct()
    {
    	parent::__construct();
        $this->load->model('api_model');
        
    }

    public function list_get()
	{

		try
		{
			$user_data = array();

			$contid 		= $this->get('id');

			if( strcmp('', trim($contid) ) === 0)
				throw new Exception("Required fields are missing in your request");
				
			$user_data['data'] = $this->api_model->contractor_projects($contid);

			$user_data['message'] = "Login Successfully";
			$user_data['status'] = 'SUCCESS';
		}
		catch( Exception $e)
		{
			$user_data['message'] = $e->getMessage();
			$user_data['status'] = 'ERROR';
		}

		$this->response( $user_data, 200);

	}

	
}
?>
