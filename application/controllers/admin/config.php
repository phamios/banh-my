<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();

class Config extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('upload');
        $this->load->library('pagination');
        $this->load->library('parser');
        $this->load->helper('cookie');
        $this->load->helper('text');
        $this->load->model('config_model');
        $this->load->helper(array('form', 'url'));
        @session_start();
    }

    public function payment() {
        if ($this->session->userdata('adminusername') == null) {
            redirect('admincp/login');
        } else { 
            $data['list_payment'] = $this->config_model->_list_payment();
            $this->load->view('admin/dashboard', $data);
        }
    }
    
    public function add_payment(){
        if ($this->session->userdata('adminusername') == null) {
            redirect('admincp/login');
        } else {
            if (isset($_REQUEST['btt_submit'])) {
                $name = $this->input->post('payment_name', true);
                $email = $this->input->post('payment_email', true); 
                $status = $this->input->post('payment_status',true);
                $logo = $this->do_upload_image('./upload/content/', 'payment_logo');
                $this->config_model->_add_payment($name,$email,$logo,$status);
                redirect('admin/config/payment');
            } 
            $this->load->view('admin/dashboard');
        }
    }
    
    public function payment_status($id=null,$active=null){
        if ($this->session->userdata('adminusername') == null) {
            redirect('admincp/login');
        } else {
            $this->config_model->_payment_status($id,$active);
            redirect('admin/category/index');
        }
    }
    
    public function payment_del(){ 
        if ($this->session->userdata('adminusername') == null) {
            redirect('admincp/login');
        } else {
            $this->config_model->_del_payment($id);
            redirect('admin/config/payment');
        }
    }

    public function index($id = 0) {
        if ($this->session->userdata('adminusername') == null) {
            redirect('admincp/login');
        } else {
            if (isset($_REQUEST['btt_submit'])) {
                $site_name = $this->input->post('site_name', true);
                $site_meta = $this->input->post('site_meta', true);
                $site_description = $this->input->post('site_description', true);
                $site_footer = $this->input->post('site_footer', true);
                $site_url = $this->input->post('site_url', true);
                $site_mode = $this->input->post('site_mode', true);
                $site_logo = $this->do_upload_image('./upload/content/', 'site_logo');
                if ($id <> 0) {
                    $this->config_model->_update($site_name, $site_meta, $site_description, $site_footer, $site_url, $site_mode, $site_logo);
                    redirect('admin/config');
                }
            }
            $data['list_config'] = $this->config_model->_details();
            $this->load->view('admin/dashboard', $data);
        }
    }
    
    public function edit($id = 0) {
        if ($this->session->userdata('adminusername') == null) {
            redirect('admincp/login');
        } else {
            if (isset($_REQUEST['btt_submit'])) {
                $site_name = $this->input->post('site_name', true);
                $site_meta = $this->input->post('site_meta', true);
                $site_description = $this->input->post('site_description', true);
                $site_footer = $this->input->post('site_footer', true);
                $site_url = $this->input->post('site_url', true);
                $site_mode = $this->input->post('site_mode', true);
                $site_logo = $this->do_upload_image('./upload/content/', 'site_logo');
                if ($id <> 0) {
                    $this->config_model->_update($site_name, $site_meta, $site_description, $site_footer, $site_url, $site_mode, $site_logo);
                    redirect('admin/config');
                }
            }
            $data['list_config'] = $this->config_model->_details();
            $this->load->view('admin/dashboard', $data);
        }
    }

    public function resize_image($dir, $new_name, $image) {
        $img_cfg_thumb['image_library'] = 'gd2';
        $img_cfg_thumb['source_image'] = "./" . $dir . "/" . $image;
        $img_cfg_thumb['maintain_ratio'] = TRUE;
        $img_cfg_thumb['new_image'] = $new_name;
        $img_cfg_thumb['width'] = 200;
        $img_cfg_thumb['height'] = 100;
        $this->load->library('image_lib');
        $this->image_lib->initialize($img_cfg_thumb);
        $this->image_lib->resize();
    }

    function do_upload_image($mypath, $filename) {
        $config['upload_path'] = $mypath;
        $config['allowed_types'] = 'gif|jpg|png|bmp';
        $config['max_size'] = '80000';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (isset($filename)) {
            if (!$this->upload->do_upload($filename)) {
                $error = array('error' => $this->upload->display_errors());
                return NULL;
            } else {
                $data = array('upload_data' => $this->upload->data());
                $imagename = $this->upload->file_name;
                $this->resize_image($mypath, 'thumbs_' . $imagename, $imagename);
                return $imagename;
            }
        } else {
            echo $this->upload->display_errors();
        }
    }

}
