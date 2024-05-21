<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class About extends CI_Controller {
    
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
        $this->db->from("web_about");
        $this->db->order_by("id", "DESC");
        $query = $this->db->get();
        $arr['content'] =$query->result_array();

        if($arr['admin_id'])
        {
          $this->load->view('about/about',$arr);	
        }
        else
        {
          $this->load->view('welcome_message',$arr);	
        }
	}

	
   public function aboutedit()
   {
        $data['logged']  = false;
        $arr['admin_id'] = $this->my_session->get("admin_id");
        $arr['username'] = $this->my_session->get("username");

        $bid = $this->input->get('id',TRUE);

        $this->db->select('*');
        $this->db->from('web_about');
        $this->db->where('id',$bid);
        $query = $this->db->get();
        $arr['content'] = $query->result_array();

        if($arr['admin_id'])
        {
          $this->load->view('about/aboutedit',$arr);
        }
        else
        {
          $this->load->view('welcome_message',$arr);
        }
   }

   
    public function aboutview()
    {
        $data['logged']  = false;
        $arr['admin_id'] = $this->my_session->get("admin_id");
        $arr['username'] = $this->my_session->get("username");

        $vid = $this->input->get('id');

        $this->db->select('*');
        $this->db->from('web_about');
        $this->db->where('id',$vid);
        $query = $this->db->get();
        $arr['content'] = $query->result_array();

        if($arr['admin_id'])
        {
          $this->load->view('about/aboutview',$arr);
        }
        else
        {
          $this->load->view('welcome_message',$arr);
        }
      
    }

    

    public function edit()
    {

      $data['logged']  = false;
      $arr['admin_id'] = $this->my_session->get("admin_id");
      $arr['username'] = $this->my_session->get("username");

      $bid = $this->input->post('id');
      $web_title   = $this->input->post('web_title');
      $imgname   = $this->input->post('web_image');
      $web_content = $this->input->post('web_content');

      include("resize-class.php");
    
      if($_FILES['web_image']['name'] != "")
      {
      $path_parts = pathinfo($_FILES['web_image']['name']);
            $image_path = $path_parts['filename'].'_'.time().'.'.$path_parts['extension'];
      $imgname=$image_path;

        $source =  $_FILES['web_image']['tmp_name'];      
        $originalpath  = "webupload/original/".$imgname;
        $thumbnailpath = "webupload/thumb/".$imgname;
        move_uploaded_file($source,$originalpath);    
        $resizeObj = new resize($originalpath);   
        $resizeObj -> resizeImage(350, 350, 'crop');
        $resizeObj -> saveImage($thumbnailpath, 100);
        }


        $update = array(
        'web_title'  => $web_title,
        'web_image'  => $imgname,
        'web_content'=> $web_content   
        );

        $this->db->where('id',$bid);
        $this->db->update('web_about',$update);

        header('Location:'.BEGIN_PATH.'/about');

    }

    public function del()
    {
      $data['logged']  = false;
      $arr['admin_id'] = $this->input->post('admin_id');
      $arr['username'] = $this->input->post('username');

      $did = $this->input->get('did',TRUE);
      
      $this->db->where('id',$did);
      $this->db->limit(1);
      $this->db->delete('web_about');

      header('Location:'.BEGIN_PATH.'/about'); 


    }


}
