<?php if(!defined("BASEPATH")) exit("No direct script access allowed");

require_once(COREPATH."libraries/REST_Controller.php");

class User extends REST_Controller {
	
	
    function __construct()
    {

    	parent::__construct();

        $this->load->model('api_model');
        $key  = $this->get('X-APP-KEY');
        
    }

    public function login_post()
	{

		$user_data = array();
		try
		{
			$name 		= 'saravana90';
			$password 	= 'sara123';

			if( strcmp('', trim($name) ) === 0 || strcmp('', trim($password) ) === 0 )
				throw new Exception("Required fields are missing in your request");
				

			$user_data = $this->api_model->login( $name, $password );

			if( !is_array($user_data) || !count($user_data) )
			 throw new Exception("The Username or Password is invalid .");
			
			if( $user_data['active'] == 'N' )
			 throw new Exception("The user account has been blocked or Inactive. Please try after some time or contact administrator to resolve.");


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
