<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class DaftarAbsenController extends CI_Controller {

        
        public function __construct()
        {
            parent::__construct();
            if ($this->session->userdata('role') != 'Mahasiswa') {
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
            $data['absens'] = $this->AbsenModel->getByUsernameMahasiswa($this->session->userdata('username'));
            $data['perusahaan'] = $this->PendaftaranModel->getCurentWork($this->session->userdata('username'));

            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('mahasiswa/DaftarAbsenView', $data);
            // $this->load->view('template/modal');
            $this->load->view('template/footer');
        }

        public function absen()
        {
            $idPendaftaran      = $this->input->post('ID_PENDAFTARAN');
            $kegiatan           = $this->input->post('KEGIATAN');
            $tanggalAbsen       = $this->input->post('TANGGAL_ABSEN');
            
            $data = array(
                'ID_PENDAFTARAN'    => $idPendaftaran,
                'KEGIATAN'          => $kegiatan,
                'TANGGAL_ABSEN'     => $tanggalAbsen,
            );

            $idAbsen = $this->AbsenModel->insert($data);

            if ($idPendaftaran != null) {
				redirect('absenMagangMahasiswa');
            }
        }

        public function delete(){
            $idAbsen = $this->input->post('ID_ABSEN');
            $this->AbsenModel->delete($idAbsen);
            redirect('absenMagangMahasiswa');
        }
    }
    
    /* End of file DaftarAbsenController.php */
    
?>