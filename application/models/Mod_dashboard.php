<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_dashboard extends CI_Model
{
    // Jumlah dokumen per kategori
    public function get_compliance_per_kategori()
    {
        $this->db->select('kategori.nama_kat, COUNT(tbl_compliance.id_file) AS total');
        $this->db->from('tbl_compliance');
        $this->db->join('kategori', 'tbl_compliance.id_kat = kategori.id_kat', 'left');
        $this->db->group_by('tbl_compliance.id_kat');
        return $this->db->get()->result();
    }

    // Jumlah dokumen per tahun
    public function get_compliance_per_tahun()
    {
        $this->db->select('tahun, COUNT(id_file) AS total');
        $this->db->from('tbl_compliance');
        $this->db->group_by('tahun');
        $this->db->order_by('tahun', 'asc');
        return $this->db->get()->result();
    }

    public function get_user_per_role()
    {
        $this->db->select('tbl_userlevel.nama_level, COUNT(tbl_user.id_user) AS total');
        $this->db->from('tbl_user');
        $this->db->join('tbl_userlevel', 'tbl_user.id_level = tbl_userlevel.id_level', 'left');
        $this->db->group_by('tbl_user.id_level');
        return $this->db->get()->result();
    }

    public function get_compliance_per_kategori_internal()
    {
        $this->db->select('kategori_internal.nama_internal, COUNT(tbl_internal.id_file) AS total');
        $this->db->from('tbl_internal');
        $this->db->join('kategori_internal', 'tbl_internal.id_kategori = kategori_internal.id_kategori', 'left');
        $this->db->group_by('tbl_internal.id_kategori');

        $result = $this->db->get()->result();

        // ✅ Ubah total jadi integer
        foreach ($result as &$row) {
            $row->total = (int) $row->total;
        }

        return $result;
    }
    public function get_all_logs()
    {
        $this->db->select('username, fitur, aktivitas, created_at');
        $this->db->from('tbl_log_user');
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get()->result();
    }
}
