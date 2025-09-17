<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Viewer_hc extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Mod_viewer_hc'));
    }

    public function index()
    {
        $this->load->helper('url');
        $data['datakategori'] = $this->db->get('kategori_hc')->result();
        $this->template->load('layoutbackend', 'admin/viewer_hc', $data);
    }

    public function ajax_list()
    {
        ini_set('memory_limit', '512M');
        set_time_limit(3600);

        $list = $this->Mod_viewer_hc->get_datatables();
        $data = array();
        $no = 1;
        foreach ($list as $pel) {

            $row = array();
            $row[] = $no++; //array 0
            if ($this->session->userdata('id_level') == "9") {
                $row[] = '<a target="_blank" href="' . base_url('viewer_hc/previewPDF/') . $pel->id_file . '"><i class="fas fa-eye"></i></a>';
            } else if ($this->session->userdata('id_level') == "10") {

                $row[] = '<a target="_blank" href="' . $pel->url_file . '"><i class="fas fa-download"></i></a>';
            } else if ($this->session->userdata('id_level') == "12") {

                $row[] = '<a target="_blank" href="' . $pel->url_file . '"><i class="fas fa-download"></i></a>';
            } else {
                $row[] = '<a target="_blank" href="' . base_url('viewer_hc/previewPDF/')  . $pel->id_file . '"><i class="fas fa-download"></i></a>';
            }
            $row[] = $pel->nama_file;
            $row[] = $pel->nama_kathc;
            $row[] = $pel->status;
            $row[] = $pel->created_at;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Mod_viewer_hc->count_all(),
            "recordsFiltered" => $this->Mod_viewer_hc->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function insert()
    {
        $this->_validate();
        $kode = date('ymsi');

        $file = slug($this->input->post('file'));
        $config['upload_path']   = 'uploads';
        $config['allowed_types'] = 'pdf'; //mencegah upload backdor
        $config['max_size']      = '2000';
        $config['max_width']     = '1363';
        $config['max_height']    = '2000';
        $config['file_name']     = $this->input->post('nama_file');

        $this->upload->initialize($config);

        if ($this->upload->do_upload('file')) {
            $gambar = $this->upload->data();
            $save  = array(
                'nama_file'            => $this->input->post('nama_file'),
                'id_kat'            => $this->input->post('id_kat'),
                'status'            => $this->input->post('status'),
                'url_file'      => base_url() . 'uploads/' .  $gambar['file_name'],
            );
            // $this->Mod_viewer->insert("tbl_compliance", $save);

            $this->db->insert('tbl_compliance', $save);
            echo json_encode(array("status" => TRUE));
        }
    }

    public function update()
    {
        $this->_validate();
        $id      = $this->input->post('id');
        $save  = array(
            'nama_kat' => $this->input->post('nama_kat')
        );
        $this->Mod_viewer->update_kat($id, $save);
        echo json_encode(array("status" => TRUE));
    }

    public function edit_kat($id)
    {
        $data = $this->Mod_viewer->get_kat($id);
        echo json_encode($data);
    }

    public function delete()
    {
        $id = $this->input->post('id');
        $this->Mod_viewer->delete_kat($id, 'kategori');
        echo json_encode(array("status" => TRUE));
    }
    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        // if ($this->input->post('nama_kat') == '') {
        //     $data['inputerror'][] = 'nama_kat';
        //     $data['error_string'][] = 'Nama Barang Tidak Boleh Kosong';
        //     $data['status'] = FALSE;
        // }

        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }

    public function previewPDF($id)
    {
        $data['detail'] = $this->db->get_where('tbl_hc', array('id_file' => $id))->row();
        $this->load->view('admin/pdfviewer', $data);
    }
}
