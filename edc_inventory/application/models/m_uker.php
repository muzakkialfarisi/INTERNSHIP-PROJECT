<?php

class m_uker extends CI_Model{
    function __construct() {
        // Set table name
        $this->table = 'uker';
    }

	function getRows($params = array()){
        $this->db->select('*');
        $this->db->from($this->table);
        
        if(array_key_exists("conditions", $params)){
            foreach($params['conditions'] as $key => $val){
                $this->db->where($key, $val);
            }
        }
        
        if(!empty($params['searchKeyword'])){
            $search = $params['searchKeyword'];
            $likeArr = array('nama_uker' => $search, 'nama_kanwil' => $search, 'kode_branch' => $search, 'kode_kanwil' => $search);
            $this->db->or_like($likeArr);
        }
        
        if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
            $result = $this->db->count_all_results();
        }else{
            if(array_key_exists("kode_kanwil", $params)){
                $this->db->where('kode_kanwil', $params['kode_kanwil']);
                $query = $this->db->get();
                $result = $query->row_array();
            }else{
                $this->db->order_by('kode_kanwil', 'asc');
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

    public function getuker($s){
        $data = $this->db->query("SELECT * from uker where kode_kanwil = '{$s}'");
        return $data;
    }

    public function get_uker(){
        $data = $this->db->query("SELECT * from uker");
        return $data->result_array();
    }
}