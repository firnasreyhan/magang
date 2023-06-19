<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NotifikasiController extends CI_Controller {
    
	public function listNotifikasiAdmin()
	{
		$this->load->view('template/notifAdmin');
	}
	
	public function listNotifikasiEvent()
	{
		$this->load->view('template/notifEvent');
    }
	
	public function listNotifikasiPengajuan()
	{
		$this->load->view('template/notifPengajuan');
    }
    
}
