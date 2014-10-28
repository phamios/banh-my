<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();

class Message extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('upload');
        $this->load->library('pagination');
        $this->load->library('parser');
        $this->load->helper('cookie');
        $this->load->helper('text');
        $this->load->library('tools_lib');
        $this->load->model('message_model');
        $this->load->model('user_model');
        $this->load->helper(array('form', 'url'));
        @session_start();
    }

    public function index($status = null) {
        if ($this->session->userdata('adminusername') == null) {
            redirect('admincp/login');
        } else {
            $data['status'] = $status;
            $this->load->view('admin/dashboard', $data);
        }
    }

    public function send() {
        if ($this->session->userdata('adminusername') == null) {
            redirect('admincp/login');
        } else {
            if (isset($_REQUEST['btt_submit'])) {
                $title = $this->input->post('mess_title', true);
                $content = $this->input->post('mess_content', true);
                $i = 0;
                $insertid = "";
                $users = $this->user_model->_list_active_user();
                if ($users) {
                    foreach ($users as $user) {
                        $insertid .= $this->message_model->_send($title, $content, $user->id);
                    }
                    redirect('admin/message/index/' . $insertid);
                } else {
                    redirect('admin/message/index/0');
                }

                redirect('admin/message/index');
            }
            $this->load->view('admin/dashboard');
        }
    }

}
