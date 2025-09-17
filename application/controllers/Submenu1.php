<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Submenu1 extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(array('mod_compliance'));
    }

    public function index()
    {


        $this->load->helper('url');
        $data['datakategori'] = $this->db->get('kategori')->result();
        $this->template->load('layoutbackend', 'admin/submenu1', $data);
    }

    public function ajax_list()
    {
        ini_set('memory_limit', '512M');
        set_time_limit(3600);
        $list = $this->mod_compliance->get_datatables();
        $data = array();
        $no = 1;
        foreach ($list as $pel) {
            $row = array();
            $row[] = $no++; //array 0

            $row[] = $pel->url_file;
            $row[] = $pel->nama_file;
            $row[] = $pel->nama_kat;
            $row[] = $pel->status;
            $row[] = $pel->created_at;
            $row[] = $pel->id_file;
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->mod_compliance->count_all(),
            "recordsFiltered" => $this->mod_compliance->count_filtered(),
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
            'id_user'      => $this->session->userdata('id_user'),
            'fitur'        => "Menu Complaince",
            'keterangan'   => "Menambahkan Data",
            'cretead_at'   => date('Y-m-d H:i:s'),
            'update_at'    => date('Y-m-d H:i:s')

        );
        $this->db->insert('log_user', $savelog);

        $file = slug($this->input->post('file'));
        $config['upload_path']   = 'uploads';
        $config['allowed_types'] = 'pdf|docx|png'; //mencegah upload backdor
        $config['max_size']      = '50000';
        $config['max_width']     = '1363';
        $config['max_height']    = '2000';
        $config['file_name']     = $this->input->post('nama_file');

        $this->upload->initialize($config);

        if ($this->upload->do_upload('file')) {
            $gambar = $this->upload->data();
            $save  = array(
                'nama_file'         => $this->input->post('nama_file'),
                'id_kat'            => $this->input->post('id_kat'),
                'status'            => $this->input->post('status'),
                'created_at'        => $this->input->post('created_at'),
                'url_file'          => base_url() . 'uploads/' .  $gambar['file_name'],
            );
            // $this->mod_compliance->insert("tbl_compliance", $save);

            $this->db->insert('tbl_compliance', $save);
            echo json_encode(array("status" => TRUE));
        }
    }

    public function update()
    {
        $this->_validate();
        $id = $this->input->post('id_file');
        $file = slug($this->input->post('file'));
        $config['upload_path']   = 'uploads';
        $config['allowed_types'] = 'pdf|docx|pptx'; //mencegah upload backdor
        $config['max_size']      = '50000';
        $config['max_width']     = '1363';
        $config['max_height']    = '2000';
        $config['file_name']     = $this->input->post('nama_file');

        $this->upload->initialize($config);

        if ($this->upload->do_upload('file')) {
            $gambar = $this->upload->data();
            $save  = array(
                'nama_file'         => $this->input->post('nama_file'),
                'id_kat'            => $this->input->post('id_kat'),
                'status'            => $this->input->post('status'),
                'created_at'        => $this->input->post('created_at'),
                'url_file'          => base_url() . 'uploads/' .  $gambar['file_name'],
            );
            $gambar = $this->mod_compliance->getImage($id)->row_array();
            if ($gambar != null) {
                //hapus gambar yg ada diserver  
                unlink('uploads/' . $gambar['url_file']);
            }

            $this->db->update($id, $save);
            echo json_encode(array("status" => TRUE));
        }
    }

    public function editcompliance($id)
    {
        $data = $this->mod_compliance->get_kat($id, 'tbl_compliance');
        echo json_encode($data);
    }

    public function delete()
    {
        $id = $this->input->post('id_file');
        $data = $this->mod_compliance->delete_kat($id, 'tbl_compliance');
        $savelog = array(
            'id_user'      => $this->session->userdata('id_user'),
            'fitur'        => "Menu Compliance",
            'keterangan'   => "Menghapus Data",
            'cretead_at'   => date('Y-m-d H:i:s'),
            'update_at'    => date('Y-m-d H:i:s')

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

        if ($this->input->post('nama_file') == '') {
            $data['inputerror'][] = 'nama_file';
            $data['error_string'][] = 'Nama file Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if ($this->input->post('id_kat') == '') {
            $data['inputerror'][] = 'id_kat';
            $data['error_string'][] = 'Nama kategori Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
        if ($this->input->post('status') == '') {
            $data['inputerror'][] = 'status';
            $data['error_string'][] = 'Pilih Status Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }


        if ($this->input->post('created_at') == '') {
            $data['inputerror'][] = 'created_at';
            $data['error_string'][] = 'Pilih Tanggal Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }



        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }
}
