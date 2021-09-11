<?php

class m_admin extends CI_Model{
	function __construct() {
        // Set table name
        $this->table = 'users';
	}

    public function login_process($username, $password) {
		$data = $this->db->query("SELECT * FROM users where username = '$username' and password = '$password' ");
		return $data;
	}

	public function get_username($username) {
		$data = $this->db->query("SELECT * FROM users where username = '$username'");
		return $data;
	}

	public function get_access($username) {
		$data = $this->db->query("SELECT * FROM users where username = '$username' and status = 1");
		return $data;
	}

	public function change_profile($username, $password){
		$this->db->query("UPDATE users SET password='$password' WHERE username='$username'");
	}

	public function signup_process(){
		$username = $this->input->post('username', true);
		$password = $this->input->post('password', true);
		$tier = $this->input->post('tier', true);
		$this->db->query("INSERT INTO users (username, password, tier, status) values ('$username', '$password', '$tier', '0')");
	}

	function getRows($params = array()){
        $this->db->select('*');
        $this->db->from($this->table);
		$this->db->where('tier !=', 'admin');       
        if(array_key_exists("conditions", $params)){
            foreach($params['conditions'] as $key => $val){
                $this->db->where($key, $val);
            }
        }
        if(!empty($params['searchKeyword'])){
            $search = $params['searchKeyword'];
            $this->db->where('username', $search);
        }
        if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
            $result = $this->db->count_all_results();
        }else{
            if(array_key_exists("username", $params)){
                $this->db->where('username', $params['username']);
                $query = $this->db->get();
                $result = $query->row_array();
            }else{
                $this->db->order_by('username', 'asc');
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

	public function update_status($username, $status){
		if($status == 1){
			$this->db->query("UPDATE users SET status='0' WHERE username='$username'");
		}else{
			$this->db->query("UPDATE users SET status='1' WHERE username='$username'");
		}
		
	}

	public function delete_akun($username){
		$this->db->query("DELETE FROM users WHERE username = '$username'");
	}

}