<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();

class Content extends CI_Controller {

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
        $this->load->model('gallery_model');
        $this->load->model('search_model');
        $this->load->helper(array('form', 'url'));
        @session_start();
    }

    public function index() {
        if ($this->session->userdata('adminusername') == null) {
            redirect('admincp/login');
        } else {
            $data['list_content'] = $this->content_model->_list();
            $data['list_user'] = $this->user_model->_list();
            $data['list_category'] = $this->category_model->_list();
            $data['list_location'] = $this->location_model->_list();
            $data['list_location_root'] = $this->location_model->_list_root();
            $data['list_type'] = $this->type_model->_list();
            $this->load->view('admin/dashboard', $data);
        }
    }

    public function add() {
        if ($this->session->userdata('adminusername') == null) {
            redirect('admincp/login');
        } else {
            if (isset($_REQUEST['btt_submit'])) {
                $userid = $this->session->userdata('adminid');
                $localid = $this->input->post('location_value', true);
                $cateid = $this->input->post('category', true);
                $typeid = $this->input->post('content_type', true);
                $title = $this->input->post('content_title', true);
                $content = $this->input->post('content_content');
                $cost = $this->input->post('content_cost', true);
                $review = $this->input->post('content_review', true);
                $status = $this->input->post('content_active', true);
                $images = $this->do_upload_image('./upload/content/', 'content_images');
                $contentid = $this->content_model->_add($localid, $typeid, $userid, $title, $content, $images, $cost, $status, $review);
                $i = 0;
                foreach ($cateid as $cate) {
                    $this->content_model->add_cate_content($cateid[$i], $contentid);
                    $i++;
                }
                redirect('admin/content/index');
            }
            $this->load->view('admin/dashboard');
        }
    }

    public function edit($id = null) {
        if ($this->session->userdata('adminusername') == null) {
            redirect('admincp/login');
        } else {
            if (isset($_REQUEST['btt_submit'])) {
                $catename = $this->input->post('cate_name', true);
                $cateroot = $this->input->post('cate_root', true);
                $cate_active = $this->input->post('cate_active', true);
                $cate_images = $this->do_upload_image('./upload/content/', 'cate_images');
                $this->content_model->_update($id, $catename, $cateroot, $cate_active, $cate_images);
                redirect('admin/content/index');
            }
            $data['category'] = $this->content_model->_details($id);
            $data['list_content'] = $this->content_model->_list_diff($id);
            $this->load->view('admin/dashboard', $data);
        }
    }

    public function gallery() {
        if ($this->session->userdata('adminusername') == null) {
            redirect('admincp/login');
        } else {
            $this->load->model('content_model');
            $this->load->model('gallery_model');
            if (isset($_FILES['upload']['name'])) {
                // total files //
                $count = count($_FILES['upload']['name']);
                // all uploads //
                $uploads = $_FILES['upload'];
                $itemid = $this->input->post('itemid', true);

                for ($i = 0; $i < $count; $i++) {
                    if ($uploads['error'][$i] == 0) {
                        move_uploaded_file($uploads['tmp_name'][$i], './upload/content/' . $uploads['name'][$i]); 
                        $this->gallery_model->_add($itemid, $uploads['name'][$i],$this->session->userdata('adminid'));
                    }
                }
            }
            
            $data['allgallery'] = $this->gallery_model->_list();
            $data['allcontents'] = $this->content_model->_getList_byuser();
            $this->load->view('admin/dashboard', $data);
        }
    }

    public function del_gallery($id) {
        if ($this->session->userdata('adminusername') == null) {
            redirect('admincp/login');
        } else {
            $this->load->model('content_model');
            $this->gallery_model->_del($id);
            redirect('admin/content/gallery');
        }
    }
    
    public function ajaximagegallery($id){
    	$this->load->model('gallery_model');
    	$result = $this->gallery_model->_list_by_content($id);
    	if(!$result){
    		echo "Hiện tại nội dung này chưa có ảnh đính kèm.";
    	}else{
	    	echo '<ul class="ace-thumbnails">';
	    	foreach($result as $img){
	    		echo '<li>';
	    			echo '<a href="'. base_url('upload/content/'.$img->images_link). '" > ';
	    				echo '<img alt="150x150" width="150" height="150" src="'.base_url('upload/content/'.$img->images_link).'" />';
	    			echo '</a>';
	    			echo '<div class="tools tools-bottom">';
	    				echo '<a href="'.site_url('admin/content/del_gallery/'.$img->id).'"> <i class="icon-remove red"></i> Xóa </a>';
	    			echo '</div>';
	    		echo '</li>';

	    	}
	    	echo '</ul>';
    	}
    }
    
    

    public function del($id = null) {
        if ($this->session->userdata('adminusername') == null) {
            redirect('admincp/login');
        } else {
            $this->content_model->_del($id);
            redirect('admin/content/index');
        }
    }

    public function status($id = null, $active = null) {
        if ($this->session->userdata('adminusername') == null) {
            redirect('admincp/login');
        } else {
            $this->content_model->_update_status($id, $active);
            redirect('admin/content/index');
        }
    }

    public function resize_image($dir, $new_name, $image) {
        $img_cfg_thumb['image_library'] = 'gd2';
        $img_cfg_thumb['source_image'] = "./" . $dir . "/" . $image;
        $img_cfg_thumb['maintain_ratio'] = TRUE;
        $img_cfg_thumb['new_image'] = $new_name;
        $img_cfg_thumb['width'] = 189;
        $img_cfg_thumb['height'] = 217;
        $this->load->library('image_lib');
        $this->image_lib->initialize($img_cfg_thumb);
        $this->image_lib->resize();
    }

    function do_upload_image($mypath, $filename) {
        $config['upload_path'] = $mypath;
        $config['allowed_types'] = 'gif|jpg|png|bmp';
        $config['max_size'] = '80000';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (isset($filename)) {
            if (!$this->upload->do_upload($filename)) {
                $error = array('error' => $this->upload->display_errors());
                return NULL;
            } else {
                $data = array('upload_data' => $this->upload->data());
                $imagename = $this->upload->file_name;
                $this->resize_image($mypath, 'thumbs_' . $imagename, $imagename);
                return $imagename;
            }
        } else {
            echo $this->upload->display_errors();
        }
    }

}
