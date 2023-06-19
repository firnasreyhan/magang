<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class DashboardDosenController extends CI_Controller {

        
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
        }
        
    
        public function index()
        {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('dosen/DashboardDosenView');
            // $this->load->view('template/modal');
            $this->load->view('template/footer');
        }
    
    }
    
    /* End of file DashboardDosenController.php */
    
?>