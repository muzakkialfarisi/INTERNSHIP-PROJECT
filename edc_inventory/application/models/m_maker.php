<?php

class m_maker extends CI_Model{
    function __construct() {
        // Set table name
        $this->table = 'reporting';
    }

    function getRows($params = array()){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('status3', 0);
        $this->db->where('status1', 1);
        $this->db->where('maker', $this->session->userdata("username"));
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
            // $this->db->where($likeArr);
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
        $this->db->where('maker', $this->session->userdata("username"));
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
        $this->db->where('maker', $this->session->userdata("username"));
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

    public function insert_laporan(){
        $merek = $this->input->post('merek', true);
        $ven1 = $this->input->post('briit', true);
        $ven2 = $this->input->post('visionet', true);
        $ven3 = $this->input->post('indopay', true);
        $ket = $this->input->post('keterangan', true);
        $maker = $this->session->userdata("username");
        $data = $this->db->query("INSERT INTO reporting (date, merek, briit, visionet, indopay, keterangan, maker, status1) VALUES (now(), '$merek', '$ven1', '$ven2', '$ven3', '$ket', '$maker', '1')");
    }

    public function delete_laporan($id){
        $this->db->query("DELETE FROM reporting WHERE id = '$id'");
    }

    public function get_laporan($id){
        $data = $this->db->query("SELECT * from reporting where id = '$id'");
        return $data->result_array();;
    }

    public function update_laporan($id){
        $merek = $this->input->post('merek', true);
        $ven1 = $this->input->post('briit', true);
        $ven2 = $this->input->post('visionet', true);
        $ven3 = $this->input->post('indopay', true);
        $ket = $this->input->post('keterangan', true);
        $maker = $this->session->userdata("username");
        $this->db->query("UPDATE reporting SET date=now(), merek='$merek', briit='$ven1', visionet='$ven2', indopay='$ven3', keterangan='$ket', maker='$maker' where id = '$id'");
    }

    public function p_ulang($id){
        $this->db->query("UPDATE reporting SET date=now(), status1='1' where id = '$id'");
    }

    public function done_jan($tahun){
        $data = $this->db->query("SELECT sum(briit) as briit, sum(visionet) as visionet, sum(indopay) as indopay from reporting where status3 = 1 and date between '$tahun-01-01' and '$tahun-01-31'");
        return $data->result_array();
    }
    public function done_feb($tahun){
        $data = $this->db->query("SELECT sum(briit) as briit, sum(visionet) as visionet, sum(indopay) as indopay from reporting where status3 = 1 and date between '$tahun-02-01' and '$tahun-02-31'");
        return $data->result_array();
    }
    public function done_mar($tahun){
        $data = $this->db->query("SELECT sum(briit) as briit, sum(visionet) as visionet, sum(indopay) as indopay from reporting where status3 = 1 and date between '$tahun-03-01' and '$tahun-03-31'");
        return $data->result_array();
    }
    public function done_apr($tahun){
        $data = $this->db->query("SELECT sum(briit) as briit, sum(visionet) as visionet, sum(indopay) as indopay from reporting where status3 = 1 and date between '$tahun-04-01' and '$tahun-04-31'");
        return $data->result_array();
    }
    public function done_mei($tahun){
        $data = $this->db->query("SELECT sum(briit) as briit, sum(visionet) as visionet, sum(indopay) as indopay from reporting where status3 = 1 and date between '$tahun-05-01' and '$tahun-05-31'");
        return $data->result_array();
    }
    public function done_jun($tahun){
        $data = $this->db->query("SELECT sum(briit) as briit, sum(visionet) as visionet, sum(indopay) as indopay from reporting where status3 = 1 and date between '$tahun-06-01' and '$tahun-06-31'");
        return $data->result_array();
    }
    public function done_jul($tahun){
        $data = $this->db->query("SELECT sum(briit) as briit, sum(visionet) as visionet, sum(indopay) as indopay from reporting where status3 = 1 and date between '$tahun-07-01' and '$tahun-07-31'");
        return $data->result_array();
    }
    public function done_agt($tahun){
        $data = $this->db->query("SELECT sum(briit) as briit, sum(visionet) as visionet, sum(indopay) as indopay from reporting where status3 = 1 and date between '$tahun-08-01' and '$tahun-08-31'");
        return $data->result_array();
    }
    public function done_sep($tahun){
        $data = $this->db->query("SELECT sum(briit) as briit, sum(visionet) as visionet, sum(indopay) as indopay from reporting where status3 = 1 and date between '$tahun-09-01' and '$tahun-09-31'");
        return $data->result_array();
    }
    public function done_okt($tahun){
        $data = $this->db->query("SELECT sum(briit) as briit, sum(visionet) as visionet, sum(indopay) as indopay from reporting where status3 = 1 and date between '$tahun-10-01' and '$tahun-10-31'");
        return $data->result_array();
    }
    public function done_nov($tahun){
        $data = $this->db->query("SELECT sum(briit) as briit, sum(visionet) as visionet, sum(indopay) as indopay from reporting where status3 = 1 and date between '$tahun-11-01' and '$tahun-11-31'");
        return $data->result_array();
    }
    public function done_des($tahun){
        $data = $this->db->query("SELECT sum(briit) as briit, sum(visionet) as visionet, sum(indopay) as indopay from reporting where status3 = 1 and date between '$tahun-12-01' and '$tahun-12-31'");
        return $data->result_array();
    }

    public function pending_jan($tahun){
        $data = $this->db->query("SELECT sum(briit) as briit, sum(visionet) as visionet, sum(indopay) as indopay from reporting where status3 = 0 and date between '$tahun-01-01' and '$tahun-01-31'");
        return $data->result_array();
    }
    public function pending_feb($tahun){
        $data = $this->db->query("SELECT sum(briit) as briit, sum(visionet) as visionet, sum(indopay) as indopay from reporting where status3 = 0 and date between '$tahun-02-01' and '$tahun-02-31'");
        return $data->result_array();
    }
    public function pending_mar($tahun){
        $data = $this->db->query("SELECT sum(briit) as briit, sum(visionet) as visionet, sum(indopay) as indopay from reporting where status3 = 0 and date between '$tahun-03-01' and '$tahun-03-31'");
        return $data->result_array();
    }
    public function pending_apr($tahun){
        $data = $this->db->query("SELECT sum(briit) as briit, sum(visionet) as visionet, sum(indopay) as indopay from reporting where status3 = 0 and date between '$tahun-04-01' and '$tahun-04-31'");
        return $data->result_array();
    }
    public function pending_mei($tahun){
        $data = $this->db->query("SELECT sum(briit) as briit, sum(visionet) as visionet, sum(indopay) as indopay from reporting where status3 = 0 and date between '$tahun-05-01' and '$tahun-05-31'");
        return $data->result_array();
    }
    public function pending_jun($tahun){
        $data = $this->db->query("SELECT sum(briit) as briit, sum(visionet) as visionet, sum(indopay) as indopay from reporting where status3 = 0 and date between '$tahun-06-01' and '$tahun-06-31'");
        return $data->result_array();
    }
    public function pending_jul($tahun){
        $data = $this->db->query("SELECT sum(briit) as briit, sum(visionet) as visionet, sum(indopay) as indopay from reporting where status3 = 0 and date between '$tahun-07-01' and '$tahun-07-31'");
        return $data->result_array();
    }
    public function pending_agt($tahun){
        $data = $this->db->query("SELECT sum(briit) as briit, sum(visionet) as visionet, sum(indopay) as indopay from reporting where status3 = 0 and date between '$tahun-08-01' and '$tahun-08-31'");
        return $data->result_array();
    }
    public function pending_sep($tahun){
        $data = $this->db->query("SELECT sum(briit) as briit, sum(visionet) as visionet, sum(indopay) as indopay from reporting where status3 = 0 and date between '$tahun-09-01' and '$tahun-09-31'");
        return $data->result_array();
    }
    public function pending_okt($tahun){
        $data = $this->db->query("SELECT sum(briit) as briit, sum(visionet) as visionet, sum(indopay) as indopay from reporting where status3 = 0 and date between '$tahun-10-01' and '$tahun-10-31'");
        return $data->result_array();
    }
    public function pending_nov($tahun){
        $data = $this->db->query("SELECT sum(briit) as briit, sum(visionet) as visionet, sum(indopay) as indopay from reporting where status3 = 0 and date between '$tahun-11-01' and '$tahun-11-31'");
        return $data->result_array();
    }
    public function pending_des($tahun){
        $data = $this->db->query("SELECT sum(briit) as briit, sum(visionet) as visionet, sum(indopay) as indopay from reporting where status3 = 0 and date between '$tahun-12-01' and '$tahun-12-31'");
        return $data->result_array();
    }
}