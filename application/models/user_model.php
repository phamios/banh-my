<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    public function _list() {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('bm_user');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function details_user($userid) {
        $this->db->where('id', $userid);
        $query = $this->db->get('bm_user');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function encode($value = null) {
        return md5($value);
    }
    
    public function _authen_admin($user,$pass){ 
        $this->db->where(array(
            "username"=>$user,
            "password"=>$this->encode($pass), 
        ));
        $query = $this->db->get('bm_admin');  
        if($query->num_rows() > 0){ 
            $this->_update_login($user);
            return true;
        } else {
            return false;
        }
    }
    
    public function _update_login($username){
        $data = array(
            'datelogin' => date("Y-m-d h:s:m"),
        );
        $this->db->where('username', $username);
        $this->db->update('bm_admin', $data); 
    }

    public function _authentication($username, $password) {
        $this->db->where(array(
            "username" => $username,
            "password" => $this->encode($password),
        ));
        $query = $this->db->get('bm_user');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    //User Type: 
    // user_type = 0 : default member 
    // user_type= 1 : active member 
    // user_type = 2 : premieum member
    public function _add($username, $password, $usertype, $active) {
        $data = array(
            'username' => $username,
            'password' => $this->encode($password),
            'active' => $usertype,
            'usertype' => $active,
            'createdate' => date("Y-m-d h:s:m"),
        );
        $this->db->insert('bm_user', $data);
        return 1;
    }

    public function _update_balance($userid = 0,$balacing = 0,$type=1) {
        $current = $this->_current_balance($userid);
        if($type == 1){
            $total = $balacing + $current;
        }else{
            $total = $current - $balacing;
        }
        $data = array(
            'balacing' => $total,
            'createdate' => date("Y-m-d h:s:m"),
        );
        $this->db->where('id', $userid);
        $this->db->update('bm_user', $data);
        $this->_update_deposit_history($userid,$total,$type);
    }
    
    public function _current_balance($userid){
        $this->db->where('id',$userid);
        $query = $this->db->get('bm_user');
        if ($query->num_rows() > 0) {
            foreach($query->result() as $value){
                return $value->balacing;
            }
        } else {
            return null;
        }
    }
    
    //Type = 1: Deposit 
    // Type = another: buy, withdraw
    public function _update_deposit_history($userid,$deposit,$type){
        $data = array(
            'userid' => $user_id,
            'createdate' => date("Y-m-d h:s:m"),
            'balacing' => $this->_current_balance($userid),
            'deposit'=>$deposit,
            'createdate' => date("Y-m-d h:s:m"),
            'changetype' =>$type,
        );
        $this->db->where('id', $user_id);
        $this->db->update('bm_balance_history', $data);
    }
    
    
    public function _banned($userid,$active){ 
         
        $data = array(
            'active' => $active,
            'createdate' => date("Y-m-d h:s:m"),
        );
        $this->db->where('id', $userid);
        $this->db->update('bm_user', $data); 
    }

}
