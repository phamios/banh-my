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
            $cost = $value->cost_per_item;
        }
        $search = $this->search_model->_list_top();

        $newdata = array(
            'top_serch' => $search,
            'site_name' => $site_name,
            'site_meta' => $site_meta,
            'site_description' => $site_description,
            'site_footer' => $site_footer,
            'site_url' => $site_url,
            'site_mode' => $site_mode,
            'site_logo' => $site_logo,
            'cost'=>$cost,
        );


        $this->session->set_userdata($newdata);
        $this->load->helper(array('form', 'url'));
        @session_start();
    }

    public function index() {
        $data['services'] = $this->category_model->_list();
        $data['location'] = $this->location_model->_list_root();
        $data['slider'] = $this->content_model->_list_hot_favor();
        $data['sub_location'] = $this->load_sub_location();
        $this->load->view( "template2/index",$data);
    }
    public function  template(){
        if($this->session->userdata('template') == 1){
            return "template2/index";
        }else{
            return "frontend/index";
        }
    }

    public function search() {
        $keyword = null;
        $result = null;
        if (isset($_REQUEST['sub_search'])) {
            $keyword = $this->input->post('keyword', true);
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
        $data['sub_location'] = $this->load_sub_location();
        $this->load->view( "template2/index",$data);
    }

    public function location($id = null) {
        $data['slider'] = $this->content_model->_list_hot_favor();
        $data['location_id'] = $id;
        $data['location_name_current'] = $this->location_model->_return_name($id);
        $data['list_content_location'] = $this->content_model->_getList_bylocation($id);
        $data['services'] = $this->category_model->_list();
        $data['location'] = $this->location_model->_list_root();
        $data['sub_location'] = $this->load_sub_location();
        $this->load->view( "template2/index",$data);
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
