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
    

    public function _return_cost($contentid){
        $this->db->where('id',$contentid);
        $query = $this->db->get('bm_content');
        if($query->num_rows() <> 0) {
            foreach($query->result() as $value){ 
                return $value->content_phone;
            }
        } else {
            return null;
        }
    }
    
    
    public function getlist_category($contentid = null){
        $sql = "SELECT bm_category.cate_name, 
                    bm_category.cate_root, 
                    bm_category.active, 
                    bm_category.cate_image, 
                    bm_catecontent.cateid, 
                    bm_catecontent.contentid, 
                    bm_content.id
            FROM bm_content INNER JOIN bm_catecontent ON bm_content.id = bm_catecontent.contentid
                     INNER JOIN bm_category ON bm_category.id = bm_catecontent.cateid

            WHERE bm_content.id = ".$contentid;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function _get_details_info($content_id = null) {
        $this->_update_view($content_id);
        $sql = "SELECT bm_content.id as contentid, 
                    bm_content.localid as location_id, 
                    bm_content.typeid, 
                    bm_content.title, 
                    bm_content.userid, 
                    bm_content.content, 
                    bm_content.cost, 
                    bm_content.images, 
                    bm_content.datecreated, 
                    bm_content.`status`, 
                    bm_content.review, 
                    bm_content.`view`, 
                    bm_location.active, 
                    bm_location.location_root, 
                    bm_location.location_name, 
                    bm_location.id
            FROM bm_location INNER JOIN bm_content ON bm_location.id = bm_content.localid
            WHERE bm_content.id = ".$content_id;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function _list_hot_view() {

        $sql = "SELECT bm_content.id as contentid, 
                    bm_content.localid as location_id, 
                    bm_content.typeid, 
                    bm_content.userid, 
                    bm_content.title, 
                    bm_content.content, 
                    bm_content.gallery_id, 
                    bm_content.images, 
                    bm_content.cost, 
                    bm_content.datecreated, 
                    bm_content.`status`, 
                    bm_content.review, 
                    bm_location.active, 
                    bm_content.view,
                    bm_location.location_root, 
                    bm_location.location_name, 
                    bm_location.id
            FROM bm_location INNER JOIN bm_content ON bm_location.id = bm_content.localid
            WHERE bm_content.`status`= 1
            ORDER BY bm_content.view DESC";

        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function _get_list_by_type($typeid,$locationid) {

        $sql = "SELECT bm_content.id as contentid, 
                    bm_content.localid, 
                    bm_content.typeid, 
                    bm_content.userid, 
                    bm_content.title, 
                    bm_content.content, 
                    bm_content.gallery_id, 
                    bm_content.images, 
                    bm_content.cost, 
                    bm_content.datecreated, 
                    bm_content.`status`, 
                    bm_content.review, 
                    bm_location.active, 
                    bm_content.view,
                    bm_location.location_root, 
                    bm_location.location_name, 
                    bm_location.id
            FROM bm_location INNER JOIN bm_content ON bm_location.id = bm_content.localid
            WHERE bm_content.`status`= 1 and bm_location.location_root = ".$locationid." and bm_content.typeid=" . $typeid . " ORDER BY bm_content.view DESC";

        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function _list_diff($id = null) {
        $this->db->where('id !=', $id);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('bm_content');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function _getList_byuser($userid = null) {
        if ($userid <> null) {
            $this->db->where('userid', $userid);
        }
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('bm_content');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function _getList_bylocation($localid = null) {

        $sql = 'SELECT bm_content.id as contentid, 
                        bm_content.localid, 
                        bm_content.typeid, 
                        bm_content.userid, 
                        bm_content.title, 
                        bm_content.content, 
                        bm_content.gallery_id, 
                        bm_content.images, 
                        bm_content.cost, 
                        bm_content.datecreated, 
                        bm_content.`status`, 
                        bm_content.`view`, 
                        bm_content.review, 
                        bm_location.active, 
                        bm_location.location_root, 
                        bm_location.location_name, 
                        bm_location.id
                FROM bm_location INNER JOIN bm_content ON bm_location.id = bm_content.localid
                WHERE bm_content.localid = ' . $localid;

        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function _getList_bycategory($cateid) {
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

    public function add_cate_content($cateid, $contentid) {
        $data = array(
            'cateid' => $cateid,
            'contentid' => $contentid,
        );
        $this->db->trans_start();
        $this->db->insert('bm_catecontent', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    public function _add($localid, $typeid, $userid, $title, $content, $images, $cost, $status, $review,$contact) {
        $data = array(
            'localid' => $localid,
            'typeid' => $typeid,
            'userid' => $userid,
            'title' => $title,
            'content' => $content,
            'images' => $images,
            'cost' => $cost,
            'datecreated' => date("Y-m-d h:s:m"),
            'status' => $status,
            'review' => $review,
            'content_phone' =>$contact,
        );
        $this->db->trans_start();
        $this->db->insert('bm_content', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    public function _update($id, $localid, $typeid, $userid, $title, $content, $images, $cost, $status, $review,$contact) {
        if ($images) {
            $data = array(
                'localid' => $localid,
                'typeid' => $typeid,
                'userid' => $userid,
                'title' => $title,
                'content' => $content,
                'cost' => $cost,
                'images' => $images,
                'datecreated' => date("Y-m-d h:s:m"),
                'status' => $status,
                'review' => $review,
                'content_phone' =>$contact,
            );
        } else {
            $data = array(
                'localid' => $localid,
                'typeid' => $typeid,
                'userid' => $userid,
                'title' => $title,
                'content' => $content,
                'cost' => $cost,
                'datecreated' => date("Y-m-d h:s:m"),
                'status' => $status,
                'review' => $review,
                'content_phone' =>$contact,
            );
        }
        $this->db->where('id', $id);
        $this->db->update('bm_content', $data);
        return 1;
    }

    public function _update_status($id, $active) {
        $data = array(
            'status' => $active,
        );
        $this->db->where('id', $id);
        $this->db->update('bm_content', $data);
        return 1;
    }

    public function _update_view($id) {
        $current = $this->_current_view($id);
        $data = array(
            'view' => $current + 5,
        );
        $this->db->where('id', $id);
        $this->db->update('bm_content', $data);
        return 1;
    }

    public function _current_view($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('bm_content');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $value) {
                return $value->view;
            }
        } else {
            return 0;
        }
    }

    function _del($id) {
        $this->db->where('id', $id);
        $this->db->delete('bm_content');
    }

}
