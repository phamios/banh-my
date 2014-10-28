<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();

class Details extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('upload');
        $this->load->library('pagination');
        $this->load->library('parser');
        $this->load->helper('cookie');
         $this->load->helper("text");  
         $this->load->helper("slug");
        //$this->load->library('sonclass');
        $this->load->helper(array('form', 'url'));
         $this->product = (int) end(explode("-", $this->uri->segment(2)));
        @session_start();
    }

    public function _remap() { 
        $data['services'] = $this->category_model->_list();
        $data['location'] = $this->location_model->_list_root();
        $this->load->view('frontend/index', $data);
    }

}
