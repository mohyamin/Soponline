<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_internal extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(array('mod_kategoriInternal'));
    }

    public function index()
    {
        $this->load->helper('url');

        $this->template->load('layoutbackend', 'kategori_internal');
    }

    public function ajax_list()
    {
        ini_set('memory_limit', '512M');
        set_time_limit(3600);
        $list = $this->mod_kategoriInternal->get_datatables();
        $data = array();
        $no = 1;
        foreach ($list as $pel) {

            $row = array();
            $row[] = $no++; //array 0
            $row[] = $pel->nama_internal; //array 1
            $row[] = $pel->id_kategori; //array 2
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->mod_kategoriInternal->count_all(),
            "recordsFiltered" => $this->mod_kategoriInternal->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function insert()
    {
        $this->_validate();
        $kode = date('ymsi');

        $savelog = array(
            'id_user'   => $this->session->userdata('id_user'),
            'fitur'   => "Kategori",
            'keterangan'  => "Menambahkan Data di menu RMC",
            'cretead_at'  => date('Y-m-d H:i:s'),
            'update_at'  => date('Y-m-d H:i:s')

        );
        $save  = array(
            'nama_internal'            => $this->input->post('nama_internal')
        );
        $this->mod_kategoriInternal->insert_kat("kategori_internal", $save);
        $this->db->insert('log_user', $savelog);
        echo json_encode(array("status" => TRUE));
    }

    public function update()
    {
        $this->_validate();

        $savelog = array(
            'id_user'   => $this->session->userdata('id_user'),
            'fitur'   => "Kategori",
            'keterangan'  => "Merubah Data Kategori",
            'cretead_at'  => date('Y-m-d H:i:s'),
            'update_at'  => date('Y-m-d H:i:s')

        );
        $id      = $this->input->post('id');
        $save  = array(
            'nama_internal' => $this->input->post('nama_internal')
        );
        $this->mod_kategoriInternal->update_kat($id, $save);
        $this->db->insert('log_user', $savelog);
        echo json_encode(array("status" => TRUE));
    }

    public function edit_kat($id)
    {
        $data = $this->mod_kategoriInternal->get_kat($id);
        echo json_encode($data);
    }

    public function delete()
    {
        $id = $this->input->post('id_kategori');
        $data = $this->mod_kategoriInternal->delete_kat($id, 'kategori_internal');
        $savelog = array(
            'id_user'   => $this->session->userdata('id_user'),
            'fitur'   => "Kategori",
            'keterangan'  => "Menghapus Data Kategori",
            'cretead_at'  => date('Y-m-d H:i:s'),
            'update_at'  => date('Y-m-d H:i:s')

        );
        $this->db->insert('log_user', $savelog);
        $data['status'] = TRUE;
        echo json_encode($data);
    }
    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->input->post('nama_internal') == '') {
            $data['inputerror'][] = 'nama_internal';
            $data['error_string'][] = 'Name Category is Required';
            $data['status'] = FALSE;
        }

        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }
}
