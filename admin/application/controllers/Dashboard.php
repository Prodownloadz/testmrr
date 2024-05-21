<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    var $site_title;
    var $css;
    var $base_url;
    var $data = array();

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 
	public function __construct()
	{
        parent::__construct();

        $this->load->library('my_session');
        $this->load->library('auth');
	}
 
	public function index()
	{
	   	$data['logged']  = false;
		$arr['admin_id'] = $this->my_session->get("admin_id");
		$arr['username'] = $this->my_session->get("username");
		
	
		
	    if($arr['admin_id'])
        {
          $this->load->view('dashboard',$arr);	
        }
        else
        {
          $this->load->view('welcome_message',$arr);	
        }
	}
}
