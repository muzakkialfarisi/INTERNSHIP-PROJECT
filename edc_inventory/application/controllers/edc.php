<?php

class edc extends CI_Controller{
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
        // Sesion login
        if($this->session->userdata('status') != "login"){
			redirect('admin');
		}
    }

    public function index(){
        $data = array();
        
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
        $rowsCount = $this->m_edc->getRows($conditions);
        
        // Pagination config
        $config['base_url']    = base_url().'edc/index/';
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
        $data['edc'] = $this->m_edc->getRows($conditions);
        $data['judul'] = 'dashboard';
        $data['active_tab'] = 'active';
        
        // Load the list page view
        $this->load->view('header', $data);
        $this->load->view('edc/dashboard', $data);
        $this->load->view('footer');
    }

    function v_input_edc(){
        $data['judul'] = 'input edc';
        $data['active_tab'] = 'active';
        $this->load->view('header', $data);
        $this->load->view('edc/input_edc', $data);
        $this->load->view('footer');
    }

    public function export_process(){
        $data['edc'] = $this->m_edc->get_edc();
        $this->load->view('edc/export_edc', $data);
    }

    public function input_edc_process(){
        $cek = $this->m_edc->get_edc_by_sn($this->input->post('sn', true),'row_array');
        if($cek < 1){
            if((strlen($this->input->post('mid', true)) == 12 || strlen($this->input->post('mid', true)) == null) && (strlen($this->input->post('tid', true)) == 8 || strlen($this->input->post('tid', true)) == null)){
                $this->m_edc->input_edc();
                $this->session->set_flashdata('success','Berhasil Terinput');
                redirect('edc/v_input_edc');
            }else{
                $this->session->set_flashdata('error','atau Atribut tidak sesuai format');
                redirect('edc/v_input_edc');
            }
        }else{
            $this->session->set_flashdata('error','Sudah Terdaftar');
            redirect('edc/v_input_edc');
        }
    }

    public function v_update_edc($sn){
        $data['judul'] = 'update edc';
        $data['edc'] = $this->m_edc->get_edc_by_sn($sn,'result_array');
        $this->load->view('header', $data);
        $this->load->view('edc/update_edc', $data);
        $this->load->view('footer');
    }

    public function update_edc_process($sn){
        if((strlen($this->input->post('mid', true)) == 12 || strlen($this->input->post('mid', true)) == null) && (strlen($this->input->post('tid', true)) == 8 || strlen($this->input->post('tid', true)) == null)){
            $this->m_edc->update_edc($sn);
            $this->session->set_flashdata('success','Berhasil Terupdate');
            redirect('edc');
        }else{
            $this->session->set_flashdata('error','atau Atribut tidak sesuai format');
            redirect('edc/v_update_edc/'.$sn);
        }
    } 

    public function delete_edc_process($sn){
        $this->m_edc->delete_edc($sn);
        $this->session->set_flashdata('success','Berhasil Terhapus');
        redirect('edc');
    }

    public function search_by_sn(){
        $data['judul'] = 'database';
        $data['active_tab'] = 'active';
        $data['edc'] = $this->m_edc->get_edc_by_sn($this->input->post('sn', true),'result_array');
        $this->load->view('header', $data);
        $this->load->view('edc/dashboard', $data);
        $this->load->view('footer');
    }

    public function v_log($sn){
        $data['judul'] = 'log';
        $data['edc'] = $this->m_edc->get_log($sn);
        $this->load->view('header', $data);
        $this->load->view('edc/log', $data);
        $this->load->view('footer');
    }

    function get_autocomplete_uker(){
        if (isset($_GET['term'])) {
            $result = $this->m_edc->autocomp_uker($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->nama_uker;
                echo json_encode($arr_result);
            }
        }
    }
}