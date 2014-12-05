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
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('bm_user');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function check_buy($userid,$contentid) {
        $this->db->where(array(
            'userid' =>$userid,
            'contentid'=>$contentid,
        
        ));
        $query = $this->db->get('bm_order');
        if ($query->num_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function _list($type=null) {
        
        $this->db->order_by('id', 'DESC');
        if($type==9){
            $query = $this->db->get('bm_admin');
        } else {
            $query = $this->db->get('bm_user');
        }
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

    public function check_exit($id) {
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

    public function _show_message($userid) {
        $sql = "SELECT bm_message.id, 
                        bm_message.mess_content, 
                        bm_message.mess_title, 
                        bm_message.userid, 
                        bm_user.id, 
                        bm_user.username
                FROM bm_user INNER JOIN bm_message ON bm_user.id = bm_message.userid WHERE bm_user.id = " . $userid;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function _mess_details($id) {
        $this->db->where('id', $id);
        $query = $this->db->get("bm_message");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function _get_balancing($id) {
        $this->db->where('id', $id);
        $query = $this->db->get("bm_user");
        if ($query->num_rows() > 0) {
            foreach($query->result() as $value){
                return $value->balancing;
            }
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

    public function _get_type($userid) {
        $this->db->where('id', $userid);
        $query = $this->db->get("bm_user");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $value) {
                return $value->usertype;
            }
        } else {
            return null;
        }
    }

    public function _authentication($username, $password) {

        $this->db->where(array(
            "username" => $username,
            "password" => $this->encode($password),
        ));
        $query = $this->db->get('bm_user');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $value) {
                return $value->id;
            }
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

    public function _update_balance($userid = 0, $balancing = 0, $type = 1, $contentid = 0) {
        $current = $this->_current_balance($userid);
        $total = 0;
        if ($type == 1) {
            $total = $balancing + $current;
        } else {
            $total = $current - $balancing;
        }
        $data = array(
            'balancing' => $total,
            'createdate' => date("Y-m-d h:s:m"),
        );
        $this->db->where('id', $userid);
        $this->db->update('bm_user', $data);
        if ($type != 1) {
           $this->_buy_item($userid, $contentid);
        }  
        
        $this->_update_deposit_history($userid, $balancing, $type);
    }

    public function _buy_item($userid, $contentid) {
        $data = array(
            'userid' => $userid,
            'contentid' => $contentid,
            'datecreate' => date("Y-m-d h:s:m"),
        );
        $this->db->insert('bm_order', $data);
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
            'userid' => $userid,
            'balancing' => $this->_current_balance($userid),
            'deposit' => $deposit,
            'createdate' => date("Y-m-d h:s:m"),
            'changetype' => $type,
        );
        $this->db->insert('bm_balance_history', $data);
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

    function total() {
        return $this->db->count_all('bm_user');
    }

    function total_active() {
        $this->db->where('active', 1);
        return $this->db->count_all('bm_user');
    }

    function total_unactive() {
        $this->db->where('active', 0);
        return $this->db->count_all('bm_user');
    }

    function total_trans() {
        return $this->db->count_all('bm_balance_history');
    }

    function total_message() {
        return $this->db->count_all('bm_message');
    }

}
