<?php

class admin extends CI_Controller{
    function __construct(){
        parent::__construct();	
        $this->load->model('db_admin');	
        $this->load->model('db_lapor');
        if($this->session->userdata('status') != "login"){
			redirect('homepage/v_login_admin');
		}
    }

    function get_autocomplete(){
        if (isset($_GET['term'])) {
            $result = $this->db_admin->autocomp_olt($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->hostnamegpon;
                echo json_encode($arr_result);
            }
        }
    }

    public function index(){
        $data['judul'] = 'Home Admin';
        $this->load->view('Admin/header', $data);
        $this->load->view('Admin/homepage');
        $this->load->view('Admin/footer');
    }

    public function v_input_darlink(){
        $data['judul'] = 'Input Darlink';
        $this->load->view('Admin/header', $data);
        $this->load->view('Admin/inputdarlink');
        $this->load->view('Admin/footer');
    }

    public function inputOLT(){
        $cek = $this->db_admin->getOLT();
        if($cek > 0){
            $this->session->set_flashdata('OLT','sudah terdaftar');
            redirect('admin/v_input_darlink');
        }else{
            $this->db_admin->inputnewOLT();
            $this->session->set_flashdata('success','terinput');
            redirect('admin/v_input_darlink');
        }
    }

    public function inputODP(){
        $cek1 = $this->db_admin->getOLT();
        $cek2 = $this->db_admin->getODP();
        if($cek1 > 0){
            if($cek2 > 0){
                $this->session->set_flashdata('ODP','sudah terdaftar');
                redirect('admin/v_input_darlink');
            }else{
                $this->db_admin->inputnewODP();
                $this->db_admin->inputnewSplitter();
                $this->session->set_flashdata('success','terinput');
                redirect('admin/v_input_darlink');
            }   
        }else{
            $this->session->set_flashdata('OLT','tidak terdaftar');
            redirect('admin/v_input_darlink');
        }
    }

    public function inputServicebyODP(){
        $cek1 = $this->db_admin->getODP();
        $cek2 = $this->db_admin->getServiceInet();
        $cek3 = $this->db_admin->getServiceVoice();
        if ($this->input->post('numbservice', true)<>null and $this->input->post('numbservice2', true)<>null){
            if($cek1 > 0){
                if($cek2>0 or $cek3>0){
                    $this->session->set_flashdata('Service','sudah terdaftar');
                    redirect('admin/v_input_darlink');
                }else{
                    $this->db_admin->inputnewServicebyODP();
                    $this->session->set_flashdata('success','terinput');
                    redirect('admin/v_input_darlink');
                }   
            }else{
                $this->session->set_flashdata('ODP','tidak terdaftar');
                redirect('admin/v_input_darlink');
            }
        }else if($this->input->post('numbservice', true)<>null and $this->input->post('numbservice2', true)==null){
            if($cek1 > 0){
                if($cek2 > 0){
                    $this->session->set_flashdata('Service','sudah terdaftar');
                    redirect('admin/v_input_darlink');
                }else{
                    $this->db_admin->inputnewServicebyODP();
                    $this->session->set_flashdata('success','terinput');
                    redirect('admin/v_input_darlink');
                }   
            }else{
                $this->session->set_flashdata('ODP','tidak terdaftar');
                redirect('admin/v_input_darlink');
            }
        }else if($this->input->post('numbservice', true)==null and $this->input->post('numbservice2', true)<>null){
            if($cek1 > 0){
                if($cek3 > 0){
                    $this->session->set_flashdata('Service','sudah terdaftar');
                    redirect('admin/v_input_darlink');
                }else{
                    $this->db_admin->inputnewServicebyODP();
                    $this->session->set_flashdata('success','terinput');
                    redirect('admin/v_input_darlink');
                }   
            }else{
                $this->session->set_flashdata('ODP','tidak terdaftar');
                redirect('admin/v_input_darlink');
            }
        }else{
            $this->session->set_flashdata('Service','harus diisi salah satu');
            redirect('admin/v_input_darlink');
        }
    }

