<?php

class homepage extends CI_Controller{
    function __construct(){
        parent::__construct();	
        $this->load->model('db_admin');
        $this->load->model('db_lapor');
    }
    
    public function index(){
        $data['judul'] = 'Home Page';
        $this->load->view('Home/header', $data);
        $this->load->view('Home/homepage');
        $this->load->view('Home/footer');
    } 

    public function search1(){
        $data['judul'] = 'Search by OLT';
        $hostnamegpon = $this->input->post('hostnamegpon',TRUE);
        $slot = $this->input->post('slot',TRUE);
        $port = $this->input->post('port',TRUE);
        $data['dataODP'] = $this->db_admin->searchODPbyOLT($hostnamegpon, $slot, $port);
        $data['dataService'] = $this->db_admin->searchServicebyOLT($hostnamegpon, $slot, $port);
        $data['searchKey1'] = $hostnamegpon;
        $data['searchKey2'] = $slot;
        $data['searchKey3'] = $port;
        $this->load->view('Home/header', $data);
        $this->load->view('Home/search1', $data);
        $this->load->view('Home/footer');
    }

    public function search2(){
        $data['judul'] = 'Search by ODP';
        $namaodp = $this->input->post('namaodp',TRUE);
        $data['dataOLT'] = $this->db_admin->searchOLTbyODP($namaodp);
        $data['dataService'] = $this->db_admin->searchServicebyODP($namaodp);
        $data['searchKey'] = $namaodp;
        $this->load->view('Home/header', $data);
        $this->load->view('Home/search2', $data);
        $this->load->view('Home/footer');
    }

    public function search3(){
        $data['judul'] = 'Search by Service';
        $numbservice = $this->input->post('numbservice',TRUE);
        $data['dataOLT'] = $this->db_admin->searchOLTbyService($numbservice);
        $data['dataODP'] = $this->db_admin->searchODPbyService($numbservice);
        $data['searchKey'] = $numbservice;
        $this->load->view('Home/header', $data);
        $this->load->view('Home/search3', $data);
        $this->load->view('Home/footer');
    }
    
    public function v_login_admin(){
        $data['judul'] = 'Login Admin';
        $this->load->view('Admin/login', $data);
    }

    public function c_login_admin(){
        $username = $this->input->post('username',TRUE);
		$password = $this->input->post('password',TRUE);
	    $validate = $this->db_admin->login($username, $password);
		if($validate > 0){
            $data_session = array(
                'username' => $username,
                'status' => "login"
            );
            $this->session->set_userdata($data_session);
			redirect('admin');
		} else{
			$this->session->set_flashdata('result_login', 'Username atau Password yang anda masukkan salah.');
			redirect('homepage/v_login_admin');
        }
    }

    function c_logout_admin(){
        $this->session->sess_destroy();
        redirect('homepage/v_login_admin');
    }

    public function v_regist_lapor(){
        $data['judul'] = 'Sign Up Reporters';
        $this->load->view('Lapor/register', $data);
    }

    public function c_regist_lapor(){
        $username = $this->input->post('username',TRUE);
        $cek = $this->db_lapor->getUsername($username);
        if ($cek < 1){
            $p1 = $this->input->post('password',TRUE);
            $p2 = $this->input->post('confirm_password',TRUE);
            if($p1 <> $p2){
                $this->session->set_flashdata('result', 'Password tidak cocok');
                redirect('homepage/v_regist_lapor');
            }else{
                $this->db_lapor->inputRegist();
                $this->session->set_flashdata('success',',silahkan lapor kepada Admin');
                redirect('homepage/v_login_lapor');
            }
        } else{
            $this->session->set_flashdata('result', 'Username sudah ada');
            redirect('homepage/v_regist_lapor');
        }
    }

    public function v_login_lapor(){
        $data['judul'] = 'Login Reporters';
        $this->load->view('Lapor/login', $data);
    }

    function c_login_lapor() {
        $username = $this->input->post('username',TRUE);
		$password = $this->input->post('password',TRUE);
	    $validate = $this->db_lapor->login($username, $password);
		if($validate > 0){
            $cekAkses = $this->db_lapor->getAccess($username);
            if ($cekAkses < 1){
                $this->session->set_flashdata('result_login', 'Akun Anda belum diverifikasi, silahkan lapor kepada Admin.');
			    redirect('homepage/v_login_lapor');
            } else{
                $data_session = array(
                    'username' => $username,
                    'status' => "login"
                );
                $this->session->set_userdata($data_session);
                redirect('lapor');
            }
		} else{
			$this->session->set_flashdata('result_login', 'Username atau Password yang anda masukkan salah.');
			redirect('homepage/v_login_lapor');
		}
    }

    function c_logout_lapor(){
        $this->session->sess_destroy();
        redirect('homepage/v_login_lapor');
    }
}
