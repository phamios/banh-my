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
        $data['slider'] = $this->content_model->_list_hot_favor();
        $data['services'] = $this->category_model->_list();
        $data['location'] = $this->location_model->_list_root();
        $data['cateogries'] = $this->category_model->_list();
        $data['list_users'] = $this->user_model->_list();
        $data['list_gallery'] = $this->gallery_model->_list_by_content($this->product);
        $data['list_choose_cate'] = $this->content_model->getlist_category($this->product);
        $data['content_details'] = $this->content_model->_get_details_info($this->product);
        $locationid = $this->content_model->_getlocationid($this->product);
        $data['more_content'] = $this->content_model->_list_diff($this->product, $locationid);
        $newdata = array(
            'title_content' => $this->content_model->_return_title($this->product),
        );
        $data['sub_location'] = $this->load_sub_location();
        $this->session->set_userdata($newdata);
        $this->load->view( "template2/index", $data);
    }

    public function template() {
        if ($this->session->userdata('template') == 1) {
            return "template2/index";
        } else {
            return "frontend/index";
        }
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
