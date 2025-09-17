<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_profile extends CI_Model
{
    private $table = 'tbl_user';

    // Ambil data user berdasarkan id
    public function getProfile($id_user)
    {
        return $this->db->where('id_user', $id_user)->get($this->table)->row();
    }

    // Update data profile
    public function updateProfile($id_user, $data)
    {
        $this->db->where('id_user', $id_user);
        return $this->db->update($this->table, $data);
    }

    // Ambil foto lama (untuk hapus ketika update)
    public function getOldImage($id_user)
    {
        $this->db->select('image');
        $this->db->from($this->table);
        $this->db->where('id_user', $id_user);
        return $this->db->get()->row();
    }
}
