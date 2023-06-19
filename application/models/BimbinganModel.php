<?php

defined('BASEPATH') or exit('No direct script access allowed');

class BimbinganModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getPembimbingMahasiswa($param)
    {
        return $this->db->query('SELECT * FROM pembimbing WHERE USERNAME_MHS="'. $param .'"')->result();
    }

    public function getBimbinganMahasiswa($param)
    {
        return $this->db->query('SELECT * FROM bimbingan JOIN pembimbing ON bimbingan.ID_PEMBIMBING = pembimbing.ID_PEMBIMBING AND pembimbing.USERNAME_MHS="'. $param .'" ORDER BY bimbingan.ID_BIMBINGAN ASC')->result();
    }

    public function getBimbinganDosen($param)
    {
        return $this->db->query('SELECT * FROM user JOIN pembimbing ON user.USERNAME = pembimbing.USERNAME_MHS AND pembimbing.USERNAME_DSN="'. $param .'" ORDER BY pembimbing.ID_PEMBIMBING ASC')->result();
    }

    public function getBimbinganByAllUsername($mahasiswa, $dosen)
    {
        return $this->db->query('SELECT * FROM pembimbing WHERE USERNAME_DSN="'. $dosen .'" AND USERNAME_MHS ="'. $mahasiswa .'"')->result();
    }

    public function getMahasiswa($param)
    {
        return $this->db->query('SELECT * FROM bimbingan JOIN pembimbing ON bimbingan.ID_PEMBIMBING = pembimbing.ID_PEMBIMBING AND bimbingan.ID_BIMBINGAN="'. $param .'"')->result();
    }

    public function insert($param)
    {
        return $this->db->insert('bimbingan', $param);
    }

    public function delete($param)
    {
        return $this->db->where('ID_LOWONGAN', $param['ID_LOWONGAN'])->delete('lowongan');
    }

    public function getDetail($param)
    {
        return $this->db->query('SELECT * FROM bimbingan WHERE ID_BIMBINGAN="'. $param .'"')->result();
    }

    public function update($param)
    {
        return $this->db->where('ID_BIMBINGAN', $param['ID_BIMBINGAN'])->update('bimbingan', $param);
    }

    public function updateLaporanAkhir($param)
    {
        return $this->db->where('ID_PEMBIMBING', $param['ID_PEMBIMBING'])->update('pembimbing', $param);
    }
}

/* End of file BimbinganModel.php */
