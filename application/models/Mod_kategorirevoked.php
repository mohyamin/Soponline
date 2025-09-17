<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Mod_kategorirevoked extends CI_Model
{
    var $table = 'kategori_revoked';
    var $column_search = array('id_kateg', 'nama_revoked');
    var $column_order = array('id_kateg', 'nama_revoked');
    var $order = array('id_kateg' => 'desc');
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
    {

        $this->db->from('kategori_revoked');
        $i = 0;

        foreach ($this->column_search as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_all()
    {
        $this->db->from('kategori_revoked');
        return $this->db->count_all_results();
    }
    function getAll()
    {

        return $this->db->get('kategori_revoked');
    }

    function insert_kat($table, $data)
    {
        $insert = $this->db->insert($table, $data);
        return $insert;
    }

    function update_kat($id, $data)
    {
        $this->db->where('id_kateg', $id);
        $this->db->update('kategori_revoked', $data);

        // Memeriksa apakah ada baris yang terpengaruh oleh update
        if ($this->db->affected_rows() > 0) {
            return true; // Data berhasil diperbarui
        } else {
            return false; // Tidak ada perubahan (data sudah sama)
        }
    }

    function get_kat($id)
    {
        $this->db->where('id_kateg', $id);
        return $this->db->get('kategori_revoked')->row();
    }

    function delete_kat($id, $table)
    {
        $this->db->where('id_kateg', $id);
        $this->db->delete($table);
    }
}
