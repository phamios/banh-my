<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();

class admincp extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('upload');
        $this->load->library('pagination');
        $this->load->library('parser');
        $this->load->helper('cookie');
        $this->load->helper('text');
        //$this->load->library('sonclass');
        $this->load->helper(array('form', 'url'));
        @session_start();
    }

    public function index() {
        if ($this->session->userdata('adminusername') == null) {
            redirect('admincp/login');
        } else {
            $this->load->view('admin/dashboard');
        }
    }

    public function login() {
        if ($this->session->userdata('usertype')) {
            $newdata = array(
                'adminid' => $this->session->userdata('userid'),
                'adminusername' => $this->session->userdata('username')
            );
            $this->session->set_userdata($newdata);
            redirect('admincp/index');
        }
        if (isset($_REQUEST['submit'])) {
            $username = $this->input->post('uname', true);
            $pass1 = $this->input->post('pass1', true);
            $this->load->model('user_model');
            $result = $this->user_model->_authen_admin($username, $pass1);
            if ($this->session->userdata('usertype')) {
                $newdata = array(
                    'adminid' => $this->session->userdata('userid'),
                    'adminusername' => $this->session->userdata('username')
                );
                $this->session->set_userdata($newdata);
                redirect('admincp/index');
            }
            if ($result == null) {
                redirect('admincp/login/' . rand(1, 10));
            } else {
                $newdata = array(
                    'adminid' => $result,
                    'adminusername' => $username
                );
                $this->session->set_userdata($newdata);
                redirect('admincp/index');
            }
        }

        $this->load->view('admin/login/index');
    }

    public function logout() {
        $this->session->unset_userdata('adminid');
        $this->session->unset_userdata('adminusername');
        redirect('admincp');
    }

}
