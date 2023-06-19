<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class DaftarLowonganController extends CI_Controller {

        
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

            $this->load->model('LowonganModel');
            $this->load->model('PendaftaranModel');
        }
        
    
        public function index()
        {
            $data['lowongans'] = $this->LowonganModel->getAll();

            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('mahasiswa/DaftarLowonganView', $data);
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
            $this->load->view('mahasiswa/DetailLowonganView', $data);
            // $this->load->view('template/modal');
            $this->load->view('template/footer');
        }

        public function daftar()
        {
            $config = ['upload_path' => './assets/documents/register/', 'allowed_types' => 'pdf', 'max_size' => 1024];            
            $this->upload->initialize($config);

            $idLowongan         = $this->input->post('ID_LOWONGAN');
            $dokumen            = null;
            $username           = $this->session->userdata('username');

            if($this->upload->do_upload('DOKUMEN_PENDUKUNG')){ 
                $dataUpload     = $this->upload->data();
                $dokumen         = base_url('assets/documents/register/' . $dataUpload['file_name']);
            }
            
            $data = array(
                'USERNAME'          => $username,
                'ID_LOWONGAN'       => $idLowongan,
                'DOKUMEN_PENDUKUNG' => $dokumen,
            );

            $idPendaftaran = $this->PendaftaranModel->insert($data);

            if ($idPendaftaran != null) {
				redirect('detailLowonganMahasiswa/detail/'. $idLowongan);
            }
        }
    }
    
    /* End of file DaftarLowonganController.php */
    
?>