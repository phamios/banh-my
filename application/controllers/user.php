<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

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
        $this->load->model('report_model');
        $this->load->model('search_model');
        $this->load->helper("text");
        $this->load->helper("slug");
        //$this->load->library('sonclass');
        $this->load->helper(array('form', 'url'));
        @session_start();
    }

    public function upgrade() {
        redirect('user/deposit');
    }

    public function history() {
        redirect('user/favor');
    }
    
    public function  template(){
        if($this->session->userdata('template') == 1){
            return "template2/index";
        }else{
            return "frontend/index";
        }
    }

    public function index() {
        if ($this->session->userdata('userid')) {
            $data['services'] = $this->category_model->_list();
            $data['slider'] = $this->content_model->_list_hot_favor();
            $data['userdetails'] = $this->user_model->details_user($this->session->userdata('userid'));
            $data['current_balance'] = $this->user_model->_current_balance($this->session->userdata('userid'));
            $data['location'] = $this->location_model->_list_root();
            $data['sub_location'] = $this->load_sub_location();
            $this->load->view( "template2/index",$data);
        } else {
            redirect('user/login');
        }
    }

    public function changepass() {
        if ($this->session->userdata('userid')) {
            if (isset($_REQUEST['btt_submit'])) {
                $oldpass = $this->input->post('old_pass', true);
                $newpass = $this->input->post('new_pass', true);
                $result = $this->user_model->_checkpass($this->session->userdata('userid'), $oldpass);

                if ($result == 1) {
                    $this->user_model->_update_pass($this->session->userdata('userid'), $newpass);
                } else {
                    redirect('user/changepass');
                }
                redirect('user');
            }
            $data['slider'] = $this->content_model->_list_hot_favor();
            $data['services'] = $this->category_model->_list();
            $data['userdetails'] = $this->user_model->details_user($this->session->userdata('userid'));
            $data['current_balance'] = $this->user_model->_current_balance($this->session->userdata('userid'));
            $data['location'] = $this->location_model->_list_root();
            $data['sub_location'] = $this->load_sub_location();
            $this->load->view( "template2/index",$data);
        } else {
            redirect('user/login');
        }
    }

    public function message() {
        if ($this->session->userdata('userid')) {
            $data['slider'] = $this->content_model->_list_hot_favor();
            $data['services'] = $this->category_model->_list();
            $data['userdetails'] = $this->user_model->details_user($this->session->userdata('userid'));
            $data['current_balance'] = $this->user_model->_current_balance($this->session->userdata('userid'));
            $data['location'] = $this->location_model->_list_root();
            $data['sub_location'] = $this->load_sub_location();
            $data['messagies'] = $this->user_model->_show_message($this->session->userdata('userid'));
            $this->load->view( "template2/index",$data);
        } else {
            redirect('user/login');
        }
    }

    public function favor() {
        if ($this->session->userdata('userid')) {
            $data['slider'] = $this->content_model->_list_hot_favor();
            $data['services'] = $this->category_model->_list();
            $data['userdetails'] = $this->user_model->details_user($this->session->userdata('userid'));
            $data['current_balance'] = $this->user_model->_current_balance($this->session->userdata('userid'));
            $data['location'] = $this->location_model->_list_root();
            $data['sub_location'] = $this->load_sub_location();
            $data['list_favor'] = $this->content_model->_list_favor_user($this->session->userdata('userid'));
            $this->load->view( "template2/index",$data);
        } else {
            redirect('user/login');
        }
    }

    public function report() {
        if ($this->session->userdata('userid')) {
            $data['slider'] = $this->content_model->_list_hot_favor();
            $data['services'] = $this->category_model->_list();
            $data['userdetails'] = $this->user_model->details_user($this->session->userdata('userid'));
            $data['current_balance'] = $this->user_model->_current_balance($this->session->userdata('userid'));
            $data['location'] = $this->location_model->_list_root();
            $data['list_content'] = $this->content_model->_list();
            $data['sub_location'] = $this->load_sub_location();
            $data['list_order'] = $this->report_model->_list_order($this->session->userdata('userid'));
            $this->load->view( "template2/index",$data);
        } else {
            redirect('user/login');
        }
    }

    public function read_mess($id) {
        if ($this->session->userdata('userid')) {
            $data['slider'] = $this->content_model->_list_hot_favor();
            $data['services'] = $this->category_model->_list();
            $data['userdetails'] = $this->user_model->details_user($this->session->userdata('userid'));
            $data['current_balance'] = $this->user_model->_current_balance($this->session->userdata('userid'));
            $data['location'] = $this->location_model->_list_root();
            $data['messagies'] = $this->user_model->_mess_details($id);
            $data['sub_location'] = $this->load_sub_location();
            $this->load->view( "template2/index",$data);
        } else {
            redirect('user/login');
        }
    }

    public function deposit($result = null) {
        if ($result <> null) {
            $user = explode("_", $result);
            $userid = $user[1];
            $amount = $user[2];
            $result = $this->user_model->check_exit($userid);
            if ($result == 1) {
                $this->user_model->_update_balance($userid, $amount, $type = 1);
            }
        }
        if ($this->session->userdata('userid')) {
            $data['slider'] = $this->content_model->_list_hot_favor();
            $data['services'] = $this->category_model->_list();
            $data['userdetails'] = $this->user_model->details_user($this->session->userdata('userid'));
            $data['current_balance'] = $this->user_model->_current_balance($this->session->userdata('userid'));
            $data['location'] = $this->location_model->_list_root();
            $this->load->model('config_model');
            $data['list_payment'] = $this->config_model->_list_payment();
            if (isset($_REQUEST['btt_submit'])) {
                $amount = $this->input->post('amount_deposit', true);
                $reciever = $this->input->post('reciever');
                $product = "000001";
                $return = site_url('user/deposit/successful_' . $this->session->userdata('userid') . '_' . $amount);
                $url = "https://www.nganluong.vn/button_payment.php?receiver=$reciever&product_name=$product&price=$amount&return_url=$return";
                redirect($url);
            }
            $data['sub_location'] = $this->load_sub_location();
            $this->load->view( "template2/index",$data);
        } else {
            redirect('user/login');
        }
    }

    public function login() {
        if (isset($_REQUEST['btt_submit'])) {
            $username = $this->input->post('email', true);
            $pass1 = $this->input->post('password', true);
            $result = $this->user_model->_authentication($username, $pass1);

            if ($result == null) {
                redirect('user/login/' . rand(1, 10));
            } else {
                $newdata = array(
                    'userid' => $result,
                    'username' => $username
                );
                $this->session->set_userdata($newdata);
                redirect('home/index');
            }
        }
        $data['sub_location'] = $this->load_sub_location();
        $data['slider'] = $this->content_model->_list_hot_favor();
        $data['services'] = $this->category_model->_list();
        $data['location'] = $this->location_model->_list_root();
        $this->load->view( "template2/index",$data);
    }

    public function logout() {
        $this->session->unset_userdata('userid');
        $this->session->unset_userdata('username');
        redirect('home');
    }

    public function register() {
        if (isset($_REQUEST['sub_register'])) {
            $capcha = $this->input->post('captcha_verify', true);
            if (!empty($capcha)) {
                if (empty($_SESSION['captcha']) || trim(strtolower($capcha)) != $_SESSION['captcha']) {
                    $captcha_message = "Invalid captcha";
                    $style = "background-color: #FF606C";
                } else {
                    $email = $this->input->post('email', true);
                    $password = $this->input->post('password', true);
                    $result = $this->user_model->_add($email, $password, 0, 1);
                    if ($result) {
                        $newdata = array(
                            'userid' => $result,
                            'username' => $email
                        );
                        $this->session->set_userdata($newdata);
                        redirect('home/index');
                    } else {
                        redirect('user/register');
                    }
                }

                $request_captcha = htmlspecialchars($_REQUEST['captcha_verify']);
                unset($_SESSION['captcha']);
            }
        }
        $data['sub_location'] = $this->load_sub_location();
        $data['slider'] = $this->content_model->_list_hot_favor();
        $data['services'] = $this->category_model->_list();
        $data['location'] = $this->location_model->_list_root();
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
