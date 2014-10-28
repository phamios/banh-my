<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

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

    public function search() {
        $keyword = null;
        $result = null;
        if (isset($_REQUEST['sub_search'])) {
            $keyword = $this->input->post('q', true);
            $cost = $this->input->post('price', true);
            $cateid = $this->input->post('service', true);
            $result_search = $this->search_model->get_result($keyword, $cost, $cateid);
            $result = $result_search;
        }

        $data['result_search'] = $result;
        $data['services'] = $this->category_model->_list();
        $data['location'] = $this->location_model->_list_root();
        $this->load->view('frontend/index', $data);
    }

    public function location($id = null) {
        $data['location_id'] = $id;
        $data['location_name_current'] = $this->location_model->_return_name($id);
        $data['list_content_location'] = $this->content_model->_getList_bylocation($id); 
        $data['services'] = $this->category_model->_list();
        $data['location'] = $this->location_model->_list_root(); 
        $this->load->view('frontend/index', $data);
    }

}
