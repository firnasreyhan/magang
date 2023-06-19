<?php

defined('BASEPATH') or exit('No direct script access allowed');

class LowonganModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        return $this->db->query('SELECT * FROM lowongan JOIN user ON lowongan.USERNAME = user.USERNAME ORDER BY lowongan.ID_LOWONGAN DESC')->result();
    }

    public function getByPerusahaan($param)
    {
        return $this->db->query('SELECT * FROM lowongan JOIN user ON lowongan.USERNAME = user.USERNAME AND lowongan.USERNAME = "'.$param.'" ORDER BY lowongan.ID_LOWONGAN DESC')->result();
    }

    public function insert($param)
    {
        $this->db->insert('lowongan', $param);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function delete($param)
    {
        return $this->db->where('ID_LOWONGAN', $param['ID_LOWONGAN'])->delete('lowongan');
    }

    public function getDetail($param)
    {
        return $this->db->query('SELECT * FROM lowongan JOIN user ON lowongan.USERNAME = user.USERNAME AND lowongan.ID_LOWONGAN="'. $param .'"')->result();
    }

    public function update($param)
    {
        return $this->db->where('ID_LOWONGAN', $param['ID_LOWONGAN'])->update('lowongan', $param);
    }
}

/* End of file LowonganModel.php */
