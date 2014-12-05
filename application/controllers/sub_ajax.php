<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();

class Sub_ajax extends CI_Controller {

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

    public function deposit($userid,$seri, $pin, $type) {
        $this->load->library('card_payment');  
        $result = $this->card_payment->payment($seri, $pin, $type, $userid);
         $this->user_model->_update_balance($result['userid'], $result['xu'], $type = 1);
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

    public function content_favor() {
        $data = $this->content_model->_list_hot_favor();
        if ($data) {

            foreach ($data as $value) {
                echo '<div style="margin-right: 1px;" class="item">
                            <div class="img rel">
                                <a href="' . site_url("details/" . create_slug($value->title) . "-" . $value->contentid . ".html") . '">
                                    <img src="' . base_url('upload/content/thumbs_' . $value->images) . '" class="imgnone">
                                </a>
                                <div class="divWatchLate"></div>
                                <div class="hidden-tip" fid="9909">
                                    <div id="popupTit" class="tit ">
                                        <span id="lblTitleEng" class="bold cB block">
                                            ' . $value->title . '   
                                               
                                        </span>
                                        <span id="lblTitle" class="cG block" style="margin: 3px 0px;"></span> 
                                    </div>
                                    <div id="popupContent" class="content">
                                        <div class="mb7 justify lh16">
                                            <span id="lblDes" class="mb12 justify">
                                            </span>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="info">
                                <span class="iconPlaySS"></span>
                                <p class="title" style="width:180px; height:38px; overflow: hidden;">
                                    <a href="' . site_url("details/" . create_slug($value->title) . "-" . $value->contentid . ".html") . '">' . $value->title . '</a>
                                        <br/>
                                       
                                </p>
                                <a href="#"><span class="iconPlayS"></span></a>
                            </div>
                        </div> ';
            }
        } else {
            echo "Chưa có hàng";
        }
    }

    public function content_hot() {
        $data = $this->content_model->_list_hot_view();
        if ($data) {
            echo ' <ul class="list_m">';
            foreach ($data as $value) {
                echo '<li>
                    <h2>
                    <a href="' . site_url("details/" . create_slug($value->title) . "-" . $value->contentid . ".html") . '" title="' . $value->title . '">
                        <span class="poster">
                        <img src="' . base_url('upload/content/thumbs_' . $value->images) . '" alt="' . $value->title . '">
                        </span>
                        <br>
                        <span class="title left" style="width:100%; height:28px; overflow: hidden;">
                         ' . $value->title . '
                         </span>
                         <div class="clear"></div>
                          <div class="fontN" style="color:red;height:50px;"> Yêu thích: 
                          ' . $value->review . ' 
                              <img src="' . base_url('src/images/rating.png') . '" alt="rate"> <br/>
                              <span style="font-size:20px;color:black">    ' . number_format($value->cost) . 'đ </span>
                          </div>
                          <span class="hot"></span>
                     </a>
                    </h2>
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
            $site_template = $value->template;
            $analytic = $value->analytic;
        }
        $newdata = array(
            'site_name' => $site_name,
            'site_meta' => $site_meta,
            'site_description' => $site_description,
            'site_footer' => $site_footer,
            'site_url' => $site_url,
            'site_mode' => $site_mode,
            'site_logo' => $site_logo,
            'site_template' => $site_template,
            'site_analytic' => $analytic
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
        foreach ($typies as $type) {

            echo '<div class="box">';
            echo '<p class="deBlue"></p>
                   <div class="header">
                    <a href="' . site_url("type/" . create_slug($type->type_name) . "-" . $type->id . ".html") . '">' . $type->type_name . '</a>
                    </div>
                    <div class="content" > ';
            $contents = $this->content_model->_get_list_by_type($type->id, $this->session->userdata('locationid'));
            if ($contents) {
                echo ' <ul class="list_m">';
                foreach ($contents as $value) {
                    echo '<li>
                    <h2>
                    <a href="' . site_url("details/" . create_slug($value->title) . "-" . $value->contentid . ".html") . '" title="' . $value->title . '">
                        <span class="poster">
                        <img src="' . base_url('upload/content/thumbs_' . $value->images) . '" alt="' . $value->title . '">
                        </span>
                        <br>
                        <span class="title left" style="width:100%; height:28px; overflow: hidden;">
                         ' . $value->title . '
                         </span>
                         <div class="clear"></div>
                          <div class="fontN" style="color:red;height:50px;"> Yêu thích: 
                          ' . $value->review . ' 
                              <img src="' . base_url('src/images/rating.png') . '" alt="rate"> <br/>
                              <span style="font-size:20px;color:black">    ' . number_format($value->cost) . 'đ </span>
                          </div>
                          
                          <span class="hot"></span>
                     </a>
                    </h2>
                     </li>';
                }
                echo '</ul></div></div></div>';
            } else {
                echo "Chưa có hàng";
            }
            echo '<div class="clear"></div>';
        }
    }

}
