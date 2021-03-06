<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Location_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    public function _list() {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('bm_location');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function _list_root() {
        $this->db->where('location_root', 0);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('bm_location');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function _lastlist_root() {
        $this->db->limit(1);
        $this->db->where('location_root', 0);
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get('bm_location');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function get_list_sub_location($rootid) {
        $this->db->where('location_root', $rootid);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('bm_location');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function _details($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('bm_location');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }
    
    public function _return_name($id){
        $this->db->where('id', $id);
        $query = $this->db->get('bm_location');
        if ($query->num_rows() > 0) {
            foreach($query->result() as $value){
                return $value->location_name;
            }
        } else {
            return null;
        }
    }

    public function _list_diff($id = null) {
        $this->db->where('id !=', $id);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('bm_location');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function _add($name, $root, $active) {
        $data = array(
            'location_name' => $name,
            'location_root' => $root,
            'active' => $active,
        );
        $this->db->insert('bm_location', $data);
        return 1;
    }

    public function _update($id, $name, $root, $active) {
        $data = array(
            'location_name' => $name,
            'location_root' => $root,
            'active' => $active,
        );
        $this->db->where('id', $id);
        $this->db->update('bm_location', $data);
        return 1;
    }

    public function _update_status($id, $active) {
        $data = array(
            'active' => $active,
        );
        $this->db->where('id', $id);
        $this->db->update('bm_location', $data);
        return 1;
    }

    function _del($id) {
        $this->db->where('id', $id);
        $this->db->delete('bm_location');
    }

}
