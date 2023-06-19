<?php

defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('role', 'user.ID_ROLE = role.ID_ROLE');
        return $this->db->get()->result();
    }
    
    public function getPerusahaan()
    {
        return $this->db->query('SELECT * FROM user WHERE ID_ROLE = "4"')->result();
    }

    public function getRoles()
    {
        $this->db->select('*');
        $this->db->from('role');
        return $this->db->get()->result();
    }

    public function insert($param)
    {
        return $this->db->insert('user', $param);
    }

    public function delete($param)
    {
        return $this->db->where('EMAIL', $param['EMAIL'])->delete('user');
    }

    public function getDetail($param)
    {
        return $this->db->where('EMAIL', $param['EMAIL'])->get('user')->result();
    }

    public function update($param)
    {
        return $this->db->where('EMAIL', $param['EMAIL'])->update('user', $param);
    }
}

/* End of file JenisKegiatanModel.php */
