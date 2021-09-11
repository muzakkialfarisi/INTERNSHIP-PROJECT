<?php

class db_lapor extends CI_Model{
	public function inputRegist(){
		$data = [
			"nama" => $this->input->post('nama', true),
			"username" => $this->input->post('username', true),
			"password" => $this->input->post('password', true),
			"access" => false,
		];
		$this->db->insert('user', $data);
	}

	public function getUsername($username) {
		$data = $this->db->query("SELECT * FROM user where username = '$username'");
		return $data->row();
	}

	public function getAccess($username) {
		$data = $this->db->query("SELECT * FROM user where username = '$username' and access=1");
		return $data->row();
	}

    public function login($username, $password) {
		$data = $this->db->query("SELECT * FROM user where username = '$username' and password = '$password' ");
		return $data->row();
	}

	public function getAllReport_s(){
		$data = $this->db->query("SELECT * FROM report_service order by status asc ");
		return $data->result_array();
	}

	public function getAllReport_co(){
		$data = $this->db->query("SELECT * FROM report_co order by status asc ");
		return $data->result_array();
	}

	public function inputReportService(){
		$status = 0;
		$data = [
			"jenis" => $this->input->post('jenis', true),
			"numbservice" => $this->input->post('numbservice', true),
			"numbservice2" => $this->input->post('numbservice2', true),
			"namaodp" => $this->input->post('namaodp', true),
			"portodp" => $this->input->post('portodp', true),
			"qrodp" => $this->input->post('qrodp', true),
			"qrdropcore" => $this->input->post('qrdropcore', true),
			"hostnamegpon" => $this->input->post('hostnamegpon', true),
			"slotgpon" => $this->input->post('slotgpon', true),
			"portgpon" => $this->input->post('portgpon', true),
			"sn" => $this->input->post('sn', true),
			"pelapor" => $this->session->userdata("username"),
			"status" => $status,
		];
		$this->db->insert('report_service', $data);
	}

	public function inputReportCO(){
		$status = 0;
		$data = [
			"jenis" => $this->input->post('jenis', true),
			"namaodp" => $this->input->post('namaodp', true),
			"hostnamegpon" => $this->input->post('hostnamegpon', true),
			"slotgpon" => $this->input->post('slotgpon', true),
			"portgpon" => $this->input->post('portgpon', true),
			"pelapor" => $this->session->userdata("username"),
			"status" => $status,
		];
		$this->db->insert('report_co', $data);
	}

	public function deleteReport_s($key){
		$this->db->query("DELETE FROM report_service WHERE id='$key'");
	}

	public function deleteReport_co($key){
		$this->db->query("DELETE FROM report_co WHERE id='$key'");
	}

	public function updateReport_co($key){
		$jenis =  $this->input->post('jenis', true);
		$namaodp = $this->input->post('namaodp', true);
		$hostnamegpon = $this->input->post('hostnamegpon', true);
		$slotgpon = $this->input->post('slotgpon', true);
		$portgpon = $this->input->post('portgpon', true);
		$tanggal = date('Y/m/d', time());
		$this->db->query("UPDATE report_co SET jenis='$jenis', namaodp='$namaodp', hostnamegpon='$hostnamegpon', slotgpon='$slotgpon', portgpon='$portgpon', tanggal='$tanggal' where id='$key'");
	}

	public function updateReport_s($key){
		$jenis =  $this->input->post('jenis', true);
		$numbservice = $this->input->post('numbservice', true);
		$numbservice2 = $this->input->post('numbservice2', true);
		$namaodp = $this->input->post('namaodp', true);
		$qrodp = $this->input->post('qrodp', true);
		$portodp = $this->input->post('portodp', true);
		$qrdropcore = $this->input->post('qrdropcore', true);
		$hostnamegpon = $this->input->post('hostnamegpon', true);
		$slotgpon = $this->input->post('slotgpon', true);
		$portgpon = $this->input->post('portgpon', true);
		$sn = $this->input->post('sn', true);
		$tanggal = date('Y/m/d', time());
		$this->db->query("UPDATE report_service SET jenis='$jenis', numbservice='$numbservice', numbservice2='$numbservice2', namaodp='$namaodp', qrodp='$qrodp', portodp='$portodp', qrdropcore='$qrdropcore', hostnamegpon='$hostnamegpon', slotgpon='$slotgpon', portgpon='$portgpon', sn='$sn', tanggal='$tanggal' where id='$key'");
	}

	public function search_report_co(){
		$status =  $this->input->post('status', true);
		$pelapor = $this->input->post('pelapor', true);
		$tanggal = $this->input->post('tanggal', true);
		if($status<>null and $pelapor<>null and $tanggal<>null){
			$data = $this->db->query("SELECT * from report_co where status='$status' and pelapor='$pelapor' and tanggal='$tanggal' ");
		}else if($status<>null and $pelapor<>null and $tanggal==null){
			$data = $this->db->query("SELECT * from report_co where status='$status' and pelapor='$pelapor' ");
		}else if($status==null and $pelapor<>null and $tanggal<>null){
			$data = $this->db->query("SELECT * from report_co where pelapor='$pelapor' and tanggal='$tanggal' ");
		}else if($status<>null and $pelapor==null and $tanggal<>null){
			$data = $this->db->query("SELECT * from report_co where status='$status' and tanggal='$tanggal' ");
		}elseif($status<>null and $pelapor==null and $tanggal==null){
			$data = $this->db->query("SELECT * from report_co where status='$status' ");
		}elseif($status==null and $pelapor<>null and $tanggal==null){
			$data = $this->db->query("SELECT * from report_co where pelapor='$pelapor' ");
		}elseif($status==null and $pelapor==null and $tanggal<>null){
			$data = $this->db->query("SELECT * from report_co where tanggal='$tanggal' ");
		}else{
			$data = $this->db->query("SELECT * from report_co");
		}
		return $data->result_array();
	}

	public function search_report_s(){
		$status =  $this->input->post('status', true);
		$pelapor = $this->input->post('pelapor', true);
		$tanggal = $this->input->post('tanggal', true);
		if($status<>null and $pelapor<>null and $tanggal<>null){
			$data = $this->db->query("SELECT * from report_service where status='$status' and pelapor='$pelapor' and tanggal='$tanggal' ");
		}else if($status<>null and $pelapor<>null and $tanggal==null){
			$data = $this->db->query("SELECT * from report_service where status='$status' and pelapor='$pelapor' ");
		}else if($status==null and $pelapor<>null and $tanggal<>null){
			$data = $this->db->query("SELECT * from report_service where pelapor='$pelapor' and tanggal='$tanggal' ");
		}else if($status<>null and $pelapor==null and $tanggal<>null){
			$data = $this->db->query("SELECT * from report_service where status='$status' and tanggal='$tanggal' ");
		}elseif($status<>null and $pelapor==null and $tanggal==null){
			$data = $this->db->query("SELECT * from report_service where status='$status' ");
		}elseif($status==null and $pelapor<>null and $tanggal==null){
			$data = $this->db->query("SELECT * from report_service where pelapor='$pelapor' ");
		}elseif($status==null and $pelapor==null and $tanggal<>null){
			$data = $this->db->query("SELECT * from report_service where tanggal='$tanggal' ");
		}else{
			$data = $this->db->query("SELECT * from report_service");
		}
		return $data->result_array();
	}
}