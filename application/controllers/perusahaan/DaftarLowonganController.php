<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class DaftarLowonganController extends CI_Controller {

        
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

            $this->load->model('LowonganModel');
            $this->load->model('PendaftaranModel');
        }
        
    
        public function index()
        {
            $data['lowongans'] = $this->LowonganModel->getByPerusahaan($this->session->userdata('username'));

            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('perusahaan/DaftarLowonganView', $data);
            // $this->load->view('template/modal');
            $this->load->view('template/footer');
        }

        public function detail($id)
        {
            $data['lowongan'] = $this->LowonganModel->getDetail($id);
            $data['isRegister'] = $this->PendaftaranModel->isRegister($this->session->userdata('username'), $id);

            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('perusahaan/DetailLowonganView', $data);
            // $this->load->view('template/modal');
            $this->load->view('template/footer');
        }

        public function tambahLowongan()
        {
            $judul      = $this->input->post('JUDUL');
            $deskripsi  = $this->input->post('DESKRIPSI_LOWONGAN');
            $kuota      = $this->input->post('KUOTA');
            $username   = $this->session->userdata('username');
            
            $data = array(
                'JUDUL'                 => $judul,
                'DESKRIPSI_LOWONGAN'    => $deskripsi,
                'KUOTA'                 => $kuota,
                'USERNAME'              => $username,
            );

            $idPendaftaran = $this->LowonganModel->insert($data);

            if ($idPendaftaran != null) {
				redirect('lowonganPerusahaan');
            }
        }

        public function updateLowongan()
        {
            $judul      = $this->input->post('JUDUL');
            $deskripsi  = $this->input->post('DESKRIPSI_LOWONGAN');
            $kuota      = $this->input->post('KUOTA');
            $idLowongan = $this->input->post('ID_LOWONGAN');
            
            $data = array(
                'JUDUL'                 => $judul,
                'DESKRIPSI_LOWONGAN'    => $deskripsi,
                'KUOTA'                 => $kuota,
                'ID_LOWONGAN'           => $idLowongan,
            );

            $idPendaftaran = $this->LowonganModel->update($data);

            redirect('lowonganPerusahaan');
        }
    }
    
    /* End of file DaftarLowonganController.php */
    
?>