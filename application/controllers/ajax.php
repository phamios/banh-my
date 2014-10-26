<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();

class Ajax extends CI_Controller {

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
        $this->load->model('content_model');
        $this->load->model('user_model');
        $this->load->model('location_model');
        $this->load->model('type_model');
        $this->load->model('category_model');
        $this->load->model('search_model');
        $this->load->helper(array('form', 'url'));
        @session_start();
    }

    public function list_sub_location($id) {
        if ($id == 0) {
            echo "<span style='color:red;'>Chưa chọn địa điểm !</span>";
        } else {
            $data = $this->location_model->get_list_sub_location($id);
            echo '<select style="width:92%;" name="location_value" id="location_value">';
            foreach ($data as $value) {
                echo '<option value="' . $value->id . '">' . $value->location_name . '</option>';
            }
            echo "</select>";
        }
    }

}
