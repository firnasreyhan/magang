<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class DaftarBimbinganController extends CI_Controller {

        
        public function __construct()
        {
            parent::__construct();
            if ($this->session->userdata('role') != 'Dosen') {
                $this->session->sess_destroy();
                redirect('login');
            }

            if ($this->session->userdata('log') != TRUE) {
                    $this->session->sess_destroy();
                    redirect('login');
            }

            $this->load->model('BimbinganModel');
            $this->load->model('LoginModel');
        }
        
        public function index()
        {
            $data['bimbingans'] = $this->BimbinganModel->getBimbinganDosen($this->session->userdata('username'));

            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('dosen/DaftarBimbinganView', $data);
            // $this->load->view('template/modal');
            $this->load->view('template/footer');
        }
        
        public function detailMahasiswa($username)
        {
            $data['mahasiswa'] = $this->LoginModel->getProfilMahasiswa($username);
            $data['bimbingans'] = $this->BimbinganModel->getBimbinganMahasiswa($username);
            $data['pembimbing'] = $this->BimbinganModel->getBimbinganByAllUsername($username, $this->session->userdata('username'));

            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('dosen/DetailBimbinganMahasiswaView', $data);
            // $this->load->view('template/modal');
            $this->load->view('template/footer');
        }

        public function detail($id)
        {
            $data['bimbingan'] = $this->BimbinganModel->getDetail($id);
            $data['pembimbing'] = $this->BimbinganModel->getMahasiswa($id);

            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('dosen/DetailBimbinganView', $data);
            // $this->load->view('template/modal');
            $this->load->view('template/footer');
        }

        public function balasBimbingan()
        {
            $config = ['upload_path' => './assets/documents/bimbinganDosen/', 'allowed_types' => 'pdf', 'max_size' => 1024];            
            $this->upload->initialize($config);

            $username           = $this->input->post('USERNAME_MHS');
            $idBimbingan        = $this->input->post('ID_BIMBINGAN');
            $catatan            = $this->input->post('CATATAN_DSN');
            $dokumen            = null;

            if($this->upload->do_upload('FILE_DSN')){ 
                $dataUpload     = $this->upload->data();
                $dokumen        = base_url('assets/documents/bimbinganDosen/' . $dataUpload['file_name']);
            }
            
            $data = array(
                'ID_BIMBINGAN'  => $idBimbingan,
                'FILE_DSN'      => $dokumen,
                'CATATAN_DSN'   => $catatan,
                'STATUS'        => "1",
            );

            $this->BimbinganModel->update($data);

            redirect('bimbinganDosen/detail/' . $username);
        }

        public function updateNilaiAKhir()
        {
            $username       = $this->input->post('USERNAME_MHS');
            $idPembimbing   = $this->input->post('ID_PEMBIMBING');
            $nilai          = $this->input->post('NILAI_AKHIR');
            
            $data = array(
                'ID_PEMBIMBING'     => $idPembimbing,
                'NILAI'             => $nilai,
            );

            $this->BimbinganModel->updateLaporanAkhir($data);

            redirect('bimbinganDosen/detail/' . $username);
        }
    }
    
    /* End of file DaftarBimbinganController.php */
    
?>