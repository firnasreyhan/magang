<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class DaftarBimbinganController extends CI_Controller {

        
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

            $this->load->model('BimbinganModel');
        }
        
    
        public function index()
        {
            $data['bimbingans'] = $this->BimbinganModel->getBimbinganMahasiswa($this->session->userdata('username'));
            $data['pembimbing'] = $this->BimbinganModel->getPembimbingMahasiswa($this->session->userdata('username'));

            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('mahasiswa/DaftarBimbinganView', $data);
            // $this->load->view('template/modal');
            $this->load->view('template/footer');
        }

        public function bimbingan()
        {
            $config = ['upload_path' => './assets/documents/bimbingan/', 'allowed_types' => 'pdf', 'max_size' => 1024];            
            $this->upload->initialize($config);

            $idPembimbing       = $this->input->post('ID_PEMBIMBING');
            $catatan            = $this->input->post('CATATAN_MHS');
            $dokumen            = null;

            if($this->upload->do_upload('FILE_MHS')){ 
                $dataUpload     = $this->upload->data();
                $dokumen        = base_url('assets/documents/bimbingan/' . $dataUpload['file_name']);
            }
            
            $data = array(
                'ID_PEMBIMBING'     => $idPembimbing,
                'CATATAN_MHS'       => $catatan,
                'FILE_MHS'          => $dokumen,
            );

            $idBimbingan = $this->BimbinganModel->insert($data);

            if ($idBimbingan != null) {
				redirect('bimbinganMahasiswa');
            }
        }

        public function detail($id)
        {
            $data['bimbingan'] = $this->BimbinganModel->getDetail($id);

            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('mahasiswa/DetailBimbinganView', $data);
            // $this->load->view('template/modal');
            $this->load->view('template/footer');
        }

        public function uploadLaporanAkhir()
        {
            $config = ['upload_path' => './assets/documents/laporan/', 'allowed_types' => 'pdf', 'max_size' => 1024];            
            $this->upload->initialize($config);

            $idPembimbing       = $this->input->post('ID_PEMBIMBING');
            $dokumen            = null;

            if($this->upload->do_upload('FILE_AKHIR')){ 
                $dataUpload     = $this->upload->data();
                $dokumen        = base_url('assets/documents/laporan/' . $dataUpload['file_name']);
            }
            
            $data = array(
                'ID_PEMBIMBING'     => $idPembimbing,
                'FILE_AKHIR'        => $dokumen,
            );

            $idBimbingan = $this->BimbinganModel->updateLaporanAkhir($data);

            if ($idBimbingan != null) {
				redirect('bimbinganMahasiswa');
            }
        }
    }
    
    /* End of file DaftarBimbinganController.php */
    
?>