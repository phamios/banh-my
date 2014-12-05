<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Search_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    public function _list_top() {
        $this->db->limit(10);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('bm_search');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function get_result($keyword = null, $cost = null, $cateid = null) {
        $sql = "SELECT bm_content.id, 
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
                    bm_content.`view`, 
                    bm_location.id as location_id, 
                    bm_location.location_name, 
                    bm_location.location_root, 
                    bm_location.active, 
                    bm_catecontent.cateid, 
                    bm_catecontent.contentid, 
                    bm_category.cate_name, 
                    bm_category.cate_root, 
                    bm_category.active, 
                    bm_category.cate_image, 
                    bm_category.id
                    FROM bm_category INNER JOIN bm_catecontent ON bm_category.id = bm_catecontent.cateid
                     INNER JOIN bm_content ON bm_content.id = bm_catecontent.contentid
                     INNER JOIN bm_location ON bm_location.id = bm_content.localid  
                     WHERE (1=1)
                ";
        
//        $where= array(); 
        if (strlen($keyword) > 0) {
            $sql .= " AND bm_content.title like '".htmlentities(addslashes($keyword))."%' ";
        }
        if ($cost <> 0) {
            if($cost > 900000){
                $sql .= " AND  bm_content.cost > $cost ";
            }
            if($cost == 300000){
                $sql .= " AND  bm_content.cost >= $cost ";
            }
            if($cost == 500000){
                $sql .= " AND  bm_content.cost >= $cost ";
            }
            if($cost == 600000){
                $sql .= " AND  bm_content.cost >= $cost ";
            }
            if($cost == 800000){
                $sql .= " AND  bm_content.cost >= $cost ";
            } else {
                $sql .= " AND  0 < bm_content.cost <= $cost ";
            }
            
        }
        if ($cateid <> 0) {
            $sql .= "  AND  bm_category.id = $cateid ";
        }
        //echo $sql; die;
        $query = $this->db->query($sql) ;
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function _list() {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('bm_search');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function _check_keywork($keyword) {
        $query = $this->db->get('bm_search');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $value) {
                if (trim($this->removesign($value->keyword)) == trim($this->removesign($keyword)) && strlen($value->keyword) == strlen($keyword)) {
                    return $value->id;
                } else {
                    return 0;
                }
            }
        } else {
            return 0;
        }
 
    }

    public function _add($keyword) {
        $check = $this->_check_keywork($keyword);
        if ( $check == 0) {
            $data = array(
                'keyword' => $keyword,
                'count' => 1,
            );
            $this->db->insert('bm_search', $data);
            return true;
        } else {
            $this->_update_count($check);
        }
        return false;
    }

    public function _update_count($id) {
        $current = $this->_current_count($id);
        $data = array(
            'count' => $current + 1,
        );
        $this->db->where('id', $id);
        $this->db->update('bm_search', $data);
        return 1;
    }

    public function _current_count($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('bm_search');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $value) {
                return $value->count;
            }
        } else {
            return 0;
        }
    }

    function removesign($str) {
        $coDau = array("à", "á", "ạ", "ả", "ã", "â", "ầ", "ấ", "ậ", "ẩ", "ẫ", "ă", "ằ", "ắ"
            , "ặ", "ẳ", "ẵ", "è", "é", "ẹ", "ẻ", "ẽ", "ê", "ề", "ế", "ệ", "ể", "ễ", "ì", "í", "ị", "ỉ", "ĩ",
            "ò", "ó", "ọ", "ỏ", "õ", "ô", "ồ", "ố", "ộ", "ổ", "ỗ", "ơ"
            , "ờ", "ớ", "ợ", "ở", "ỡ",
            "ù", "ú", "ụ", "ủ", "ũ", "ư", "ừ", "ứ", "ự", "ử", "ữ",
            "ỳ", "ý", "ỵ", "ỷ", "ỹ",
            "đ",
            "À", "Á", "Ạ", "Ả", "Ã", "Â", "Ầ", "Ấ", "Ậ", "Ẩ", "Ẫ", "Ă"
            , "Ằ", "Ắ", "Ặ", "Ẳ", "Ẵ",
            "È", "É", "Ẹ", "Ẻ", "Ẽ", "Ê", "Ề", "Ế", "Ệ", "Ể", "Ễ",
            "Ì", "Í", "Ị", "Ỉ", "Ĩ",
            "Ò", "Ó", "Ọ", "Ỏ", "Õ", "Ô", "Ồ", "Ố", "Ộ", "Ổ", "Ỗ", "Ơ"
            , "Ờ", "Ớ", "Ợ", "Ở", "Ỡ",
            "Ù", "Ú", "Ụ", "Ủ", "Ũ", "Ư", "Ừ", "Ứ", "Ự", "Ử", "Ữ",
            "Ỳ", "Ý", "Ỵ", "Ỷ", "Ỹ",
            "Đ", "ê", "ù", "à");
        $khongDau = array("a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a"
            , "a", "a", "a", "a", "a", "a",
            "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e",
            "i", "i", "i", "i", "i",
            "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o"
            , "o", "o", "o", "o", "o",
            "u", "u", "u", "u", "u", "u", "u", "u", "u", "u", "u",
            "y", "y", "y", "y", "y",
            "d",
            "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A"
            , "A", "A", "A", "A", "A",
            "E", "E", "E", "E", "E", "E", "E", "E", "E", "E", "E",
            "I", "I", "I", "I", "I",
            "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O"
            , "O", "O", "O", "O", "O",
            "U", "U", "U", "U", "U", "U", "U", "U", "U", "U", "U",
            "Y", "Y", "Y", "Y", "Y",
            "D", "e", "u", "a");
        return str_replace($coDau, $khongDau, $str);
    }

}
