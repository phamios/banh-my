<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();

class Content extends CI_Controller {

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
         $this->load->model('content_model');
        $this->load->helper(array('form', 'url'));
        @session_start();
    }

     public function index() {
        if ($this->session->userdata('adminusername') == null) {
            redirect('admincp/login');
        } else { 
            $data['list_category'] = $this->category_model->_list();
            $this->load->view('admin/dashboard',$data);
        }
    }
    
    
    public function add(){
        if ($this->session->userdata('adminusername') == null) {
            redirect('admincp/login');
        } else {
            if (isset($_REQUEST['btt_submit'])) {
                $catename = $this->input->post('cate_name', true);
                $cateroot = $this->input->post('cate_root', true);
                $cate_active =$this->input->post('cate_active',true); 
                $cate_images =  $this->do_upload_image('./upload/content/', 'cate_images'); 
                $this->category_model->_add($catename,$cateroot,$cate_active,$cate_images);
                redirect('admin/category/index');
            }
            $this->load->view('admin/dashboard');
        }
    }
    
    public function edit($id=null){
        if ($this->session->userdata('adminusername') == null) {
            redirect('admincp/login');
        } else {
            if (isset($_REQUEST['btt_submit'])) {
                $catename = $this->input->post('cate_name', true);
                $cateroot = $this->input->post('cate_root', true);
                $cate_active =$this->input->post('cate_active',true); 
                $cate_images =  $this->do_upload_image('./upload/content/', 'cate_images'); 
                $this->category_model->_update($id,$catename,$cateroot,$cate_active,$cate_images);
                redirect('admin/category/index');
            }
            $data['category'] = $this->category_model->_details($id);
            $data['list_category'] = $this->category_model->_list_diff($id);
            $this->load->view('admin/dashboard',$data);
        }
    }
    
    public function del($id=null){
        if ($this->session->userdata('adminusername') == null) {
            redirect('admincp/login');
        } else {
           $this->category_model->_del($id);
            redirect('admin/category/index');
        }
    }
    
    public function status($id=null,$active=null){
        if ($this->session->userdata('adminusername') == null) {
            redirect('admincp/login');
        } else {
            $this->category_model->_update_status($id,$active);
            redirect('admin/category/index');
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
