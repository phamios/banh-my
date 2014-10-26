<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Content_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
     public function _list() {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('bm_content');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }
    
    
    
     public function _list_diff($id=null) {
        $this->db->where('id !=', $id);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('bm_content');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }
    
    public function _getList_bylocation($localid){
        $this->db->where('localid', $localid);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('bm_content');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }
    
    public function _getList_bycategory($cateid){
        $this->db->where('catecontentid', $cateid);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('bm_content');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }
    
    
    public function _details($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('bm_content');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function _add($localid,$catecontentid,$typeid,$userid,$title,$content,$gallery_id,$images,$cost,$status,$review) {
        $data = array(
            'localid' => $localid,
            'catecontentid' => $catecontentid,
            'typeid' => $typeid,
            'userid' => $userid,
            'title' => $title,
            'content' => $content,
            'gallery_id' => $gallery_id,
             'images'=>$images,
            'cost' => $cost,
            'datecreated' => date("Y-m-d h:s:m"),
            'status' => $status,
            'review' => $review,
        );
        $this->db->insert('bm_content', $data);
        return 1;
    }
    
    public function _update($id,$localid,$catecontentid,$typeid,$userid,$title,$content,$gallery_id,$images,$cost,$status,$review) {
        $data = array(
            'localid' => $localid,
            'catecontentid' => $catecontentid,
            'typeid' => $typeid,
            'userid' => $userid,
            'title' => $title,
            'content' => $content,
            'gallery_id' => $gallery_id,
            'images'=>$images,
            'cost' => $cost,
            'datecreated' => date("Y-m-d h:s:m"),
            'status' => $status,
            'review' => $review,
        );
        $this->db->where('id', $id);
        $this->db->update('bm_content', $data);
        return 1;
    }
    
    public function _update_status($id,$active){
        $data = array(
            'status' => $active, 
        );
        $this->db->where('id', $id);
        $this->db->update('bm_content', $data);
        return 1;
    }
    
    
    function _del($id) {  
        $this->db->where('id', $id);
        $this->db->delete('bm_content');
    }
    
}
