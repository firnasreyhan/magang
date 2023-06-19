<?php

defined('BASEPATH') or exit('No direct script access allowed');

class LoginModel extends CI_Model
{
    public function getProfilMahasiswa($username)
    {
        return $this->db->query('SELECT * FROM user WHERE USERNAME = "'. $username .'"')->result();
    }
}
