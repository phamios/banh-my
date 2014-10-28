<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Message_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    public function _send($title, $content, $userid) {
        $data = array(
            'userid' => $userid,
            'mess_title' => $title,
            'mess_content' => $content,
        ); 
        $this->db->trans_start();
        $this->db->insert('bm_message', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

}
