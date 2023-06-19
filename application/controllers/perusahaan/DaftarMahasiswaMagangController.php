<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class DaftarMahasiswaMagangController extends CI_Controller {

        
        public function __construct()
        {
            parent::__construct();
            if ($this->session->userdata('role') != 'Perusahaan') {
                $this->session->sess_destroy();
                redirect('login');
            }

            if ($this->session->userdata('log') != TRUE) {
                    $this->session->sess_destroy();
                    redirect('login');
            }

            $this->load->model('PendaftaranModel');
        }
        
    
        public function index()
        {
            $data['pendaftarans'] = $this->PendaftaranModel->getMahasiswaMagang($this->session->userdata('username'));

            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('perusahaan/DaftarMahasiswaMagangView', $data);
            // $this->load->view('template/modal');
            $this->load->view('template/footer');
        }
    }
    
    /* End of file DaftarMahasiswaMagangController.php */
    
?>