    public function inputServicebyOLT(){
        $cek1 = $this->db_admin->getOLT();
        $cek2 = $this->db_admin->getServiceInet();
        $cek3 = $this->db_admin->getServiceVoice();
        if ($this->input->post('numbservice', true)<>null and $this->input->post('numbservice2', true)<>null){
            if($cek1 > 0){
                if($cek2>0 or $cek3>0){
                    $this->session->set_flashdata('Service','sudah terdaftar');
                    redirect('admin/v_input_darlink');
                }else{
                    $this->db_admin->inputnewServicebyOLT();
                    $this->session->set_flashdata('success','terinput');
                    redirect('admin/v_input_darlink');
                }   
            }else{
                $this->session->set_flashdata('OLT','tidak terdaftar');
                redirect('admin/v_input_darlink');
            }
        }else if($this->input->post('numbservice', true)<>null and $this->input->post('numbservice2', true)==null){
            if($cek1 > 0){
                if($cek2 > 0){
                    $this->session->set_flashdata('Service','sudah terdaftar');
                    redirect('admin/v_input_darlink');
                }else{
                    $this->db_admin->inputnewServicebyOLT();
                    $this->session->set_flashdata('success','terinput');
                    redirect('admin/v_input_darlink');
                }   
            }else{
                $this->session->set_flashdata('OLT','tidak terdaftar');
                redirect('admin/v_input_darlink');
            }
        }else if($this->input->post('numbservice', true)==null and $this->input->post('numbservice2', true)<>null){
            if($cek1 > 0){
                if($cek3 > 0){
                    $this->session->set_flashdata('Service','sudah terdaftar');
                    redirect('admin/v_input_darlink');
                }else{
                    $this->db_admin->inputnewServicebyOLT();
                    $this->session->set_flashdata('success','terinput');
                    redirect('admin/v_input_darlink');
                }   
            }else{
                $this->session->set_flashdata('OLT','tidak terdaftar');
                redirect('admin/v_input_darlink');
            }
        }else{
            $this->session->set_flashdata('Service','harus diisi salah satu');
            redirect('admin/v_input_darlink');
        }
    }
        

    public function databaseAll(){
        $data['judul'] = 'DB All';
        $data['getdata'] = $this->db_admin->getAllDarlink();
        $this->load->view('Admin/header', $data);
        $this->load->view('Admin/databaseAll', $data);
        $this->load->view('Admin/footer');
    }

    public function databaseOLT(){
        $data['judul'] = 'DB OLT';
        $data['getdata'] = $this->db_admin->getAllOLT();
        $this->load->view('Admin/header', $data);
        $this->load->view('Admin/databaseOLT', $data);
        $this->load->view('Admin/footer');
    }

    public function databaseODP(){
        $data['judul'] = 'DB ODP';
        $data['getdata'] = $this->db_admin->getAllODP();
        $this->load->view('Admin/header', $data);
        $this->load->view('Admin/databaseODP', $data);
        $this->load->view('Admin/footer');
    }

    public function databaseService(){
        $data['judul'] = 'DB Service';
        $data['getdata'] = $this->db_admin->getAllService();
        $this->load->view('Admin/header', $data);
        $this->load->view('Admin/databaseService', $data);
        $this->load->view('Admin/footer');
    }

    public function deleteService($key){
        $this->db_admin->deleteService($key);
        $this->session->set_flashdata('success','dihapus');
        redirect('admin/databaseService');
    }

    public function deleteODP($key){
        $this->db_admin->deleteODP($key);
        $this->session->set_flashdata('success','dihapus');
        redirect('admin/databaseODP');
    }

    public function deleteOLT($key){
        $this->db_admin->deleteOLT($key);
        $this->session->set_flashdata('success','dihapus');
        redirect('admin/databaseOLT');
    }

    public function v_users(){
        $data['judul'] = 'User Report';
        $data['getdata'] = $this->db_admin->getAllUser();
        $this->load->view('Admin/header', $data);
        $this->load->view('Admin/req_access', $data);
        $this->load->view('Admin/footer');
    }

    public function getAccess($key1, $key2){
        $this->db_admin->getAccess($key1, $key2);
        $this->session->set_flashdata('success','diubah');
        redirect('admin/v_users');
    }

    public function deleteUser($key){
        $this->db_admin->deleteUser($key);
        $this->session->set_flashdata('success','dihapus');
        redirect('admin/v_users');
    }

    public function updateUser($key){
        $this->db_admin->updateUser($key);
        $this->session->set_flashdata('success','diupdate');
        redirect('admin/v_users');
    }

    public function v_listreport_s(){
        $data['judul'] = 'Report Service';
        $data['dataReport'] = $this->db_lapor->getAllReport_s();
        $this->load->view('Admin/header', $data);
        $this->load->view('Admin/listreport_s', $data);
        $this->load->view('Admin/footer');
    }

    public function search_report_s(){
        $data['judul'] = 'Report Service';
        $data['dataReport'] = $this->db_lapor->search_report_s();
        $this->load->view('Admin/header', $data);
        $this->load->view('Admin/listreport_s', $data);
        $this->load->view('Admin/footer');
    }

    public function v_listreport_co(){
        $data['judul'] = 'Report Cut Over';
        $data['dataReport'] = $this->db_lapor->getAllReport_co();
        $this->load->view('Admin/header', $data);
        $this->load->view('Admin/listreport_co', $data);
        $this->load->view('Admin/footer');
    }

    public function search_report_co(){
        $data['judul'] = 'Report Cut Over';
        $data['dataReport'] = $this->db_lapor->search_report_co();
        $this->load->view('Admin/header', $data);
        $this->load->view('Admin/listreport_co', $data);
        $this->load->view('Admin/footer');
    }

    public function aksi_report_s($key1, $key2){
        $this->db_admin->report_s_done($key1, $key2);
        redirect('admin/v_listreport_s');
    }

