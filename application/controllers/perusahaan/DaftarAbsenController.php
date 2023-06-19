<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class DaftarAbsenController extends CI_Controller {

        
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

            $this->load->model('AbsenModel');
            $this->load->model('PendaftaranModel');
        }
        
    
        public function index()
        {
            $data['absens'] = $this->AbsenModel->getAbsenPerusahaan($this->session->userdata('username'));

            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('perusahaan/DaftarAbsenView', $data);
            // $this->load->view('template/modal');
            $this->load->view('template/footer');
        }

        public function updateStatus()
        {
            $idAbsen    = $this->input->post('ID_ABSEN');
            
            $data = array(
                'ID_ABSEN'  => $idAbsen,
                'STATUS'    => '1',
            );

            $this->AbsenModel->update($data);
            redirect('daftarAbsenMahasiswaMagang');
        }
    }
    
    /* End of file DaftarAbsenController.php */
    
?>