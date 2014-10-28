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
        //$this->load->library('sonclass');
        $this->load->helper(array('form', 'url'));
        $this->load->model('gallery_model');
        $this->product = (int) end(explode("-", $this->uri->segment(2)));
        @session_start();
    }

    public function _remap() {
        $data['services'] = $this->category_model->_list();
        $data['location'] = $this->location_model->_list_root();
        $data['cateogries'] =$this->category_model->_list();
        $data['list_users'] = $this->user_model->_list();
        $data['list_gallery'] = $this->gallery_model->_list_by_content($this->product);
        $data['list_choose_cate'] = $this->content_model->getlist_category($this->product);
        $data['content_details'] = $this->content_model->_get_details_info($this->product);
  
        $newdata = array(
            'title_content' => $this->content_model->_return_title($this->product), 
        );
        $this->session->set_userdata($newdata);
        $this->load->view('frontend/index', $data);
    }

}