    public function aksi_report_co($key1, $key2){
        $this->db_admin->report_co_done($key1, $key2);
        redirect('admin/v_listreport_co');
    }

    public function search_All(){
        $data['judul'] = 'Database All';
        $data['getdata'] = $this->db_admin->search_All();
        $this->load->view('Admin/header', $data);
        $this->load->view('Admin/databaseAll', $data);
        $this->load->view('Admin/footer');
    }

    public function search_OLT(){
        $data['judul'] = 'Database OLT';
        $data['getdata'] = $this->db_admin->search_OLT();
        $this->load->view('Admin/header', $data);
        $this->load->view('Admin/databaseOLT', $data);
        $this->load->view('Admin/footer');
    }

    public function search_ODP(){
        $data['judul'] = 'Database ODP';
        $data['getdata'] = $this->db_admin->search_ODP();
        $this->load->view('Admin/header', $data);
        $this->load->view('Admin/databaseODP', $data);
        $this->load->view('Admin/footer');
    }

    public function search_Service(){
        $data['judul'] = 'Database Service';
        $data['getdata'] = $this->db_admin->search_Service();
        $this->load->view('Admin/header', $data);
        $this->load->view('Admin/databaseService', $data);
        $this->load->view('Admin/footer');
    }

    public function updateSplitter($key,$splitter){
        if ($this->db_admin->getODP()>0){
            $this->db_admin->updateSplitter($key);
            $this->db_admin->deleteSplitterNull($splitter);
            $this->session->set_flashdata('success','diubah');
        }else{
            $this->session->set_flashdata('ODP','tidak terdaftar');
        }
        redirect('admin/databaseAll');
    }

    public function editOLT($key){
        if ($this->db_admin->getOLT()<1){
            $this->db_admin->editOLT($key);
            $this->session->set_flashdata('success','diubah');
        }else{
            $this->session->set_flashdata('OLT','sudah terdaftar');
        }
        redirect('admin/databaseOLT');
    }

    public function editODP($key){
        if ($this->db_admin->getKeyODP($key)<1){
            if ($this->db_admin->getODP()<1){
                $this->db_admin->editODP($key);
                $this->session->set_flashdata('success','diubah');
            }else{
                $this->session->set_flashdata('ODP','sudah terdaftar');
            }
        }else{
            $this->db_admin->editODP($key);
            $this->session->set_flashdata('success','diubah');
        }
        redirect('admin/databaseODP');        
    }

    public function editService($key){
        if ($this->db_admin->getKeyService(1)<1){ //jika keduanya ga sama
            if ($this->db_admin->getKeyService(2)<1 and $this->db_admin->getKeyService($key,3)>0){ //jika numbservice gasama dan numbservice2 sama
                if ($this->db_admin->getServiceInet()<1){
                    $this->db_admin->editService($key);
                    $this->session->set_flashdata('success','diubah');
                }else{
                    $this->session->set_flashdata('Service','sudah terdaftar');
                }
            }else if ($this->db_admin->getKeyService(2)>0 and $this->db_admin->getKeyService(3)<1){ //jika numbservice sama dan numbservice2 gasama
                if ($this->db_admin->getServiceVoice()<1){
                    $this->db_admin->editService($key);
                    $this->session->set_flashdata('success','diubah');
                }else{
                    $this->session->set_flashdata('Service','sudah terdaftar');
                }
            }else{
                if ($this->db_admin->getServiceVoice()<1 or $this->db_admin->getServiceInet()<1){
                    $this->db_admin->editService($key);
                    $this->session->set_flashdata('success','diubah');
                }else{
                    $this->session->set_flashdata('Service','sudah terdaftar');
                }
            }
        }else if($this->db_admin->getKeyService(1)>1){ //jika keduanya sama
            $this->db_admin->editService($key);
            $this->session->set_flashdata('success','diubah');
        }
        redirect('admin/databaseService');        
    }

    public function searchDashboard($key){
        $data['dataReport'] = $this->db_admin->searchDashboard($key);
        if($key=='migrasi1' or $key=='migrasi0' or $key=='migrasi2' or $key=='migrasi' or $key=='normalisasi0' or $key=='normalisasi1' or $key=='normalisasi2' or $key=='normalisasi' or $key=='osodp0' or $key=='osodp1' or $key=='osodp2' or $key=='osodp' or $key=='pro0' or $key=='pro1' or $key=='pro2' or $key=='pro' or $key=='s0' or $key=='s1' or $key=='s2'){
            $data['judul'] = 'Report Service';
            $this->load->view('Admin/header', $data);
            $this->load->view('Admin/listreport_s', $data);
            $this->load->view('Admin/footer');
        } else{
            $data['judul'] = 'Report Service';
            $this->load->view('Admin/header', $data);
            $this->load->view('Admin/listreport_co', $data);
            $this->load->view('Admin/footer');
        }
    }

    public function export(){
        $data['getdata'] = $this->db_admin->getAllDarlink();
        $this->load->view('Admin/export', $data);
    }
}