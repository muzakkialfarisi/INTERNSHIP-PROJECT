<?php

class db_admin extends CI_Model{
	function autocomp_olt($hostnamegpon){
		$this->db->like('hostnamegpon', $hostnamegpon , 'both');
		$this->db->group_by('hostnamegpon');
		$this->db->order_by('hostnamegpon', 'ASC');
		return $this->db->get('olt')->result();
    }

    public function login($username, $password) {
		$data = $this->db->query("SELECT * FROM admin where username = '$username' and password = '$password' ");
		return $data->row();
	}

	public function searchODPbyOLT($hostnamegpon, $slot, $port){
		$data = $this->db->query("SELECT * from splitter JOIN odp USING (numbodp) where numbgpon = (SELECT numbgpon FROM olt WHERE hostnamegpon='$hostnamegpon' and slot='$slot' and port='$port') ");
        return $data->result_array();
	}

	public function searchServicebyOLT($hostnamegpon, $slot, $port){
		$data = $this->db->query("SELECT * FROM service JOIN splitter USING (numbsplitter) where numbgpon = (SELECT numbgpon FROM olt WHERE hostnamegpon='$hostnamegpon' and slot='$slot' and port='$port') ");
		return $data->result_array();
	}
	
	public function searchOLTbyODP($namaodp){
		$data = $this->db->query("SELECT * FROM splitter JOIN olt USING (numbgpon) WHERE numbodp = (SELECT numbodp FROM odp WHERE namaodp='$namaodp') ");
        return $data->result_array();
	}

	public function searchServicebyODP($namaodp){
		$data = $this->db->query("SELECT * FROM service JOIN splitter USING (numbsplitter) where numbodp = (select numbodp from odp where namaodp='$namaodp') ");
        return $data->result_array();
	}

	public function searchOLTbyService($numbservice){
		$data = $this->db->query("SELECT * from splitter JOIN olt USING (numbgpon) where numbsplitter = (select numbsplitter from service where numbservice = '$numbservice' or numbservice2 = '$numbservice') ");
        return $data->result_array();
	}

	public function searchODPbyService($numbservice){
		$data = $this->db->query("SELECT * from splitter JOIN odp USING (numbodp) where numbsplitter = (select numbsplitter from service where numbservice = '$numbservice' or numbservice2 = '$numbservice') ");
        return $data->result_array();
	}

	public function getAllDarlink(){
		$data = $this->db->query("SELECT * FROM service join splitter using (numbsplitter) join olt using (numbgpon) join odp using (numbodp) ");
		return $data->result_array();
	}

	public function getAllOLT(){
		$data = $this->db->query("SELECT * FROM olt limit 500");
		return $data->result_array();
	}

	public function getAllODP(){
		$data = $this->db->query("SELECT * FROM odp where namaodp != '' ");
		return $data->result_array();
	}

	public function getAllService(){
		$data = $this->db->query("SELECT * FROM service ");
		return $data->result_array();
	}

	public function getOLT(){
		$key1 = $this->input->post('hostnamegpon', true);
		$key2 = $this->input->post('slot', true);
		$key3 = $this->input->post('port', true);
		$data = $this->db->query("SELECT * FROM olt where hostnamegpon='$key1' and slot='$key2' and port='$key3'");
		return $data->row_array();
	}

	public function getODP(){
		$key1 = $this->input->post('namaodp', true);
		$data = $this->db->query("SELECT * FROM odp where namaodp='$key1'");
		return $data->row_array();
	}

	public function getServiceInet(){
		$key = $this->input->post('numbservice', true);
		$data = $this->db->query("SELECT * FROM service where numbservice='$key' or numbservice2='$key'");
		return $data->row_array();
	}

	public function getServiceVoice(){
		$key = $this->input->post('numbservice2', true);
		$data = $this->db->query("SELECT * FROM service where numbservice2='$key' or numbservice='$key'");
		return $data->row_array();
	}

	public function inputnewOLT(){
		$data = [
			"hostnamegpon" => $this->input->post('hostnamegpon', true),
			"slot" => $this->input->post('slot', true),
			"port" => $this->input->post('port', true),
		];
		$this->db->insert('olt', $data);
	}

