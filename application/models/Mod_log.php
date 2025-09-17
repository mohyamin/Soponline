<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Mod_log extends CI_Model
{
    var $table = 'v_tbl_log';
    var $column_search = array('username', 'fitur');
    var $column_order = array('username', 'fitur');
    var $order = array('id' => 'desc');
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query($from = null, $until = null)
    {
        $this->db->from('log_user');
        $this->db->join('tbl_user', 'tbl_user.id_user = log_user.id_user');

        if (!empty($from)) {
            $this->db->where('DATE(cretead_at) >=', $from);
        }

        if (!empty($until)) {
            $this->db->where('DATE(cretead_at) <=', $until);
        }

        // search
        if (!empty($_POST['search']['value'])) {
            $this->db->group_start();
            $this->db->like('tbl_user.full_name', $_POST['search']['value']);
            $this->db->or_like('log_user.fitur', $_POST['search']['value']);
            $this->db->or_like('log_user.keterangan', $_POST['search']['value']);
            $this->db->group_end();
        }

        // order
        if (isset($_POST['order'])) {
            $this->db->order_by('log_user.cretead_at', 'desc');
        } else {
            $this->db->order_by('log_user.cretead_at', 'desc');
        }
    }

    public function get_datatables($from = null, $until = null)
    {
        $this->_get_datatables_query($from, $until);

        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);

        return $this->db->get()->result();
    }


    public function count_filtered($from = null, $until = null)
    {
        $this->_get_datatables_query($from, $until);
        return $this->db->get()->num_rows();
    }

    public function count_all($from = null, $until = null)
    {
        $this->db->from('log_user');

        if (!empty($from)) {
            $this->db->where('DATE(cretead_at) >=', $from);
        }

        if (!empty($until)) {
            $this->db->where('DATE(cretead_at) <=', $until);
        }

        return $this->db->count_all_results();
    }


    function insert_kat($table, $data)
    {
        $insert = $this->db->insert($table, $data);
        return $insert;
    }

    function update_kat($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('username', $data);
    }

    function get_kat($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('username')->row();
    }

    function delete_kat($id, $table)
    {
        $this->db->where('id', $id);
        $this->db->delete($table);
    }


    public function get_all_logs($start_date = null, $end_date = null)
    {
        $this->db->select('log_user.*, tbl_user.full_name');
        $this->db->from('log_user');
        $this->db->join('tbl_user', 'tbl_user.id_user = log_user.id_user', 'left');

        if (!empty($start_date) && !empty($end_date)) {
            $this->db->where('DATE(log_user.cretead_at) >=', $start_date);
            $this->db->where('DATE(log_user.cretead_at) <=', $end_date);
        }

        $this->db->order_by('log_user.cretead_at', 'DESC');
        return $this->db->get()->result();
    }
    public function get_filtered($from = null, $until = null)
    {
        $this->db->from('log_user');
        $this->db->join('tbl_user', 'tbl_user.id_user = log_user.id_user');

        if (!empty($from)) {
            $this->db->where('DATE(cretead_at) >=', $from);
        }

        if (!empty($until)) {
            $this->db->where('DATE(cretead_at) <=', $until);
        }

        $this->db->order_by('cretead_at', 'desc');
        return $this->db->get()->result();
    }
}
