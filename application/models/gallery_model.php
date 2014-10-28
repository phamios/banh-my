<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gallery_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    public function _list($userid=null) {
        if($userid <> null){
            $this->db->where('userid', $userid);
        } 
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('bm_gallery');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function _list_by_content($contentid) {
        $this->db->where('contentid', $contentid);
        $this->db->order_by('id', 'asc');
        $query = $this->db->get('bm_gallery');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function _add($contentid, $images,$userid) {
        $data = array(
            'contentid' => $contentid,
            'images_link' => $images,
            'userid'=>$userid,
        );
        $this->db->trans_start();
        $this->db->insert('bm_gallery', $data);
        $this->db->trans_complete();
    }
    
    function _del($id) {
        $this->db->where('id', $id);
        $this->db->delete('bm_content');
    }

}
