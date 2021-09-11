<?php

class signer extends CI_Controller{
    function __construct(){
        parent::__construct();

        // Load model
        $this->load->model('m_admin');
        $this->load->model('m_signer');
        $this->load->model('m_maker');
        // $this->load->model('');
        // Load form helper and library
        $this->load->helper('form');
        $this->load->library('form_validation');
        // Load pagination library
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
        $data['searchKeyword'] = $this->session->userdata('searchKeyword');
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
        // Get rows count
        $conditions['searchKeyword'] = $data['searchKeyword'];
        $conditions['returnType']    = 'count';
        $rowsCount = $this->m_signer->getRows($conditions);
        // Pagination config
        $config['base_url']    = base_url().'signer/index/';
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
        $data['signer'] = $this->m_signer->getRows($conditions);
        $data['judul'] = 'dashboard';
        $data['active_tab'] = 'active';
        $data['status'] = 'pending';
        // Load the list page view
        $this->load->view('header', $data);
        $this->load->view('signer/dashboard', $data);
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
        $rowsCount = $this->m_signer->getRows_r($conditions);
        // Pagination config
        $config['base_url']    = base_url().'signer/rejected/';
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
        $data['signer'] = $this->m_signer->getRows_r($conditions);
        $data['judul'] = 'dashboard';
        $data['active_tab'] = 'active';
        $data['status'] = 'rejected';
        // Load the list page view
        $this->load->view('header', $data);
        $this->load->view('signer/dashboard_rejected', $data);
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
        $rowsCount = $this->m_signer->getRows_a($conditions);
        // Pagination config
        $config['base_url']    = base_url().'signer/approved/';
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
        $data['signer'] = $this->m_signer->getRows_a($conditions);
        $data['judul'] = 'dashboard';
        $data['active_tab'] = 'active';
        $data['status'] = 'approved';
        // Load the list page view
        $this->load->view('header', $data);
        $this->load->view('signer/dashboard_approved', $data);
        $this->load->view('footer');
    }

    function follup_signer($id, $angka){
        $this->m_signer->foll_signer($id, $angka);
        if($angka==1){
            $this->session->set_flashdata('success','Approved');
        }else{
            $this->session->set_flashdata('failed','Rejected');
        }  
        redirect('signer');
    }

}