<!-- referensi pagination : https://www.codexworld.com/codeigniter-crud-operations-with-search-pagination/ -->

<?php

class maker extends CI_Controller{
    function __construct(){
        parent::__construct();
        // Load model
        $this->load->model('m_admin');
        $this->load->model('m_maker');
        // Load form helper and library
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
        // Load pagination library
        $this->load->database();
        $this->load->library('pagination');
        // Per page limit
        $this->perPage = 10;
        // Sesion login
        if($this->session->userdata('status') != "login"){
			redirect('admin');
		}
    }

    public function index(){
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
        $rowsCount = $this->m_maker->getRows($conditions);
        // Pagination config
        $config['base_url']    = base_url().'maker/index/';
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
        $data['maker'] = $this->m_maker->getRows($conditions);
        $data['judul'] = 'dashboard';
        $data['active_tab'] = 'active';
        $data['status'] = 'pending';
        // Load the list page view
        $this->load->view('header', $data);
        $this->load->view('maker/dashboard', $data);
        $this->load->view('footer');
    }

    public function rejected(){
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
        $rowsCount = $this->m_maker->getRows_r($conditions);
        // Pagination config
        $config['base_url']    = base_url().'maker/rejected/';
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
        $data['maker'] = $this->m_maker->getRows_r($conditions);
        $data['judul'] = 'dashboard';
        $data['active_tab'] = 'active';
        $data['status'] = 'rejected';
        // Load the list page view
        $this->load->view('header', $data);
        $this->load->view('maker/dashboard_rejected', $data);
        $this->load->view('footer');
    }

    public function approved(){
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
        $rowsCount = $this->m_maker->getRows_a($conditions);
        // Pagination config
        $config['base_url']    = base_url().'maker/approved/';
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
        $data['maker'] = $this->m_maker->getRows_a($conditions);
        $data['judul'] = 'dashboard';
        $data['active_tab'] = 'active';
        $data['status'] = 'approved';
        // Load the list page view
        $this->load->view('header', $data);
        $this->load->view('maker/dashboard_approved', $data);
        $this->load->view('footer');
    }

    function v_input_laporan(){
        $data['judul'] = 'input laporan';
        $data['active_tab'] = 'active';
        $this->load->view('header', $data);
        $this->load->view('maker/laporan', $data);
        $this->load->view('footer');
    }

    function input_laporan_process(){
        $ven1 = $this->input->post('briit', true);
        $ven2 = $this->input->post('visionet', true);
        $ven3 = $this->input->post('indopay', true);
        if($ven1<=0 && $ven2<=0 && $ven3<=0){
            $this->session->set_flashdata('error','Jumlah implementasi kosong');
            redirect('maker/v_input_laporan');
        }else{
            $this->m_maker->insert_laporan();
            $this->session->set_flashdata('success','Laporan Berhasil Diajukan');
            redirect('maker');
        }
    }

    function delete_process($id){
        $this->m_maker->delete_laporan($id);
        $this->session->set_flashdata('success','Laporan Berhasil Dihapus');
        redirect('maker');
    }

    function ajukan_ulang($id){
        $this->m_maker->p_ulang($id);
        $this->session->set_flashdata('success','Laporan Berhasil Diajukan Ulang');
        redirect('maker/rejected');
    }

    function v_update_laporan($id){
        $data['judul'] = 'input laporan';
        $data['active_tab'] = 'active';
        $data['update'] = $this->m_maker->get_laporan($id);
        $this->load->view('header', $data);
        $this->load->view('maker/update_laporan', $data);
        $this->load->view('footer');
    }

    function update_laporan_process($id){
        $this->m_maker->update_laporan($id);
        $this->session->set_flashdata('success','Laporan Berhasil Diubah');
        redirect('maker');
    }

    function v_rekap($tahun){
        $data['judul'] = 'rekap';
        $data['active_tab'] = 'active';
        $data['jan'] = $this->m_maker->done_jan($tahun);
        $data['feb'] = $this->m_maker->done_feb($tahun);
        $data['mar'] = $this->m_maker->done_mar($tahun);
        $data['apr'] = $this->m_maker->done_apr($tahun);
        $data['mei'] = $this->m_maker->done_mei($tahun);
        $data['jun'] = $this->m_maker->done_jun($tahun);
        $data['jul'] = $this->m_maker->done_jul($tahun);
        $data['agt'] = $this->m_maker->done_agt($tahun);
        $data['sep'] = $this->m_maker->done_sep($tahun);
        $data['okt'] = $this->m_maker->done_okt($tahun);
        $data['nov'] = $this->m_maker->done_nov($tahun);
        $data['des'] = $this->m_maker->done_des($tahun);
        $data['xjan'] = $this->m_maker->pending_jan($tahun);
        $data['xfeb'] = $this->m_maker->pending_feb($tahun);
        $data['xmar'] = $this->m_maker->pending_mar($tahun);
        $data['xapr'] = $this->m_maker->pending_apr($tahun);
        $data['xmei'] = $this->m_maker->pending_mei($tahun);
        $data['xjun'] = $this->m_maker->pending_jun($tahun);
        $data['xjul'] = $this->m_maker->pending_jul($tahun);
        $data['xagt'] = $this->m_maker->pending_agt($tahun);
        $data['xsep'] = $this->m_maker->pending_sep($tahun);
        $data['xokt'] = $this->m_maker->pending_okt($tahun);
        $data['xnov'] = $this->m_maker->pending_nov($tahun);
        $data['xdes'] = $this->m_maker->pending_des($tahun);
        $data['tahun'] = $tahun;
        $this->load->view('header', $data);
        $this->load->view('maker/rekap', $data);
        $this->load->view('footer');
    }

    function tahun_rekap(){
        $year = date("Y");
        $cek = $this->input->post('yearpicker', true);
        if ($cek <> null){
            redirect('maker/v_rekap/'.$cek);
        }else{
            redirect('maker/v_rekap/'.$year);
        }  
    }
}