	public function inputnewODP(){
		$namaodp = $this->input->post('namaodp', true);
		$kapodp = $this->input->post('kapodp', true);
		$koorodp = $this->input->post('koorodp', true);
		$this->db->query("INSERT INTO odp (namaodp, kapodp, koorodp) VALUES ('$namaodp', '$kapodp', '$koorodp')");
	}

	public function inputnewSplitter(){
		$namaodp = $this->input->post('namaodp', true);
		$kapodp = $this->input->post('kapodp', true);
		$koorodp = $this->input->post('koorodp', true);
		$hostnamegpon = $this->input->post('hostnamegpon', true);
		$slot = $this->input->post('slot', true);
		$port = $this->input->post('port' , true);
		$namasplitter = $hostnamegpon . "_" . $slot . "_" . $port;
		$this->db->query("INSERT INTO splitter (namasplitter, numbgpon, numbodp) SELECT '$namasplitter', numbgpon, numbodp FROM olt, odp where odp.namaodp='$namaodp' and odp.kapodp='$kapodp' and odp.koorodp='$koorodp' and olt.hostnamegpon='$hostnamegpon' and olt.slot='$slot' and olt.port='$port'");
	}

	public function inputnewServicebyODP(){
		$numbservice = $this->input->post('numbservice', true);
		$numbservice2 = $this->input->post('numbservice2', true);
		$sn = $this->input->post('sn', true);
		$koorservice = $this->input->post('koorservice', true);
		$onuservice = $this->input->post('onuservice', true);
		$namaodp = $this->input->post('namaodp', true);
		if ( $this->input->post('numbservice', true)<>null){
			$this->db->query("INSERT INTO service(numbservice, numbservice2, sn, koorservice, onuservice, numbsplitter) select '$numbservice', '$numbservice2', '$sn', '$koorservice', '$onuservice', numbsplitter from splitter join odp using (numbodp) where namaodp='$namaodp' ");
		}else{
			$this->db->query("INSERT INTO service(numbservice, sn, koorservice, onuservice, numbsplitter) select '$numbservice2', '$sn', '$koorservice', '$onuservice', numbsplitter from splitter join odp using (numbodp) where namaodp='$namaodp' ");
		}
	}

	public function inputnewServicebyOLT(){
		$numbservice = $this->input->post('numbservice', true);
		$numbservice2 = $this->input->post('numbservice2', true);
		$sn = $this->input->post('sn', true);
		$koorservice = $this->input->post('koorservice', true);
		$onuservice = $this->input->post('onuservice', true);
		$hostnamegpon = $this->input->post('hostnamegpon', true);
		$slot = $this->input->post('slot', true);
		$port = $this->input->post('port', true);
		$this->db->query("INSERT INTO splitter (numbgpon,numbodp) SELECT numbgpon,numbodp FROM olt,odp where hostnamegpon='$hostnamegpon' and slot='$slot' and port='$port' and namaodp=''");
		if ( $this->input->post('numbservice', true)<>null){
			$this->db->query("INSERT INTO service (numbservice, numbservice2, sn, koorservice, onuservice, numbsplitter) select '$numbservice', '$numbservice2', '$sn', '$koorservice', '$onuservice', max(numbsplitter) from splitter ");	
		}else{
			$this->db->query("INSERT INTO service (numbservice, sn, koorservice, onuservice, numbsplitter) select '$numbservice2', '$sn', '$koorservice', '$onuservice', max(numbsplitter) from splitter ");	
		}

	}

	public function deleteService($key){
		$this->db->query("DELETE FROM service WHERE numbservice='$key'");
	}

	public function deleteODP($key){
		$this->db->query("DELETE FROM service WHERE numbsplitter=(SELECT numbsplitter from splitter where numbodp='$key') ");
		$this->db->query("DELETE FROM splitter WHERE numbodp='$key'");
		$this->db->query("DELETE FROM odp WHERE numbodp='$key' ");
	}

	public function deleteOLT($key){
		$this->db->query("DELETE FROM service WHERE numbsplitter=(SELECT numbsplitter from splitter where numbgpon='$key')");
		$this->db->query("DELETE FROM splitter WHERE numbgpon='$key'");
		$this->db->query("DELETE FROM odp WHERE numbodp=(SELECT numbodp from splitter where numbgpon='$key')");
		$this->db->query("DELETE FROM olt WHERE numbgpon='$key'");
	}

