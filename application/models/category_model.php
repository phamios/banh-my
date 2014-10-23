<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Category_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
     public function _list() {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('bm_category');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }
    
    public function _details($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('bm_category');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function _add($catename,$cateroot,$active,$cate_images=null) {
        $data = array(
            'cate_name' => $catename,
            'cate_root' => $cateroot,
            'active' => $active,
            'cate_image' => $cate_images,
        );
        $this->db->insert('bm_category', $data);
        return 1;
    }
    
    public function _update($id,$catename,$cateroot,$active,$cate_images=null) {
        $data = array(
            'cate_name' => $catename,
            'cate_root' => $cateroot,
            'active' => $active,
            'cate_image' => $cate_images,
        );
        $this->db->where('id', $id);
        $this->db->update('bm_category', $data);
        return 1;
    }
    
    public function _update_status($id,$active){
        $data = array(
            'active' => $active, 
        );
        $this->db->where('id', $id);
        $this->db->update('bm_category', $data);
        return 1;
    }
    
    
    function _del($id) {  
        $this->db->where('id', $id);
        $this->db->delete('bm_category');
    }
    
}
