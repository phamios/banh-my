<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();

class Type extends CI_Controller {

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
         $this->load->model('type_model');
        $this->load->helper(array('form', 'url'));
        @session_start();
    }

     public function index() {
        if ($this->session->userdata('adminusername') == null) {
            redirect('admincp/login');
        } else { 
            $data['list_type'] = $this->type_model->_list();
            $this->load->view('admin/dashboard',$data);
        }
    }
    
    
    public function add(){
        if ($this->session->userdata('adminusername') == null) {
            redirect('admincp/login');
        } else {
            if (isset($_REQUEST['btt_submit'])) {
                $typename = $this->input->post('type_name', true); 
                $this->type_model->_add($typename);
                redirect('admin/type/index');
            }
            $this->load->view('admin/dashboard');
        }
    }
    
    public function edit($id=null){
        if ($this->session->userdata('adminusername') == null) {
            redirect('admincp/login');
        } else {
            if (isset($_REQUEST['btt_submit'])) {
                $type_name = $this->input->post('type_name', true); 
                $this->type_model->_update($id,$type_name);
                redirect('admin/type/index');
            }
            $data['type'] = $this->type_model->_details($id);
            $data['list_type'] = $this->type_model->_list_diff($id);
            $this->load->view('admin/dashboard',$data);
        }
    }
    
    public function del($id=null){
        if ($this->session->userdata('adminusername') == null) {
            redirect('admincp/login');
        } else {
           $this->type_model->_del($id);
            redirect('admin/type/index');
        }
    }
    
   
    
    
    
}
