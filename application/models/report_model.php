<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Report_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    public function _list() {
        $this->db->order_by('id', 'DESC');
        
        $query = $this->db->query("SELECT bm_content.id, 
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
	bm_location.location_root, 
	bm_location.location_name, 
	bm_location.id
FROM bm_location INNER JOIN bm_content ON bm_location.id = bm_content.localid
ORDER BY bm_content.id ASC");
        
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

}
