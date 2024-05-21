<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Changepassword extends CI_Controller {

    var $site_title;
    var $css;
    var $base_url;
    var $data = array();

    public function __construct() {
        parent::__construct();

        $this->load->library('my_session');
        $this->load->library('auth');
    }

    public function index() {
        $data['logged'] = false;
        $arr['admin_id'] = $this->my_session->get("admin_id");
        $arr['username'] = $this->my_session->get("username");

        $this->db->select('*');
        $this->db->from('admin');
        $query = $this->db->get();
        $arr['content'] = $query->result_array();

        if ($arr['admin_id']) {
            $this->load->view('changepassword/changepassword', $arr);
        } else {
            $this->load->view('welcome_message', $arr);
        }
    }

    public function oldpasswordcheck() {
        $data['logged'] = false;
        $arr['admin_id'] = $this->my_session->get('admin_id');
        $arr['username'] = $this->my_session->get('username');

        $Data = $_POST['Data'];
        $password = md5($Data);

        $this->db->where('password', $password);
        $query = $this->db->get('admin');
        $Data2 = $query->result_array();
        $num_rows = count($Data2);
        if ($num_rows > 0) {
            echo '1';
        } else {
            echo '0';
        }
    }

    public function edit() {
        $data['logged'] = false;
        $arr['admin_id'] = $this->my_session->get('admin_id');
        $arr['username'] = $this->my_session->get('username');

        $Data = $_POST['Data'];
        $old_password = md5($Data[0]);
        $new_password = md5($Data[1]);

        $update = array(
            'password' => $new_password
        );

        $this->db->where('password', $old_password);
        $execute = $this->db->update('admin', $update);
        if ($execute) {
            echo '1';
        } else {
            echo '0';
        }
    }

}
