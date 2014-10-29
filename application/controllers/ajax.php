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
        $this->load->helper("slug");
        $this->load->library('tools_lib');
        $this->load->model('content_model');
        $this->load->model('user_model');
        $this->load->model('location_model');
        $this->load->model('type_model');
        $this->load->model('category_model');
        $this->load->model('config_model');
        $this->load->model('search_model');
        $this->load->helper(array('form', 'url'));
        @session_start();
    }

    public function request($userid = null, $cost = null, $type = null, $contentid = null) {
        if ($this->user_model->check_balance($userid, $cost) == 0) {
            echo "Bạn không đủ tiền mua rồi !";
        } else {

            $this->user_model->_update_balance($userid, $cost, $type, $contentid);
            $result = $this->content_model->_return_cost($contentid);
            echo $result;
        }
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

    public function content_hot() {
        $data = $this->content_model->_list_hot_view();
        if ($data) {
            echo ' <ul >';
            foreach ($data as $value) {
                echo '<li class="width9">
                <div class="thumb">
                    <a href="' . site_url("details/" . create_slug($value->title) . "-" . $value->contentid . ".html") . '" title="' . $value->title . '">
                        <img src="' . base_url('upload/content/thumbs_' . $value->images) . '" alt="' . $value->title . '">
                    </a>
                </div>
                <div class="name">
                    <a href="' . site_url("details/" . create_slug($value->title) . "-" . $value->contentid . ".html") . '" title="' . $value->title . '">
                        ' . $value->title . '
                    </a>
                </div>
                <div class="street_girl">
                    KV:<a href="' . site_url('home/location/' . $value->location_id) . '" title="' . $value->location_name . '">' . $value->location_name . '</a>
                </div>
                <div class="rating_box">
                    <div class="bacic" data-average="0" data-id="' . $value->review . '"></div>
                </div>
                <div class="price">
                    Giá: <span>' . number_format($value->cost) . ' đ</span>
                </div>
            </li>';
            }
            echo '</ul>';
        } else {
            echo "Chưa có hàng";
        }
    }

    public function load_default() {
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
        $newdata = array(
            'site_name' => $site_name,
            'site_meta' => $site_meta,
            'site_description' => $site_description,
            'site_footer' => $site_footer,
            'site_url' => $site_url,
            'site_mode' => $site_mode,
            'site_logo' => $site_logo,
        );
        $this->session->set_userdata($newdata);
    }

    public function change_location($id = null) {
        $newdata = array(
            'locationname' => $this->location_model->_return_name($id),
            'locationid' => $id,
        );
        $this->session->set_userdata($newdata);
        redirect('home');
    }

    public function favor($userid, $contentid) {
        if ($userid <> null) {
            $this->content_model->_add_favor($userid, $contentid);
            $title = $this->content_model->_return_title($contentid);
            $url = site_url("details/" . create_slug($title) . "-" . $contentid . ".html");
            redirect($url);
        } else {
            redirect('user/login');
        }
    }

    public function star($id) {
        $this->content_model->_update_review($id);
        $title = $this->content_model->_return_title($id);
        $url = site_url("details/" . create_slug($title) . "-" . $id . ".html");
        redirect($url);
    }

    public function report($userid, $contentid, $content = null) {
        if ($userid <> null) {
            if ($content == null) {
                $content = "Too bad";
            }
            $this->content_model->_add_bad($userid, $contentid, $content);
            $title = $this->content_model->_return_title($contentid);
            $url = site_url("details/" . create_slug($title) . "-" . $contentid . ".html");
            redirect($url);
        } else {
            redirect('user/login');
        }
    }

    public function load_location() {
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
        $i = 0;
        echo '<div class="width25" style="font-size:15px;">
                    <ul>';
        foreach ($location as $loca) {
            $i = $i + 1;
            if ($i == 5) {
                echo "</ul></div>";
            } else {
                echo '<li class=""><b><a href="' . site_url('home/location/' . $loca->id) . '">Gái gọi ' . $loca->location_name . '</a></b></li>';
            }
        }
        echo "</ul></div>";
    }

    public function load_content() {
        $typies = $this->type_model->_list();
        $i = 0;
        foreach ($typies as $type) {
            if ($i == 4) {
                $i = 2;
            } else {
                $i = $i + 1;
            }

            echo '<div class="box_home clear">
                    <div class="box_home_title box_home_title_0' . $i . '">
                        <h3><a href="' . site_url("type/" . create_slug($type->type_name) . "-" . $type->id . ".html") . '">' . $type->type_name . '</a><a href="' . site_url("type/" . create_slug($type->type_name) . "-" . $type->id . ".html") . '" class="pull-righ view-all">Xem toàn bộ</a></h3>
                    </div>
                    <div class="box_home_content "> 
                        <div class="jcarousel-wrapper">
                            <div class="jcarousel">
                                <ul>';
            $contents = $this->content_model->_get_list_by_type($type->id, $this->session->userdata('locationid'));
            if ($contents) {
                echo ' <ul >';
                foreach ($contents as $value) {
                    echo '<li class="width9">
                                            <div class="thumb">
                                                <a href="' . site_url("details/" . create_slug($value->title) . "-" . $value->contentid . ".html") . '" title="' . $value->title . '">
                                                    <img src="' . base_url('upload/content/thumbs_' . $value->images) . '" alt="' . $value->title . '">
                                                </a>
                                            </div>
                                            <div class="name">
                                                <a href="' . $value->contentid . '" title="' . $value->title . '">
                                                    ' . $value->title . '
                                                </a>
                                            </div>
                                            <div class="street_girl">
                                                KV:<a href="' . site_url('home/location/' . $value->id) . '" title="' . $value->location_name . '">' . $value->location_name . '</a>
                                            </div>
                                            <div class="rating_box">
                                                <div class="bacic" data-average="0" data-id="' . $value->review . '"></div>
                                            </div>
                                            <div class="price">
                                                Giá: <span>' . number_format($value->cost) . ' đ</span>
                                            </div>
                                        </li>';
                }
                echo '</ul>';
            } else {
                echo "Chưa có hàng";
            }
            echo ' </div> 
                    </div>
                </div>
                <div class="clear"></div>
            </div>';
        }
    }

}
