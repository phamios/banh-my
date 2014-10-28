<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    public function _list_active_user() {
        $this->db->where('active', 1);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('bm_user');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
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
    
    public function check_exit($id){
        $this->db->where('id', $id);
        $query = $this->db->get('bm_user');
        if ($query->num_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function encode($value = null) {
        return md5($value);
    }

    public function _authen_admin($user, $pass) {
        $this->db->where(array(
            "username" => $user,
            "password" => $this->encode($pass),
        ));
        $query = $this->db->get('bm_admin');
        if ($query->num_rows() > 0) {
            $this->_update_login($user);
            return true;
        } else {
            return false;
        }
    }

    public function _update_login($username) {
        $data = array(
            'datelogin' => date("Y-m-d h:s:m"),
        );
        $this->db->where('username', $username);
        $this->db->update('bm_admin', $data);
    }

    public function _update_userlogin($id) {
        $data = array(
            'createdate' => date("Y-m-d h:s:m"),
        );
        $this->db->where('id', $id);
        $this->db->update('bm_user', $data);
    }

    public function _checkpass($id, $passold) {
        $this->db->where(array(
            "id" => $id,
            "password" => $this->encode($passold),
        ));
        $query = $this->db->get('bm_user');
        if ($query->num_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }
    
    public function _show_message($userid  ){
        $sql = "SELECT bm_message.id, 
                        bm_message.mess_content, 
                        bm_message.mess_title, 
                        bm_message.userid, 
                        bm_user.id, 
                        bm_user.username
                FROM bm_user INNER JOIN bm_message ON bm_user.id = bm_message.userid WHERE bm_user.id = ".$userid;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }
    
    public function _mess_details($id){
        $this->db->where('id',$id);
        $query = $this->db->get("bm_message");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }
    
   

    public function _update_pass($userid, $pass) { 
        $data = array(
            'password' => $this->encode($pass),
        );
        $this->db->where('id', $userid);
        $this->db->update('bm_user', $data);
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

        $this->db->trans_start();
        $this->db->insert('bm_user', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    public function check_balance($userid = null, $cost = null) {
        $current = $this->_current_balance($userid);
        if ($cost > $current) {
            return 0;
        } else {
            return 1;
        }
    }

    public function _update_balance($userid = 0, $balacing = 0, $type = 1) {
        $current = $this->_current_balance($userid);
        if ($type == 1) {
            $total = $balacing + $current;
        } else {
            $total = $current - $balacing;
        }
        $data = array(
            'balacing' => $total,
            'createdate' => date("Y-m-d h:s:m"),
        );
        $this->db->where('id', $userid);
        $this->db->update('bm_user', $data);
        $this->_update_deposit_history($userid, $total, $type);
    }

    public function _current_balance($userid) {
        $this->db->where('id', $userid);
        $query = $this->db->get('bm_user');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $value) {
                return $value->balancing;
            }
        } else {
            return null;
        }
    }

    //Type = 1: Deposit 
    // Type = another: buy, withdraw
    public function _update_deposit_history($userid, $deposit, $type) {
        $data = array(
            'userid' => $user_id,
            'createdate' => date("Y-m-d h:s:m"),
            'balacing' => $this->_current_balance($userid),
            'deposit' => $deposit,
            'createdate' => date("Y-m-d h:s:m"),
            'changetype' => $type,
        );
        $this->db->where('id', $user_id);
        $this->db->update('bm_balance_history', $data);
    }

    public function _banned($userid, $active) {

        $data = array(
            'active' => $active,
            'createdate' => date("Y-m-d h:s:m"),
        );
        $this->db->where('id', $userid);
        $this->db->update('bm_user', $data);
    }

    public function _update_status($id, $active) {
        $data = array(
            'active' => $active,
        );
        $this->db->where('id', $id);
        $this->db->update('bm_user', $data);
        return 1;
    }

    function _del($id) {
        $this->db->where('id', $id);
        $this->db->delete('bm_user');
    }

}