	public function getAllUser(){
		$data = $this->db->query("SELECT * FROM user ");
		return $data->result_array();
	}

	public function getAccess($key1, $key2){
		if($key2 == false){
			$this->db->query("UPDATE user set access=1 where username='$key1'");
		} else{
			$this->db->query("UPDATE user set access=0 where username='$key1'");
		}
	}

	public function deleteUser($key){
		$this->db->query("DELETE FROM user WHERE username='$key'");
	}

	public function updateUser($key){
		$nama = $this->input->post('nama', true);
		$password = $this->input->post('password', true);
		$this->db->query("UPDATE user set nama='$nama', password='$password' where username='$key'");
	}

	public function report_s_done($key1, $key2){
		if($key2 == 1){
			$this->db->query("UPDATE report_service set status=1 where id='$key1'");
		} else if($key2 == 0) {
			$this->db->query("UPDATE report_service set status=0 where id='$key1'");
		} else{
			$this->db->query("UPDATE report_service set status=2 where id='$key1'");
		}
	}

	public function report_co_done($key1, $key2){
		if($key2 == 1){
			$this->db->query("UPDATE report_co set status=1 where id='$key1'");
		} else if($key2 == 0) {
			$this->db->query("UPDATE report_co set status=0 where id='$key1'");
		} else{
			$this->db->query("UPDATE report_co set status=2 where id='$key1'");
		}
	}

	public function search_All(){
		$hostnamegpon =  $this->input->post('hostnamegpon', true);
		$namaodp = $this->input->post('namaodp', true);
		$numb = $this->input->post('numbservice', true);
		if($hostnamegpon<>null and $namaodp<>null and $numb<>null){
			$data = $this->db->query("SELECT * from service join splitter using (numbsplitter) join olt using (numbgpon) join odp using (numbodp) where hostnamegpon='$hostnamegpon' and namaodp='$namaodp' and numbservice='$numb' or numbservice2='$numb' ");
		}else if($hostnamegpon<>null and $namaodp<>null and $numb==null){
			$data = $this->db->query("SELECT * from service join splitter using (numbsplitter) join olt using (numbgpon) join odp using (numbodp) where hostnamegpon='$hostnamegpon' and namaodp='$namaodp' ");
		}else if($hostnamegpon==null and $namaodp<>null and $numb<>null){
			$data = $this->db->query("SELECT * from service join splitter using (numbsplitter) join olt using (numbgpon) join odp using (numbodp) where namaodp='$namaodp' and numbservice='$numb' or numbservice2='$numb' ");
		}else if($hostnamegpon<>null and $namaodp==null and $numb<>null){
			$data = $this->db->query("SELECT * from service join splitter using (numbsplitter) join olt using (numbgpon) join odp using (numbodp) where hostnamegpon='$hostnamegpon' and numbservice='$numb' or numbservice2='$numb' ");
		}elseif($hostnamegpon<>null and $namaodp==null and $numb==null){
			$data = $this->db->query("SELECT * from service join splitter using (numbsplitter) join olt using (numbgpon) join odp using (numbodp) where hostnamegpon='$hostnamegpon' ");
		}elseif($hostnamegpon==null and $namaodp<>null and $numb==null){
			$data = $this->db->query("SELECT * from service join splitter using (numbsplitter) join olt using (numbgpon) join odp using (numbodp) where namaodp='$namaodp' ");
		}elseif($hostnamegpon==null and $namaodp==null and $numb<>null){
			$data = $this->db->query("SELECT * from service join splitter using (numbsplitter) join olt using (numbgpon) join odp using (numbodp) where numbservice='$numb' or numbservice2='$numb' ");
		}else{
			$data = $this->db->query("SELECT * FROM service join splitter using (numbsplitter) join olt using (numbgpon) join odp using (numbodp) ");
		}
		return $data->result_array();
	}

