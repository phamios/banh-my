<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();

class Report extends CI_Controller {

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
        $this->load->model('user_model');
        $this->load->helper(array('form', 'url'));
        @session_start();
    }

    public function index() {
        if ($this->session->userdata('adminusername') == null) {
            redirect('admincp/login');
        } else {
            $data['total_user'] = $this->user_model->total();
            $data['total_user_active'] = $this->user_model->total_active();
            $data['total_user_unactive'] = $this->user_model->total_unactive();
            $data['total_content_active'] = $this->content_model->total_active();
            $data['total_content_unactive'] = $this->content_model->total_unactive();
            $this->load->view('admin/dashboard', $data);
        }
    }

    public function money() {
        if ($this->session->userdata('adminusername') == null) {
            redirect('admincp/login');
        } else {
            $data['total_user'] = $this->user_model->total();
            $data['total_user_active'] = $this->user_model->total_active();
            $data['total_user_unactive'] = $this->user_model->total_unactive();
            $data['total_content_active'] = $this->content_model->total_active();
            $data['total_content_unactive'] = $this->content_model->total_unactive();
            $data['total_trans'] = $this->user_model->total_trans();
            $data['total_message'] = $this->user_model->total_message();
            
            $this->load->view('admin/dashboard', $data);
        }
    }

    public function bad() {
        if ($this->session->userdata('adminusername') == null) {
            redirect('admincp/login');
        } else {
            $data['list_user'] = $this->user_model->_list_active_user();
            $data['list_content'] = $this->content_model->_list();
            $data['list_bad'] = $this->content_model->_list_bad();
            $this->load->view('admin/dashboard', $data);
        }
    }

    public function favor() {
        if ($this->session->userdata('adminusername') == null) {
            redirect('admincp/login');
        } else {
            $data['list_user'] = $this->user_model->_list_active_user();
            $data['list_content'] = $this->content_model->_list();
            $data['list_favor'] = $this->content_model->_list_favor();
            $this->load->view('admin/dashboard', $data);
        }
    }

}
