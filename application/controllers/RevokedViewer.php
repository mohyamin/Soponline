<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RevokedViewer extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Mod_revokedviewer'));
    }

    public function index()
    {
        $this->load->helper('url');
        $data['datakategori'] = $this->db->get('kategori_revoked')->result();
        $this->template->load('layoutbackend', 'admin/revokedviewer', $data);
    }

    public function ajax_list()
    {
        ini_set('memory_limit', '512M');
        set_time_limit(3600);

        $list = $this->Mod_revokedviewer->get_datatables();
        $data = array();
        $no = 1;
        foreach ($list as $pel) {
            $row = array();
            $row[] = $no++; // array 0

            if ($this->session->userdata('id_level') == "9") {
                // Role viewer hanya dapat melihat (preview)
                $row[] = '<a target="_blank" href="' . base_url('RevokedViewer/previewPDF/') . $pel->id_file . '" title="' . htmlspecialchars($pel->nama_file, ENT_QUOTES, 'UTF-8') . '"><i class="fas fa-eye"></i></a>';
            } else {
                // Role lainnya (akses untuk download)
                $row[] = '<a target="_blank" href="' . $pel->url_file . '" title="' . htmlspecialchars($pel->nama_file, ENT_QUOTES, 'UTF-8') . '"><i class="fas fa-download"></i></a>';
            }

            // Ambil semua lampiran berdasarkan id_file
            $lampiranList = $this->db->get_where('tbl_revoked_lampiran', ['id_file' => $pel->id_file])->result();

            $lampiranHtml = '';
            foreach ($lampiranList as $lamp) {
                // Buat URL dasar lampiran
                $fileUrl = base_url('uploads/lampiran/' . $lamp->nama_file);
                $previewUrl = base_url('RevokedViewer/previewPDF/' . $lamp->nama_file);

                // Tooltip text = nama file lampiran
                $tooltip = htmlspecialchars($lamp->nama_file, ENT_QUOTES, 'UTF-8');

                // Cek level user dan sesuaikan akses lampiran
                if ($this->session->userdata('id_level') == "9") {
                    // Role viewer hanya bisa melihat (preview) lampiran
                    $lampiranHtml .= '<a target="_blank" href="' . $previewUrl . '" title="' . $tooltip . '"><i class="fas fa-eye"></i></a> ';
                } else if (in_array($this->session->userdata('id_level'), ["10", "12", "1"])) {
                    // Role lain bisa mengunduh lampiran
                    $lampiranHtml .= '<a target="_blank" href="' . $fileUrl . '" title="' . $tooltip . '"><i class="fas fa-download"></i></a> ';
                } else {
                    // Default untuk role lain bisa mengunduh atau melihat
                    $lampiranHtml .= '<a target="_blank" href="' . $previewUrl . '" title="' . $tooltip . '"><i class="fas fa-download"></i></a> ';
                }
            }

            // Tambahkan ke kolom "Lampiran"
            $row[] = $lampiranHtml;

            $row[] = $pel->nama_file;
            $row[] = $pel->nama_revoked;
            $row[] = $pel->status;
            $row[] = $pel->tahun;
            $row[] = $pel->created_at;
            $data[] = $row;
        }


        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Mod_revokedviewer->count_all(),
            "recordsFiltered" => $this->Mod_revokedviewer->count_filtered(),
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
            // $this->Mod_revokedviewer->insert("tbl_compliance", $save);

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
        $this->Mod_revokedviewer->update_kat($id, $save);
        echo json_encode(array("status" => TRUE));
    }

    public function edit_kat($id)
    {
        $data = $this->Mod_revokedviewer->get_kat($id);
        echo json_encode($data);
    }

    public function delete()
    {
        $id = $this->input->post('id');
        $this->Mod_revokedviewer->delete_kat($id, 'kategori');
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
        // Cek apakah input angka (ID) atau string (nama file)
        if (is_numeric($id)) {
            // Ini untuk konten utama
            $data['detail'] = $this->db->get_where('tbl_revoked', ['id_file' => $id])->row();
        } else {
            // Ini untuk lampiran
            // Bangun data manual karena tidak pakai tabel tbl_compliance
            $data['detail'] = (object)[
                'url_file' => base_url('uploads/lampiran/' . $id)
            ];
        }

        $this->load->view('admin/pdfviewer', $data);
    }
}
