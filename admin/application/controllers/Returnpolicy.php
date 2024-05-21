<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Returnpolicy extends CI_Controller {
    
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
        $this->db->from("web_returnpolicy");
        $this->db->where("status","1");
        $this->db->order_by("id", "DESC");
        $query = $this->db->get();
        $arr['content'] =$query->result_array();

        if($arr['admin_id'])
        {
          $this->load->view('returnpolicy/returnpolicy',$arr);	
        }
        else
        {
          $this->load->view('welcome_message',$arr);	
        }
	}


   
    public function returnpolicyview()
    {
        $data['logged']  = false;
        $arr['admin_id'] = $this->my_session->get("admin_id");
        $arr['username'] = $this->my_session->get("username");

        $cid = $this->input->get('cid');

        $this->db->select('*');
        $this->db->from('web_returnpolicy');
        $this->db->where('id',$cid);
        $query = $this->db->get();
        $arr['content'] = $query->result_array();

        if($arr['admin_id'])
        {
          $this->load->view('returnpolicy/returnpolicyview',$arr);
        }
        else
        {
          $this->load->view('welcome_message',$arr);
        }
      
    }
    
    public function update()
    {
        $data['logged']  = false;
        $arr['admin_id'] = $this->my_session->get("admin_id");
        $arr['username'] = $this->my_session->get("username");

        $uid             = $_REQUEST['uid'];
        $accept_status   = $_REQUEST['accept_status'];

       $update = array(
        'accept_status'  => $accept_status
        );

        $this->db->where('id',$uid);
        $this->db->update('web_returnpolicy',$update);
        
    header('Location:'.BEGIN_PATH.'/returnpolicy');
      
    }

 
    public function del()
    {
      $data['logged']  = false;
      $arr['admin_id'] = $this->input->post('admin_id');
      $arr['username'] = $this->input->post('username');

      $did = $this->input->get('did',TRUE);
      
      $this->db->where('id',$did);
      $this->db->limit(1);
      $this->db->delete('web_returnpolicy');

      header('Location:'.BEGIN_PATH.'/returnpolicy'); 


    }


}
