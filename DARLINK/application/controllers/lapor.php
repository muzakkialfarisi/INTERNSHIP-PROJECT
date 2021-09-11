<?php

class lapor extends CI_Controller{
    function __construct(){
        parent::__construct();	
        $this->load->model('db_admin');
        $this->load->model('db_lapor');
        if($this->session->userdata('status') != "login"){
			redirect('homepage/v_login_lapor');
		}
    }

    public function index(){
        $data['judul'] = 'Home Report';
        $this->load->view('Lapor/header', $data);
        $this->load->view('Lapor/report', $data);
        $this->load->view('Lapor/footer');
    }

    public function listlapor_service(){
        $data['judul'] = 'List Report Service';
        $data['dataReport'] = $this->db_lapor->getAllReport_s();
        $this->load->view('Lapor/header', $data);
        $this->load->view('Lapor/listreport_s', $data);
        $this->load->view('Lapor/footer');
    }

    public function search_report_s(){
        $data['judul'] = 'List Report Service';
        $data['dataReport'] = $this->db_lapor->search_report_s();
        $this->load->view('Lapor/header', $data);
        $this->load->view('Lapor/listreport_s', $data);
        $this->load->view('Lapor/footer');
    }

    public function listlapor_co(){
        $data['judul'] = 'List Report Cut Over';
        $data['dataReport'] = $this->db_lapor->getAllReport_co();
        $this->load->view('Lapor/header', $data);
        $this->load->view('Lapor/listreport_co', $data);
        $this->load->view('Lapor/footer');
    }
    public function search_report_co(){
        $data['judul'] = 'List Report Cut Over';
        $data['dataReport'] = $this->db_lapor->search_report_co();
        $this->load->view('Lapor/header', $data);
        $this->load->view('Lapor/listreport_co', $data);
        $this->load->view('Lapor/footer');
    }

    public function reportService(){
        $this->db_lapor->inputReportService();
        $this->session->set_flashdata('success','terinput');
        redirect('lapor');
    }

    public function reportCO(){
        $this->db_lapor->inputReportCO();
        $this->session->set_flashdata('success','terinput');
        redirect('lapor');
    }

    public function deleteReport_s($key){
        $this->db_lapor->deleteReport_s($key);
        $this->session->set_flashdata('success','dihapus');
        redirect('lapor/listlapor_service');
    }

    public function deleteReport_co($key){
        $this->db_lapor->deleteReport_co($key);
        $this->session->set_flashdata('success','dihapus');
        redirect('lapor/listlapor_co');
    }

    public function updateReport_co($key){
        $this->db_lapor->updateReport_co($key);
        $this->session->set_flashdata('success','diupdate');
        redirect('lapor/listlapor_co');
    }

    public function updateReport_s($key){
        $this->db_lapor->updateReport_s($key);
        $this->session->set_flashdata('success','diupdate');
        redirect('lapor/listlapor_service');
    }
    
}
