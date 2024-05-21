<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth 
{
	//Url to re-direct to in case not authenticated
	protected $_redirect; 

	//String to use when making hash of username and password
	protected $_hash_key;

	//Var to hold username
	protected $_login;
	
	//variable for various purposes
	protected $_data;
	
	//Assign by reference the CodeIgniter object to variable $_CI that will be used instead of $this
	protected $_CI;
	
	
	
	public function __construct()
	{
	  $this->_CI =& get_instance();
	 
	  $this->_redirect = $this->_CI->config->item('base_url').'/users/';
	  $this->_hash_key = 'CodeIgniter is awesome! 28 may 2013 zetla is ok 22';
	  
	  $this->_CI->load->library('my_session');	//Initializing a session	
	  $this->_CI->load->library('encrypt');
	}
	
	public function index()
	{
		$this->_data = array();
	}//End method index
	
	/*
	*	This method authenticates values submitted by user against credentials in database 
  	*   @param	none
  	* 	@return	void
	*/
	public function login()
	{
		
		$this->_CI->load->model('users_m');
		
		// See if we have values already stored in the session
		if($this->_CI->my_session->get('hash'))
		{
		  if($this->confirm_auth())
		  {
		  	return;
		  }
		}

		// If this is a fresh login, check $_POST variables, also check that both variables contains only alphanumerical characters 
		if ( !$this->_CI->input->post('email') || !$this->_CI->input->post('password') ) //|| !ctype_alnum($_POST['login']) || !ctype_alnum($_POST['password']) )
		{
			$this->redirect();
		}
		
		
		
		$email = $this->_CI->input->post('email');
		
		
        //Encrypt password
		//$password = md5($this->_CI->input->post('password'));
		$password = $this->_CI->input->post('password');
		
		//if check_login returns TRUE, set variables into session
		if( $this->_CI->users_m->check_login($email, $password) )
		{
			$this->store_auth($email, $password);
			$this->_login = $email;
			return;
		}
		else
		{
			
			$this->_CI->my_session->set('logn', 'Please check the login credential! ');	
			$this->redirect();
		}
		
	  }//End method login
	  
	/*
	*	This method sets the session variables after a successful login
	*	
	*/
	public function store_auth( $login, $password )
  	{
		
  		$this->_CI->my_session->set('login', $login);					 
		$this->_CI->my_session->set('password', $password);
		$this->_CI->my_session->set('hash', md5($this->_hash_key . $login . $password));
  		$this->_CI->my_session->set('logged', TRUE);
		
			
		return;
  	}//End method store_auth  
  	
  	/*
  	*	Confirms that an existing login is still valid
	*	@param none
	*	@return boolean
	*/
	public function confirm_auth()
  	{
		$login = $this->_CI->my_session->get('login');
		$password = $this->_CI->my_session->get('password');
		$hash_key = $this->_CI->my_session->get('hash');
		$logged = $this->_CI->my_session->get('logged');
		
		if ( md5($this->_hash_key . $login . $password) != $hash_key )
		{
		  	$this->logout();
		}
		return TRUE;
  	}//End method confirm_auth
  	
  	/*
  	*	Same method as above, except that we don't redirect and the user session values are emptied locally 
	*	@param none
	*	@return boolean
	*/
	public function is_logged()
  	{
		$login 		= $this->_CI->my_session->get('login');
		$password 	= $this->_CI->my_session->get('password');
		$hash_key 	= $this->_CI->my_session->get('hash');
		$logged 	= $this->_CI->my_session->get('logged');
		
		
		if ( md5($this->_hash_key . $login . $password) != $hash_key )
		{
		  	$login = $this->_CI->my_session->del('email');
			$password = $this->_CI->my_session->del('password');
			$hash_key = $this->_CI->my_session->del('hash');
			$logged = $this->_CI->my_session->del('logged');
			
		  	return FALSE;
		}
		
		
		return TRUE;
  	}//End method is_logged
  		
  	/*
  	*	Logs the user out
	*	@param none
	*	@return void
	*/
	public function logout()
  	{	  
		$this->_CI->my_session->del('login');
		$this->_CI->my_session->del('password');
		$this->_CI->my_session->del('hash');
		$this->_CI->my_session->del('logged');
		$this->_CI->my_session->del('auth');
		$this->_CI->my_session->destroy();
		$this->redirect();
		  
  	}//End method logout
  	
  	/*
  	*	Redirects browser and terminates script execution
	*	@param none
	*	@return void
	*/
	public function user_insert()
	{
		$this->_CI->load->model('users_m');
		
		if ( !$this->_CI->input->post('email') || !$this->_CI->input->post('password') ) //|| !ctype_alnum($_POST['login']) || !ctype_alnum($_POST['password']) )
		{
			$this->redirect();
		}
		// See if we have values already stored in the session
				$firstname 		= $this->_CI->input->post('firstname');
				$lastname 		= $this->_CI->input->post('lastname');
				$email 			= $this->_CI->input->post('email');
				$password 		= $this->_CI->input->post('password');
				$confirm_password 	= $this->_CI->input->post('confirm_password');
				//$mobile 		= $this->_CI->input->post('mobile');
				$hash_key 		= $this->_CI->my_session->get('hash');
				$logged 		= $this->_CI->my_session->get('logged');
		if($this->_CI->users_m->user_insert( $firstname, $lastname, $email, $password )  ) //$mobile
		{
			$this->store_auth($email, $password);
			$this->_login = $email;
			return;
		}
		else
		{
			
			$this->_CI->my_session->set('logn', 'Email Address already exists.');	
			header( 'Location:'."http://localhost/1book/register");	
		}
				
				
		
		
	}
	private function redirect()
  	{
		
		header( 'Location:'.$this->_redirect);	
		exit();	
  	}//End method redirect

}//End class Auth

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */
	
