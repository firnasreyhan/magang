<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PendaftaranModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        return $this->db->query('SELECT * FROM pendaftaran JOIN user ON pendaftaran.USERNAME = user.USERNAME JOIN lowongan ON pendaftaran.ID_LOWONGAN = lowongan.ID_LOWONGAN')->result();
    }

    public function getMahasiswaMagang($param)
    {
        return $this->db->query('SELECT pendaftaran.ID_PENDAFTARAN, user.USERNAME, user.NAME, lowongan.JUDUL, pendaftaran.NILAI, pendaftaran.STATUS FROM pendaftaran JOIN lowongan ON pendaftaran.ID_LOWONGAN = lowongan.ID_LOWONGAN JOIN user ON pendaftaran.USERNAME = user.USERNAME AND lowongan.USERNAME = "'.$param.'" AND pendaftaran.STATUS = 1')->result();
    }

    public function insert($param)
    {
        $this->db->insert('pendaftaran', $param);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function isRegister($username, $idLowongan)
    {
        return $this->db->query('SELECT * FROM pendaftaran WHERE username="'. $username .'" AND ID_LOWONGAN="'. $idLowongan .'"')->result();
    }

    public function getByUsername($username)
    {
        return $this->db->query('SELECT * FROM pendaftaran JOIN lowongan ON pendaftaran.ID_LOWONGAN = lowongan.ID_LOWONGAN JOIN user ON lowongan.USERNAME = user.USERNAME AND pendaftaran.USERNAME = "'. $username .'" ORDER BY pendaftaran.ID_PENDAFTARAN DESC')->result();
    }

    public function getCurentWork($username)
    {
        return $this->db->query('SELECT * FROM pendaftaran JOIN lowongan ON pendaftaran.ID_LOWONGAN = lowongan.ID_LOWONGAN JOIN user ON lowongan.USERNAME = user.USERNAME AND pendaftaran.USERNAME = "'. $username .'" AND pendaftaran.STATUS = 1')->result();
    }

    public function delete($param)
    {
        return $this->db->where('ID_PENDAFTARAN', $param['ID_PENDAFTARAN'])->delete('pendaftaran');
    }

    public function getDetail($param)
    {
        return $this->db->query('SELECT * FROM pendaftaran JOIN user ON pendaftaran.USERNAME = user.USERNAME JOIN lowongan ON pendaftaran.ID_LOWONGAN = lowongan.ID_LOWONGAN AND pendaftaran.ID_PENDAFTARAN="'. $param .'"')->result();
    }

    public function update($param)
    {
        return $this->db->where('ID_PENDAFTARAN', $param['ID_PENDAFTARAN'])->update('pendaftaran', $param);
    }
}

/* End of file PendaftaranModel.php */
