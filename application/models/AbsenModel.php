<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AbsenModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getByUsernameMahasiswa($username)
    {
        return $this->db->query('SELECT * FROM absen WHERE ID_PENDAFTARAN IN (SELECT ID_PENDAFTARAN FROM pendaftaran WHERE USERNAME = "'. $username .'" AND STATUS = 1) ORDER BY ID_ABSEN DESC')->result();
    }

    public function getAbsenPerusahaan($username)
    {
        return $this->db->query('SELECT absen.ID_ABSEN, user.NAME, lowongan.JUDUL, absen.KEGIATAN, absen.TANGGAL_ABSEN, absen.STATUS FROM absen 
        JOIN pendaftaran ON absen.ID_PENDAFTARAN = pendaftaran.ID_PENDAFTARAN 
        JOIN lowongan ON lowongan.ID_LOWONGAN = pendaftaran.ID_LOWONGAN
        JOIN user ON pendaftaran.USERNAME = user.USERNAME
        AND lowongan.USERNAME= "'.$username.'" AND absen.STATUS = 0')->result();
    }

    public function insert($param)
    {
        $this->db->insert('absen', $param);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function delete($param)
    {
        return $this->db->where('ID_ABSEN', $param)->delete('absen');
    }

    public function getDetail($param)
    {
        return $this->db->query('SELECT * FROM absen WHERE ID_ABSEN="'. $param .'"')->result();
    }

    public function update($param)
    {
        return $this->db->where('ID_ABSEN', $param['ID_ABSEN'])->update('absen', $param);
    }
}

/* End of file AbsenModel.php */
