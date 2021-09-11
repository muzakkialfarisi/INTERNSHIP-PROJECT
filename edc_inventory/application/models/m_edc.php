<?php

class m_edc extends CI_Model{
	function __construct() {
        // Set table name
        $this->table = 'edc';
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
            $likeArr = array('sn' => $search);
            $this->db->or_like($likeArr);
        }
        
        if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
            $result = $this->db->count_all_results();
        }else{
            if(array_key_exists("sn", $params)){
                $this->db->where('sn', $params['sn']);
                $query = $this->db->get();
                $result = $query->row_array();
            }else{
                $this->db->order_by('sn', 'asc');
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
	
	function autocomp_kanwil($nama_kanwil){
		$this->db->like('nama_kanwil', $nama_kanwil , 'both');
		$this->db->group_by('nama_kanwil');
		$this->db->order_by('nama_kanwil', 'ASC');
		return $this->db->get('uker')->result();
	}
	
	function autocomp_uker($nama_uker){
		$this->db->like('nama_uker', $nama_uker , 'both');
		$this->db->group_by('nama_uker');
		$this->db->order_by('nama_uker', 'ASC');
		return $this->db->get('uker')->result();
    }

	public function get_edc() {
		$data = $this->db->query("SELECT * FROM edc");
		return $data->result_array();
	}

	public function get_edc_by_sn($sn,$key) {
		$data = $this->db->query("SELECT * FROM edc where sn = '$sn'");
		if($key == 'result_array'){
			return $data->result_array();
		} else{
			return $data->row_array();
		}
	}

	public function input_edc(){
		$sn = $this->input->post('sn', true);
		$mid = $this->input->post('mid', true);
		$tid = $this->input->post('tid', true);
		$status = $this->input->post('status', true);
		$posisi_kanwil = $this->input->post('posisi_kanwil', true);
		$posisi_uker = $this->input->post('posisi_uker', true);
		$peruntukan = $this->input->post('peruntukan', true);
		$merk = $this->input->post('merk', true);
		$gprs = $this->input->post('gprs', true);
		$lan = $this->input->post('lan', true);
		$dialup = $this->input->post('dialup', true);
		$contactless = $this->input->post('contactless', true);
		$this->db->query("INSERT INTO edc (sn, mid, tid, status, posisi_kanwil, posisi_uker, peruntukan, merk, gprs, lan, dialup, contactless) VALUES ('$sn', '$mid', '$tid', '$status', '$posisi_kanwil', '$posisi_uker', '$peruntukan', '$merk', '$gprs', '$lan', '$dialup', '$contactless')");
		$kegiatan = 'tambah';
		$keterangan = array("sn"=>$sn, "mid"=>$mid, "tid"=>$tid, "status"=>$status, "posisi_kanwil"=>$posisi_kanwil, "posisi_uker"=>$posisi_uker, "peruntukan"=>$peruntukan, "merk"=>$merk, "gprs"=>$gprs, "lan"=>$lan, "dialup"=>$dialup, "contactless"=>$contactless);
		$this->log($sn, $status, $kegiatan, json_encode($keterangan));
	}

	public function update_edc($sn){
		$mid = $this->input->post('mid', true);
		$tid = $this->input->post('tid', true);
		$status = $this->input->post('status', true);
		$posisi_kanwil = $this->input->post('posisi_kanwil', true);
		$posisi_uker = $this->input->post('posisi_uker', true);
		$peruntukan = $this->input->post('peruntukan', true);
		$merk = $this->input->post('merk', true);
		$gprs = $this->input->post('gprs', true);
		$lan = $this->input->post('lan', true);
		$dialup = $this->input->post('dialup', true);
		$contactless = $this->input->post('contactless', true);
		$kegiatan = 'edit';
		$keterangan = array("sn"=>$sn, "mid"=>$mid, "tid"=>$tid, "status"=>$status, "posisi_kanwil"=>$posisi_kanwil, "posisi_uker"=>$posisi_uker, "peruntukan"=>$peruntukan, "merk"=>$merk, "gprs"=>$gprs, "lan"=>$lan, "dialup"=>$dialup, "contactless"=>$contactless);
		$this->log($sn, $status, $kegiatan, json_encode($keterangan));
		$this->db->query("UPDATE edc SET mid='$mid', tid='$tid', status='$status', posisi_kanwil='$posisi_kanwil', posisi_uker='$posisi_uker', peruntukan='$peruntukan', merk='$merk', gprs='$gprs', lan='$lan', dialup='$dialup', contactless='$contactless' where sn='$sn'");
	}

	public function hit_log($sn, $key){
		if ($key == 'count'){
			$data = $this->db->query("SELECT max(id) from log where sn='$sn'");
			return $data->row_array();
		}else{
			$data = $this->db->query("SELECT id from log where sn='$sn'");
			return $data->num_fields();
		}
	}

	public function delete_edc($sn){
		$this->db->query("DELETE FROM log WHERE sn = '$sn'");
		$this->db->query("DELETE FROM edc WHERE sn = '$sn'");
	}

	public function log($sn, $status, $kegiatan, $log){
		$username = $this->session->userdata("username");
		return $this->db->query("INSERT INTO log (sn, username, kegiatan, waktu, status, keterangan) VALUES ('$sn', '$username', '$kegiatan', NOW(), '$status', '$log')");
	}

	public function get_log($sn){
		$data = $this->db->query("SELECT * FROM log where sn='$sn'");
		return $data->result_array();
	}
}