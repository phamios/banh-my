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
        $this->load->model('config_model');
        $this->load->model('search_model');
        $this->load->helper("text");  
         $this->load->helper("slug");
        //$this->load->library('sonclass');
         $session = $this->config_model->_details();
        foreach ($session as $value) {
            $site_name = $value->site_name;
            $site_meta = $value->site_meta;
            $site_description = $value->site_description;
            $site_footer = $value->site_footer;
            $site_url = $value->site_url;
            $site_mode = $value->site_mode;
            $site_logo = $value->site_logo;
        }
        $search = $this->search_model->_list_top();
          
        $newdata = array(
            'top_serch' =>$search,
            'site_name' => $site_name,
            'site_meta' => $site_meta,
            'site_description' => $site_description,
            'site_footer' => $site_footer,
            'site_url' => $site_url,
            'site_mode' => $site_mode,
            'site_logo' => $site_logo,
        );
        
        
        $this->session->set_userdata($newdata);
        $this->load->helper(array('form', 'url'));
        @session_start();
    }

    public function index() {
        $data['services'] = $this->category_model->_list();
        $data['location'] = $this->location_model->_list_root(); 
           $data['slider'] = $this->content_model->_list_hot_favor();
        $this->load->view('template2/index', $data);
    }

    public function search() {
        $keyword = null;
        $result = null; 
        if (isset($_REQUEST['sub_search'])) {
            $keyword = $this->input->post('q', true);
            $cost = $this->input->post('price', true);
            $cateid = $this->input->post('service', true);
            $this->search_model->_add($keyword);
            $result_search = $this->search_model->get_result($keyword, $cost, $cateid);
            $result = $result_search;
        }
        $data['slider'] = $this->content_model->_list_hot_favor();
        $data['result_search'] = $result;
        $data['services'] = $this->category_model->_list();
        $data['location'] = $this->location_model->_list_root();
        $this->load->view('template2/index', $data);
    }

    public function location($id = null) {
        $data['slider'] = $this->content_model->_list_hot_favor();
        $data['location_id'] = $id;
        $data['location_name_current'] = $this->location_model->_return_name($id);
        $data['list_content_location'] = $this->content_model->_getList_bylocation($id); 
        $data['services'] = $this->category_model->_list();
        $data['location'] = $this->location_model->_list_root(); 
        $this->load->view('template2/index', $data);
    }

}
