<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Internal extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(array('mod_internal'));
        $this->load->library('upload'); // tambahkan ini
    }

    public function index()
    {
        $this->load->helper('url');
        $data['datakategori'] = $this->db->get('kategori_internal')->result();
        $this->template->load('layoutbackend', 'admin/internal', $data);
    }

    public function ajax_list()
    {
        ini_set('memory_limit', '512M');
        set_time_limit(3600);
        $list = $this->mod_internal->get_datatables();
        $data = array();
        $no = 1;
        foreach ($list as $pel) {
            $row = array();
            $row[] = $no++; //array 0
            $row[] = $pel->url_file;
            $row[] = $pel->nama_file;
            $row[] = $pel->nama_internal;
            $row[] = $pel->status;
            $row[] = $pel->tahun;
            $row[] = $pel->created_at;

            $lampiran_list = !empty($pel->lampiran) ? json_decode($pel->lampiran) : [];

            $lampiran_html = '';
            if (!empty($pel->lampiran)) {
                $lampiran_list = json_decode($pel->lampiran);
                if (is_array($lampiran_list)) {
                    foreach ($lampiran_list as $item) {
                        $url = base_url($item->file_url);
                        $lampiran_html .= '<a href="' . $url . '" target="_blank" title="' . $item->nama_file . '">
                            <i class="fa fa-fa-pdf text-danger fa-lg"></i>
                          </a> ';
                    }
                }
            }
            $row[] = $pel->lampiran;
            $row[] = $pel->id_file;
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->mod_internal->count_all(),
            "recordsFiltered" => $this->mod_internal->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function insert()
    {
        // Validasi input
        $this->_validate();

        // Log aktivitas user
        $this->_log_user_activity("Menambahkan Data");

        // Proses upload file utama
        $file = $this->_upload_file('file', 'uploads', 'pdf|docx|png|txt|jpg|jpeg', 50000, '1363', '2000');

        if ($file) {
            $save = array(
                'nama_file'  => $this->input->post('nama_file'),
                'id_kategori'     => $this->input->post('id_kategori'),
                'status'     => $this->input->post('status'),
                'tahun'      => $this->input->post('tahun'),
                'created_at' => $this->input->post('created_at'),
                'url_file'   => base_url() . 'uploads/' . $file['file_name'],
            );

            // Simpan data compliance
            $this->db->insert('tbl_internal', $save);
            $id_file = $this->db->insert_id(); // Ambil ID compliance terakhir

            // Proses upload lampiran multiple
            $this->_upload_lampiran($id_file);
            echo json_encode(array("status" => TRUE));
        } else {
            echo json_encode(array("status" => FALSE, "message" => "File upload failed"));
        }
    }

    // Fungsi untuk log aktivitas user
    private function _log_user_activity($action)
    {
        $savelog = array(
            'id_user'    => $this->session->userdata('id_user'),
            'fitur'      => "Menu Internal",
            'keterangan' => $action,
            'cretead_at'  => date('Y-m-d H:i:s'),
            'update_at'  => date('Y-m-d H:i:s')
        );
        $this->db->insert('log_user', $savelog);
    }

    // Fungsi untuk upload file utama
    private function _upload_file($input_name, $upload_path, $allowed_types, $max_size, $max_width, $max_height)
    {
        $config['upload_path']   = FCPATH . $upload_path;
        $config['allowed_types'] = $allowed_types;
        $config['max_size']      = $max_size;
        $config['max_width']     = $max_width;
        $config['max_height']    = $max_height;
        $config['file_name']     = url_title($this->input->post('nama_file'), '_', TRUE);

        $this->upload->initialize($config);
        if ($this->upload->do_upload($input_name)) {
            return $this->upload->data();
        } else {
            log_message('error', 'Upload Error: ' . $this->upload->display_errors());
            return false;
        }
    }


    // Fungsi untuk upload lampiran
    private function _upload_lampiran($id_file)
    {
        if (!empty($_FILES['lampiran']['name'][0])) {
            $lampiranCount = count($_FILES['lampiran']['name']);
            for ($i = 0; $i < $lampiranCount; $i++) {
                $_FILES['file_lampiran']['name']     = $_FILES['lampiran']['name'][$i];
                $_FILES['file_lampiran']['type']     = $_FILES['lampiran']['type'][$i];
                $_FILES['file_lampiran']['tmp_name'] = $_FILES['lampiran']['tmp_name'][$i];
                $_FILES['file_lampiran']['error']    = $_FILES['lampiran']['error'][$i];
                $_FILES['file_lampiran']['size']     = $_FILES['lampiran']['size'][$i];

                $fileName = time() . '_' . $_FILES['file_lampiran']['name'];
                $relativePath = 'uploads/lampiran/' . $fileName;

                $config['upload_path']   = 'uploads/lampiran';
                $config['allowed_types'] = 'pdf|docx|png|jpg|zip|doc';
                $config['max_size']      = '50000'; // in KB
                $config['file_name']     = $fileName;

                $this->upload->initialize($config);

                if ($this->upload->do_upload('file_lampiran')) {
                    // Cek apakah file ini sudah ada di database (hindari duplikat)
                    $existing = $this->db->get_where('tbl_internal_lampiran', [
                        'id_file' => $id_file,
                        'file_url' => $relativePath
                    ])->num_rows();

                    if ($existing == 0) {
                        $data = $this->upload->data();

                        $lampiran = array(
                            'id_file'    => $id_file,
                            'nama_file'  => $data['orig_name'],
                            'file_url'   => $relativePath, // hanya relative path
                            'created_at' => date('Y-m-d H:i:s')
                        );

                        $this->db->insert('tbl_internal_lampiran', $lampiran);
                    }
                }
            }
        }
    }


    public function update()
    {
        // Validasi input
        $this->_validate();

        $id = $this->input->post('id_file');

        // Log aktivitas
        $this->_log_user_activity("Mengubah Data");

        // Coba upload file baru, jika ada
        $file = $this->_upload_file('file', 'uploads', 'pdf|docx|png', 50000, '1363', '2000');

        // Ambil data lama
        $oldData = $this->mod_internal->getImage($id)->row_array();

        // Siapkan data untuk update
        $updateData = array(
            'nama_file'  => $this->input->post('nama_file'),
            'id_kategori'     => $this->input->post('id_kategori'),
            'status'     => $this->input->post('status'),
            'tahun'      => $this->input->post('tahun'),
            'created_at' => $this->input->post('created_at'),
        );

        // Jika ada file baru, update file dan hapus file lama
        if ($file) {
            // Hapus file lama dari server
            if (!empty($oldData['url_file'])) {
                $oldFilePath = str_replace(base_url(), '', $oldData['url_file']);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }

            // Tambahkan url_file baru ke data update
            $updateData['url_file'] = base_url() . 'uploads/' . $file['file_name'];
        }

        // Update ke database
        $this->db->where('id_file', $id);
        $this->db->update('tbl_internal', $updateData);

        // Proses upload lampiran baru (jika ada)
        $this->_upload_lampiran($id);

        echo json_encode(array("status" => TRUE));
    }

    public function editcompliance($id)
    {
        $data = $this->mod_internal->getComplianceWithLampiran($id);
        echo json_encode($data);
    }

    public function delete()
    {
        $id = $this->input->post('id_file');
        $data = $this->mod_internal->delete_kat($id, 'tbl_internal');
        $savelog = array(
            'id_user'      => $this->session->userdata('id_user'),
            'fitur'        => "Menu Internal",
            'keterangan'   => "Menghapus Data",
            'cretead_at'   => date('Y-m-d H:i:s'),
            'update_at'    => date('Y-m-d H:i:s')

        );
        $this->db->insert('log_user', $savelog);
        $data['status'] = TRUE;
        echo json_encode($data);
    }

    public function view_compliance($id_file)
    {
        $compliance = $this->mod_internal->get_compliance_by_id($id_file); // Ambil data compliance

        $lampiran_paths = json_decode($compliance['lampiran']); // Mengurai JSON menjadi array jika menggunakan format JSON
        if (is_array($lampiran_paths)) {
            // Menampilkan semua lampiran yang ada
            foreach ($lampiran_paths as $path) {
                echo '<a href="' . base_url($path) . '" target="_blank">Download Lampiran</a><br>';
            }
        } else {
            echo 'Tidak ada lampiran';
        }
    }


    public function deleteLampiran($id_lampiran)
    {
        // Cari lampiran di DB
        $lampiran = $this->db->get_where('tbl_internal_lampiran', ['id_lampiran_in' => $id_lampiran])->row();

        if ($lampiran) {
            // Hapus file fisik
            $filePath = FCPATH . $lampiran->file_url;
            if (file_exists($filePath)) {
                unlink($filePath);
            }

            // Hapus dari DB
            $this->db->where('id_lampiran_in', $id_lampiran);
            $this->db->delete('tbl_internal_lampiran');

            // Catat log user
            $savelog = [
                'id_user'    => $this->session->userdata('id_user'),
                'fitur'      => "Menu Internal - Lampiran",
                'keterangan' => "Menghapus Lampiran (" . $lampiran->nama_file . ")",
                'cretead_at' => date('Y-m-d H:i:s'),
                'update_at'  => date('Y-m-d H:i:s')
            ];
            $this->db->insert('log_user', $savelog);

            echo json_encode([
                "status" => TRUE,
                "file_url" => $lampiran->file_url
            ]);
        } else {
            echo json_encode([
                "status" => FALSE,
                "message" => "Lampiran tidak ditemukan"
            ]);
        }
    }

    public function deleteLampiranItem($id_lampiran)
    {
        // Ambil data lampiran
        $lampiran = $this->db->get_where('tbl_internal_lampiran', [
            'id_lampiran_in' => $id_lampiran
        ])->row();

        if ($lampiran) {
            // Hapus file fisik kalau ada
            $file_path = FCPATH . 'uploads/lampiran/' . $lampiran->file_url;
            if (file_exists($file_path)) {
                unlink($file_path);
            }

            // Hapus record dari database
            $this->db->delete('tbl_internal_lampiran', ['id_lampiran_in' => $id_lampiran]);

            echo json_encode([
                "status" => true,
                "message" => "Lampiran berhasil dihapus"
            ]);
        } else {
            echo json_encode([
                "status" => false,
                "message" => "Lampiran tidak ditemukan"
            ]);
        }
    }


    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->input->post('nama_file') == '') {
            $data['inputerror'][] = 'nama_file';
            $data['error_string'][] = 'Name File is Required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('id_kategori') == '') {
            $data['inputerror'][] = 'id_kategori';
            $data['error_string'][] = 'Name Category is Required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('status') == '') {
            $data['inputerror'][] = 'status';
            $data['error_string'][] = 'Choose Status is Required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('tahun') == '') {
            $data['inputerror'][] = 'tahun';
            $data['error_string'][] = 'Years is Required';
            $data['status'] = FALSE;
        }


        if ($this->input->post('created_at') == '') {
            $data['inputerror'][] = 'created_at';
            $data['error_string'][] = 'Choose Date and time is Required';
            $data['status'] = FALSE;
        }



        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }
}
