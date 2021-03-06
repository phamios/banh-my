<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();

class Location extends CI_Controller {

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
         $this->load->model('location_model');
        $this->load->helper(array('form', 'url'));
        @session_start();
    }

     public function index() {
        if ($this->session->userdata('adminusername') == null) {
            redirect('admincp/login');
        } else { 
            $data['list_location'] = $this->location_model->_list();
            $this->load->view('admin/dashboard',$data);
        }
    }
    
    
    public function add(){
        if ($this->session->userdata('adminusername') == null) {
            redirect('admincp/login');
        } else {
            if (isset($_REQUEST['btt_submit'])) {
                $local_name = $this->input->post('location_name', true);
                $local_root = $this->input->post('location_root', true);
                $active =$this->input->post('location_active',true); 
                
                $this->location_model->_add($local_name,$local_root,$active);
                redirect('admin/location/index');
            }
            $this->load->view('admin/dashboard');
        }
    }
    
    public function edit($id=null){
        if ($this->session->userdata('adminusername') == null) {
            redirect('admincp/login');
        } else {
            if (isset($_REQUEST['btt_submit'])) {
                $name = $this->input->post('location_name', true);
                $root = $this->input->post('lcation_root', true);
                $active =$this->input->post('location_active',true); 
                $this->location_model->_update($id,$name,$root,$active);
                redirect('admin/location/index');
            }
            $data['location'] = $this->location_model->_details($id);
            $data['list_location'] = $this->location_model->_list_diff($id);
            $this->load->view('admin/dashboard',$data);
        }
    }
    
    public function del($id=null){
        if ($this->session->userdata('adminusername') == null) {
            redirect('admincp/login');
        } else {
           $this->location_model->_del($id);
            redirect('admin/location/index');
        }
    }
    
    public function status($id=null,$active=null){
        if ($this->session->userdata('adminusername') == null) {
            redirect('admincp/login');
        } else {
            $this->location_model->_update_status($id,$active);
            redirect('admin/location/index');
        }
    }
    
    
    
    
}