	public function search_OLT(){
		$hostnamegpon =  $this->input->post('hostnamegpon', true);
		$slot = $this->input->post('slot', true);
		$port = $this->input->post('port', true);
		if($hostnamegpon<>null and $slot<>null and $port<>null){
			$data = $this->db->query("SELECT * from olt where hostnamegpon='$hostnamegpon' and slot='$slot' and port='$port' ");
		}else if($hostnamegpon<>null and $slot<>null and $port==null){
			$data = $this->db->query("SELECT * from olt where hostnamegpon='$hostnamegpon' and slot='$slot' ");
		}else if($hostnamegpon==null and $slot<>null and $port<>null){
			$data = $this->db->query("SELECT * from olt where slot='$slot' and port='$port'");
		}else if($hostnamegpon<>null and $slot==null and $port<>null){
			$data = $this->db->query("SELECT * from olt where hostnamegpon='$hostnamegpon' and port='$port' ");
		}elseif($hostnamegpon<>null and $slot==null and $port==null){
			$data = $this->db->query("SELECT * from olt where hostnamegpon='$hostnamegpon' ");
		}elseif($hostnamegpon==null and $slot<>null and $port==null){
			$data = $this->db->query("SELECT * from olt where slot='$slot' ");
		}elseif($hostnamegpon==null and $slot==null and $port<>null){
			$data = $this->db->query("SELECT * from olt where port='$port' ");
		}else{
			$data = $this->db->query("SELECT * from olt");
		}
		return $data->result_array();
	}

	public function search_ODP(){
		$namaodp =  $this->input->post('namaodp', true);
		if($namaodp <>null){
			$data = $this->db->query("SELECT * from odp where namaodp='$namaodp' ");
		}else{
			$data = $this->db->query("SELECT * from odp");
		}
		return $data->result_array();
	}

	public function search_Service(){
		$numb =  $this->input->post('numb', true);
		if($numb<>null){
			$data = $this->db->query("SELECT * from service where numbservice='$numb' or numbservice2='$numb' ");
		}else{
			$data = $this->db->query("SELECT * from service");
		}
		return $data->result_array();
	}

	public function updateSplitter($key){
		$namaodp =  $this->input->post('namaodp', true);
		$this->db->query("UPDATE service set numbsplitter=(SELECT numbsplitter from splitter join odp using (numbodp) where namaodp='$namaodp') where numbservice='$key'");
	}

	public function deleteSplitterNull($key){
		$this->db->query("DELETE FROM splitter WHERE numbsplitter=(SELECT numbsplitter from splitter join odp using (numbodp) where numbsplitter='$key' and namaodp='')");
	}
	
	public function editOLT($key){
		$hostnamegpon =  $this->input->post('hostnamegpon', true);
		$slot =  $this->input->post('slot', true);
		$port =  $this->input->post('port', true);
		$this->db->query("UPDATE olt set hostnamegpon='$hostnamegpon', slot='$slot', port='$port' where numbgpon='$key' ");
	}

	public function editODP($key){
		$namaodp =  $this->input->post('namaodp', true);
		$kapodp =  $this->input->post('kapodp', true);
		$koorodp =  $this->input->post('koorodp', true);
		$this->db->query("UPDATE odp set namaodp='$namaodp', kapodp='$kapodp', koorodp='$koorodp' where numbodp='$key' ");
	}

	public function getKeyODP($key){
		$namaodp =  $this->input->post('namaodp', true);
		$data = $this->db->query("SELECT * from odp where namaodp='$namaodp' and numbodp='$key'");
		return $data->row_array();
	}

	public function editService($key){
		$numbservice = $this->input->post('numbservice', true);
		$numbservice2 = $this->input->post('numbservice2', true);
		$sn = $this->input->post('sn', true);
		$koorservice = $this->input->post('koorservice', true);
		$onuservice = $this->input->post('onuservice', true);
		$this->db->query("UPDATE service set numbservice='$numbservice', numbservice2='$numbservice2', sn='$sn', koorservice='$koorservice', onuservice='$onuservice' where numbservice='$key' ");
	}

