<?php

class m_signer extends CI_Model{
    function __construct() {
        // Set table name
        $this->table = 'reporting';
    }

    function getRows($params = array()){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('status2', 1);
        $this->db->where('status3', 0);
        $this->db->order_by('date', 'DESC');
        if(array_key_exists("conditions", $params)){
            foreach($params['conditions'] as $key => $val){
                $this->db->where($key, $val);
            }
        }
        if(!empty($params['searchKeyword'])){
            $search = $params['searchKeyword'];
            $this->db->where('date', $search);
            // $likeArr = array('date' => $search);
            // $this->db->or_like($likeArr);
        }
        if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
            $result = $this->db->count_all_results();
        }else{
            if(array_key_exists("date", $params)){
                $this->db->where('date', $params['date']);
                $query = $this->db->get();
                $result = $query->row_array();
            }else{
                $this->db->order_by('date', 'asc');
                if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                    $this->db->limit($params['limit'],$params['start']);
                }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                    $this->db->limit($params['limit']);
                }
                
                $query = $this->db->get();
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
            }
        }
        // Return fetched data
        return $result;
    }

    function getRows_r($params = array()){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('status1', 0);
        $this->db->where('signer !=', '');
        $this->db->order_by('date', 'DESC');
        if(array_key_exists("conditions", $params)){
            foreach($params['conditions'] as $key => $val){
                $this->db->where($key, $val);
            }
        }
        if(!empty($params['searchKeyword'])){
            $search = $params['searchKeyword'];
            $this->db->where('date', $search);
            // $likeArr = array('date' => $search);
            // $this->db->or_like($likeArr);
        }
        if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
            $result = $this->db->count_all_results();
        }else{
            if(array_key_exists("date", $params)){
                $this->db->where('date', $params['date']);
                $query = $this->db->get();
                $result = $query->row_array();
            }else{
                $this->db->order_by('date', 'asc');
                if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                    $this->db->limit($params['limit'],$params['start']);
                }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                    $this->db->limit($params['limit']);
                }
                
                $query = $this->db->get();
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
            }
        }
        // Return fetched data
        return $result;
    }

    function getRows_a($params = array()){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('status3', 1);
        $this->db->order_by('date', 'DESC');
        if(array_key_exists("conditions", $params)){
            foreach($params['conditions'] as $key => $val){
                $this->db->where($key, $val);
            }
        }
        if(!empty($params['searchKeyword'])){
            $search = $params['searchKeyword'];
            $this->db->where('date', $search);
            // $likeArr = array('date' => $search);
            // $this->db->or_like($likeArr);
        }
        if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
            $result = $this->db->count_all_results();
        }else{
            if(array_key_exists("date", $params)){
                $this->db->where('date', $params['date']);
                $query = $this->db->get();
                $result = $query->row_array();
            }else{
                $this->db->order_by('date', 'asc');
                if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                    $this->db->limit($params['limit'],$params['start']);
                }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                    $this->db->limit($params['limit']);
                }
                
                $query = $this->db->get();
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
            }
        }
        // Return fetched data
        return $result;
    }

    public function foll_signer($id, $angka){
        $signer = $this->session->userdata("username");
        $this->db->query("UPDATE reporting SET signer='$signer', status1='$angka', status2='$angka', status3='$angka', date3=now() where id='$id'");
    }
}