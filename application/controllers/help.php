<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Help extends CI_Controller {

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
        $data['slider'] = $this->content_model->_list_hot_favor();
        $data['services'] = $this->category_model->_list();
        $data['sub_location'] = $this->load_sub_location();
        $data['location'] = $this->location_model->_list_root();
        $this->load->view('template2/index', $data);
    }
    
     public function load_sub_location() {
        if ($this->session->userdata('locationname')) {
            $last = $this->session->userdata('locationid');
        } else {
            $last_location = $this->location_model->_lastlist_root();
            $last = null;
            $last_name_location = null;
            foreach ($last_location as $local) {
                $last = $local->id;
                $last_name_location = $local->location_name;
            }
            $newdata = array(
                'locationname' => $last_name_location,
                'locationid' => $last,
            );
            $this->session->set_userdata($newdata);
        }

        $location = $this->location_model->get_list_sub_location($last);
        return $location;
    }
    
}