	public function getKeyService($if){
		$k2 =  $this->input->post('numbservice2', true);
		$k3 =  $this->input->post('numbservice', true);
		if ($if == 1){
			$data = $this->db->query("SELECT * from service where numbservice='$k3' and numbservice2='$k2'");
		}else if($if == 2){
			$data = $this->db->query("SELECT * from service where numbservice='$k3'");
		}else{
			$data = $this->db->query("SELECT * from service where numbservice2='$k2'");
		}
		return $data->row_array();
	}
	
	public function searchDashboard($key){
		if ($key=='migrasi1'){
			$data = $this->db->query("SELECT * from report_service where status=1 and jenis='migrasi'");
		} elseif ($key=='migrasi0'){
			$data = $this->db->query("SELECT * from report_service where status=0 and jenis='migrasi'");
		} elseif ($key=='migrasi2'){
			$data = $this->db->query("SELECT * from report_service where status=2 and jenis='migrasi'");
		} elseif ($key=='migrasi'){
			$data = $this->db->query("SELECT * from report_service where jenis='migrasi'");
		} elseif ($key=='normalisasi0'){
			$data = $this->db->query("SELECT * from report_service where status=0 and jenis='normalisasi'");
		} elseif ($key=='normalisasi1'){
			$data = $this->db->query("SELECT * from report_service where status=1 and jenis='normalisasi'");
		} elseif ($key=='normalisasi2'){
			$data = $this->db->query("SELECT * from report_service where status=2 and jenis='normalisasi'");
		} elseif ($key=='normalisasi'){
			$data = $this->db->query("SELECT * from report_service where jenis='normalisasi'");
		} elseif ($key=='osodp0'){
			$data = $this->db->query("SELECT * from report_service where status=0 and jenis='omset service odp'");
		} elseif ($key=='osodp1'){
			$data = $this->db->query("SELECT * from report_service where status=1 and jenis='omset service odp'");
		} elseif ($key=='osodp2'){
			$data = $this->db->query("SELECT * from report_service where status=2 and jenis='omset service odp'");
		} elseif ($key=='osodp'){
			$data = $this->db->query("SELECT * from report_service where jenis='omset service odp'");
		} elseif ($key=='pro0'){
			$data = $this->db->query("SELECT * from report_service where status=0 and jenis='provisioning'");
		} elseif ($key=='pro1'){
			$data = $this->db->query("SELECT * from report_service where status=1 and jenis='provisioning'");
		} elseif ($key=='pro2'){
			$data = $this->db->query("SELECT * from report_service where status=2 and jenis='provisioning'");
		} elseif ($key=='pro'){
			$data = $this->db->query("SELECT * from report_service where jenis='provisioning'");
		} elseif ($key=='s0'){
			$data = $this->db->query("SELECT * from report_service where status=0");
		} elseif ($key=='s1'){
			$data = $this->db->query("SELECT * from report_service where status=1");
		} elseif ($key=='s2'){
			$data = $this->db->query("SELECT * from report_service where status=2");
		} elseif ($key=='cof0'){
			$data = $this->db->query("SELECT * from report_co where status=0 and jenis='co feeder'");
		} elseif ($key=='cof1'){
			$data = $this->db->query("SELECT * from report_co where status=1 and jenis='co feeder'");
		} elseif ($key=='cof2'){
			$data = $this->db->query("SELECT * from report_co where status=2 and jenis='co feeder'");
		} elseif ($key=='cof'){
			$data = $this->db->query("SELECT * from report_co where jenis='co feeder'");
		} elseif ($key=='cod0'){
			$data = $this->db->query("SELECT * from report_co where status=0 and jenis='co distribution'");
		} elseif ($key=='cod1'){
			$data = $this->db->query("SELECT * from report_co where status=1 and jenis='co distribution'");
		} elseif ($key=='cod2'){
			$data = $this->db->query("SELECT * from report_co where status=2 and jenis='co distribution'");
		} elseif ($key=='cod'){
			$data = $this->db->query("SELECT * from report_co where jenis='co distribution'");
		} elseif ($key=='co0'){
			$data = $this->db->query("SELECT * from report_co where status=0");
		} elseif ($key=='co1'){
			$data = $this->db->query("SELECT * from report_co where status=1");
		} elseif ($key=='co2'){
			$data = $this->db->query("SELECT * from report_co where status=2");
		}
		return $data->result_array();
	}

}