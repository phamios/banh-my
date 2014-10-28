<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login  extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('upload');
        $this->load->library('pagination');
        $this->load->library('parser');
        $this->load->helper('cookie'); 
        $this->load->model('location_model');
        $this->load->model('content_model');
        $this->load->model('category_model');
        $this->load->model('search_model');
        $this->load->helper("text");  
         $this->load->helper("slug");
        //$this->load->library('sonclass');
        $this->load->helper(array('form', 'url'));
        @session_start();
    }

    public function index() {
        $data['services'] = $this->category_model->_list();
        $data['location'] = $this->location_model->_list_root();
        $this->load->view('frontend/index', $data);
    }
    
}