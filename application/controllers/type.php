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
        //$this->load->library('sonclass');
        $this->load->helper(array('form', 'url'));
        $this->load->model('gallery_model');
        $this->typeid = (int) end(explode("-", $this->uri->segment(2)));
        @session_start();
    }

    public function _remap() {
        $current_location = $this->session->userdata('locationid');
        $data['location_id'] = $current_location;
        $data['services'] = $this->category_model->_list();
        $data['location'] = $this->location_model->_list_root();
        $data['cateogries'] =$this->category_model->_list();
        $data['list_users'] = $this->user_model->_list();
         $data['location_name_current'] = $this->location_model->_return_name($current_location);
        $data['list_content_location'] = $this->content_model->_getList_bylocation($current_location); 
        
        $data['list_content_type'] = $this->content_model->_get_list_by_type($this->typeid,$current_location);
        
//        $newdata = array(
//            'title_content' => $this->content_model->_return_title($this->product), 
//        );
       // $this->session->set_userdata($newdata);
        $this->load->view('frontend/index', $data);
    }

}
