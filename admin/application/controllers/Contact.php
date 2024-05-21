<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Contact extends CI_Controller {
    
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

        $this->db->select('*');
        $this->db->from("web_contact");
        $this->db->order_by("id", "DESC");
        $query = $this->db->get();
        $arr['content'] = $query->result_array();

	    if($arr['admin_id'])
	    {
           $this->load->view('contact/contact',$arr);
	    }     
        else
        {
           $this->load->view('welcome_message', $arr);	
        }
    }

    

    public function contactedit()
    {
    	  $data['logged']  = false;
          $arr['admin_id'] = $this->my_session->get("admin_id");
          $arr['username'] = $this->my_session->get("username");

    	  $did = $this->input->get('id' ,TRUE);

    	  $this->db->select('*');
    	  $this->db->from('web_contact');
    	  $this->db->where('id',$did);
    	  $query = $this->db->get();
    	  $arr['content'] = $query->result_array();

    	  if($arr['admin_id'])
    	  {
    	  	 $this->load->view('contact/contactedit',$arr);
    	  }
    	  else
    	  {
    	  	$this->load->view('welcome_message',$arr);
    	  }
    }

    public function contactview()
    {
	      $data['logged']  = false;
	      $arr['admin_id'] = $this->my_session->get('admin_id');
	      $arr['username'] = $this->my_session->get('username');
	     
          $did = $this->input->get('id' ,TRUE);

    	  $this->db->select('*');
    	  $this->db->from('web_contact');
    	  $this->db->where('id',$did);
    	  $query = $this->db->get();
    	  $arr['content'] = $query->result_array();


	      if($arr['admin_id'])
	      {
	      	 $this->load->view('contact/contactview' ,$arr);
	      }
	      else
	      {
	      	$this->load->view('welcome_message',$arr);
	      }
    }
    
  
    public function edit()
    {
    	$data['logged']  = false;
    	$arr['admin_id'] = $this->my_session->get('admin_id');
    	$arr['username'] = $this->my_session->get('username');

        $cid        = $this->input->post('id');
    	$username   = $this->input->post('username');
    	$email      = $this->input->post('email');
        $email1     = $this->input->post('email');
        $mobile     = $this->input->post('mobile');
        $mobile1    = $this->input->post('mobile');
        $address    = $this->input->post('address');
        $address1   = $this->input->post('address');

    	
		$update = array(

          'username'   => $username,
          'email'      => $email,
          'email1'     => $email1,
          'mobile'     => $mobile,
          'mobile1'    => $mobile1,
          'address'    => $address, 
          'address1'   => $address1
		);
        
        $this->db->where('id',$cid); 
		$this->db->update('web_contact', $update);
		header('Location:'.BEGIN_PATH.'/contact');
    }

    public function del()
    {
    	$data['logged']  = false;
        $arr['admin_id'] = $this->input->post('admin_id');
        $arr['username'] = $this->input->post('username');

        $did = $this->input->get('did',TRUE);

        $this->db->where('id', $did);
        $this->db->limit(1);
        $this->db->delete('web_contact');
        header('Location:'.BEGIN_PATH.'/contact');
    } 
	


}
