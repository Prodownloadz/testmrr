<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    var $site_title;
    var $css;
    var $base_url;
    var $data = array();

    public function __construct() {

        parent::__construct();

        $this->load->library('my_session');
        $this->load->library('auth');
        $this->load->library('encrypt');
    }

    public function index() {
        $username = $_REQUEST['username'];
        $password = md5($_REQUEST['password']);

        $qry = "select * from admin where email='$username' and password='$password'";
        $arr['user'] = $this->db->query($qry)->result_array();
        $query = $this->db->query($qry);
        $num = $query->num_rows();
        if ($num > 0) {
            $username = $arr['user'][0]['name'];
            $this->my_session->set("admin_id", $arr['user'][0]['email']);
            $this->my_session->set("userid", $arr['user'][0]['id']);
            $this->my_session->set("username", $username);
            $this->my_session->set("login", true);
        } else {
            $this->my_session->set("login", true);
            $arr['login'] = false;
            header('Location:' . $this->base_url . '/admin/?action=failed');
            exit;
        }

        if ($this->my_session->get('return_page')) {
            $url = $this->my_session->get('return_page');
            $this->my_session->set('return_page', '');
            header('Location:' . $this->base_url . '/admin/?action=error');
            exit;
        }

        header('Location: ' . BEGIN_PATH . '/dashboard');
    }

    public function logout() {
        session_destroy();
        unset($_SESSION);
        header('Location: ' . BEGIN_PATH . '/');
    }

}
