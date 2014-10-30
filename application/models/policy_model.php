<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Policy_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
     public function _list() {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('bm_type');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }
    
     public function _list_diff($id=null) {
         $this->db->where('id !=', $id);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('bm_type');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }
    
    
    public function _details($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('bm_type');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function _add($type_name) {
        $data = array(
            'type_name' => $type_name, 
        );
        $this->db->insert('bm_type', $data);
        return 1;
    }
    
    public function _update($id,$type_name) {
        $data = array(
            'type_name' => $type_name, 
        );
        $this->db->where('id', $id);
        $this->db->update('bm_type', $data);
        return 1;
    }
    
   
    
    
    function _del($id) {  
        $this->db->where('id', $id);
        $this->db->delete('bm_type');
    }
    
}
