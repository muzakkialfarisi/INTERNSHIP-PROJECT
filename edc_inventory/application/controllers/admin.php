<?php

class admin extends CI_Controller{
    function __construct(){
        parent::__construct();	
        $this->load->model('m_edc');	
        $this->load->model('m_admin');
        // Load form helper and library
        $this->load->helper('form');
        $this->load->library('form_validation');
        // Load pagination library
        $this->load->library('pagination');
        // Per page limit
        $this->perPage = 10;
    }

    public function index(){
        $data['judul'] = 'login page';
        $this->load->view('admin/header', $data);
        $this->load->view('admin/login', $data);
        $this->load->view('admin/footer');
    }

    public function profile($username){
        $data['judul'] = 'profile';
        $data['active_tab'] = 'active';
        $this->load->view('header', $data);
        $this->load->view('admin/profile', $data);
        $this->load->view('footer');
    }

    public function login_process(){
        $username = $this->input->post('username',TRUE);
		$password = $this->input->post('password',TRUE);
        $cek_user = $this->m_admin->get_username($username);
        if($cek_user->row() > 0){
            $access = $this->m_admin->get_access($username);
            if($access->row() > 0 ){
                $validate = $this->m_admin->login_process($username, $password);
                if($validate->row() > 0){
                    $tier = $validate->row()->tier;
                    $data_session = array(
                        'username' => $username,
                        'status' => "login",
                        'tier' => $tier
                    );
                    if ($tier == 'admin'){
                        $this->session->set_userdata($data_session);
                        redirect('edc');
                    }else if ($tier == 'maker'){
                        $this->session->set_userdata($data_session);
                        redirect('maker');
                    }else if($tier == 'checker'){
                        $this->session->set_userdata($data_session);
                        redirect('checker');
                    }
                    else{
                        $this->session->set_userdata($data_session);
                        redirect('signer');
                    }
                } else{
                    $this->session->set_flashdata('error', 'username atau password anda salah');
                    redirect('admin');
                }
            }else{
                $this->session->set_flashdata('error', 'Akun anda tidak aktif <br> konfirmasi Admin!');
                redirect('admin');
            }
        }else{
            $this->session->set_flashdata('error', 'Akun tidak terdaftar');
            redirect('admin');
        }
    }

    public function change_profile_process($username){
        if($this->input->post('password',TRUE) <> $this->input->post('confirm_password',TRUE)){
            $this->session->set_flashdata('error','Gagal Terubah');
        } else{
            $this->m_admin->change_profile($username, $this->input->post('password',TRUE));
            $this->session->set_flashdata('success','Berhasil Terubah');
        }
        redirect('admin/profile/'.$username);
    }

    public function v_signup(){
        $data['judul'] = 'registrasi';
        $this->load->view('admin/header', $data);
        $this->load->view('admin/registrasi', $data);
        $this->load->view('footer');
    }

    public function signup_process(){
        $username = $this->m_admin->get_username($this->input->post('username',TRUE))->row_array();
        if($username < 1){
            if($this->input->post('password',TRUE) <> $this->input->post('confirm_password',TRUE)){
                $this->session->set_flashdata('error','Password tidak sesuai');
                redirect('admin/v_signup');
            } else{
                $this->m_admin->signup_process();
                $this->session->set_flashdata('success','Registrasi berhasil! Silahkan konfirmasi Admin');
                redirect('admin');
            }
        }else{
            $this->session->set_flashdata('error','Username telah tersedia');
            redirect('admin/v_signup');
        }
    }

    public function v_users(){
        $data = array();
        $this->session->unset_userdata('searchKeyword');
        // If search request submitted
        if($this->input->post('submitSearch')){
            $inputKeywords = $this->input->post('searchKeyword');
            $searchKeyword = strip_tags($inputKeywords);
            if(!empty($searchKeyword)){
                $this->session->set_userdata('searchKeyword',$searchKeyword);
            }else{
                $this->session->unset_userdata('searchKeyword');
            }
        }elseif($this->input->post('submitSearchReset')){
            $this->session->unset_userdata('searchKeyword');
        }
        $data['searchKeyword'] = $this->session->userdata('searchKeyword');
        $conditions['searchKeyword'] = $this->session->userdata('searchKeyword');
        $conditions['returnType']    = 'count';
        $rowsCount = $this->m_admin->getRows($conditions);
        // Pagination config
        $config['base_url']    = base_url().'admin/v_users/';
        $config['uri_segment'] = 3;
        $config['total_rows']  = $rowsCount;
        $config['per_page']    = $this->perPage;
        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        // Initialize pagination library
        $this->pagination->initialize($config);
        // Define offset
        $page = $this->uri->segment(3);
        $offset = !$page?0:$page;
        // Get rows
        $conditions['returnType'] = '';
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;

        $data['user'] = $this->m_admin->getRows($conditions);
        $data['judul'] = 'users';
        $data['active_tab'] = 'active';
        $this->load->view('header', $data);
        $this->load->view('admin/users', $data);
        $this->load->view('footer');
    }

    public function update_status($username, $status){
        $this->m_admin->update_status($username, $status);
        if($status == 1){
            $this->session->set_flashdata('error','Akses di non-aktifkan');
        }else{
            $this->session->set_flashdata('success','Akses di aktifkan');
        }
        redirect('admin/v_users');
    }

    public function delete_akun($username){
        $this->m_admin->delete_akun($username);
        $this->session->set_flashdata('success','Akun berhasil dihapus');
        redirect('admin/v_users');
    }

    public function logout_process(){
        $this->session->sess_destroy();
        redirect('admin');
    }
}