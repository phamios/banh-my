<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Config_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    public function _details() {
        $this->db->where('id', 1);
        $query = $this->db->get('bm_config');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }
    
    public function _list_payment(){ 
        $query = $this->db->get('bm_payment');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }
    
    public function _add_payment($name,$email,$logo,$status) {
        $data = array(
            'payment_name' => $name,
            'payment_enable' => $status,
            'payment_logo' => $logo,
            'payment_email' => $email,
        );
        $this->db->insert('bm_payment', $data); 
    }

    public function _update($site_name, $site_meta, $site_description, $site_footer, $site_url, $site_mode, $site_logo) {
        if ($site_logo) {
            $data = array(
                'site_name' => $site_name,
                'site_meta' => $site_meta,
                'site_description' => $site_description,
                'site_footer' => $site_footer,
                'site_url' => $site_url,
                'site_mode' => $site_mode,
                'site_logo' => $site_logo,
            );
        } else {
            $data = array(
                'site_name' => $site_name,
                'site_meta' => $site_meta,
                'site_description' => $site_description,
                'site_footer' => $site_footer,
                'site_url' => $site_url,
                'site_mode' => $site_mode,
            );
        }
        $this->db->where('id', 1);
        $this->db->update('bm_config', $data);
    }

    public function _payment_status($id,$active) {
        $data = array(
            'site_mode' => $active,
        );
        $this->db->where('id', $id);
        $this->db->update('bm_payment', $data);
        return 1;
    }
    
    function _del_payment($id) {  
        $this->db->where('id', $id);
        $this->db->delete('bm_payment');
    }

}
