<?php

defined('BASEPATH') or exit('No direct script access allowed');

class LoginController extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('LoginModel');
		$this->load->model('UserModel');
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function aksiLogin()
	{
		$username 		= $this->input->post('username');
		$password 		= $this->input->post('password');
		$idRole	        = null;
		$nama	        = null;
		$role			= null;

		$dataLogin = $this->db->query('SELECT * FROM user JOIN role ON role.ID_ROLE = user.ID_ROLE WHERE USERNAME = "' . $username . '" && PASSWORD = "' . $password . '"')->result();

		foreach ($dataLogin as $data) {
			$idRole 	= $data->ID_ROLE;
			$role 		= $data->ROLE;
			$nama 		= $data->NAME;
		}

		$data_session = array(
			'username' 		=> $username,
			'nama' 		    => $nama,
			'idRole' 		=> $idRole,
			'role' 			=> $role,
			'log' 			=> TRUE
		);

		$this->session->set_userdata($data_session);

		// if ($dataLogin != null) {
		// 	$this->session->set_flashdata('message', '');
		// 	if ($role == "Admin") {
		// 		redirect('aturan');
		// 	} else if ($role == "Event Manager") {
		// 		redirect('dashboardEvent');
		// 	} else if (substr($role, 0, 7) == "Kaprodi") {
		// 		redirect('dashboardKaprodi');
		// 	}
		// } else {
		// 	$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Username/ Password Salah! </div>');
		// 	redirect('login');
		// }

		if ($dataLogin != null) {
			$this->session->set_flashdata('message', '');
			if ($role == "Admin") {
				redirect('dashboardAdmin');
			} else if ($role == "Mahasiswa") {
				redirect('dashboardMahasiswa');
			} else if ($role == "Dosen") {
				redirect('dashboardDosen');
			} else if ($role == "Perusahaan") {
				redirect('dashboardPerusahaan');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Username/ Password Salah! </div>');
			redirect('login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

	public function profil()
	{
		$data['user'] = $this->UserModel->getDetail(['EMAIL' => $this->session->userdata('email')]);
		$data['role'] = $this->UserModel->getRoles();

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('ProfilView', $data);
		$this->load->view('template/footer');
	}

	public function updateProfil()
	{
		$data = $_POST;

		if ($data['PASSWORD'] == null) {
			$dataPoster = array(
				'EMAIL'         => $data['EMAIL'],
				'NAMA'      => $data['NAMA'],
				'TELEPON'    => $data['TELEPON']
			);
		} else {
			$dataPoster = array(
				'EMAIL'         => $data['EMAIL'],
				'NAMA'      => $data['NAMA'],
				'TELEPON'    => $data['TELEPON'],
				'PASSWORD'    => $data['PASSWORD']
			);
		}

		$this->UserModel->update($dataPoster);

		$data_session = array(
			'email' 		=> $data['EMAIL'],
			'nama' 		    => $data['NAMA'],
			'idRole' 		=> $this->session->userdata('idRole'),
			'role' 			=> $this->session->userdata('role'),
			'log' 			=> TRUE
		);

		$this->session->set_userdata($data_session);

		$this->session->set_tempdata('updateProfil', '<div class="alert alert-success" role="alert">Berhasil update profil</div>', 1);

		redirect('profil');
	}
}

/* End of file LoginController.php */
