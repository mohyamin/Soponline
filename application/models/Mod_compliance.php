<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_compliance extends CI_Model
{
    var $table = 'v_tbl_compliance'; // Menggunakan View sebagai tabel
    var $column_search = array('id_file', 'nama_file', 'tahun', 'created_at', 'nama_kat');
    var $column_order = array('id_file', 'nama_file', 'tahun', 'created_at', 'nama_kat');
    var $order = array('id_file' => 'desc');

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Query dasar untuk DataTables
    private function _get_datatables_query()
    {
        $this->db->from($this->table); // Menggunakan View
        $i = 0;

        foreach ($this->column_search as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) {
                    $this->db->group_end();
                }
            }
            $i++;
        }

        if (isset($_POST['order'])) {
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
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // Fungsi untuk insert data ke dalam tabel compliance
    public function insert_compliance($data, $lampiran_files)
    {
        // Simpan data utama
        $this->db->insert('tbl_compliance', $data);
        $id_file = $this->db->insert_id(); // Ambil ID dari data yang baru disimpan

        // Menyimpan lampiran
        $lampiran_paths = [];
        foreach ($lampiran_files as $file) {
            // Pastikan file disimpan di folder tertentu, misalnya 'uploads/'
            $file_path = 'uploads/' . $file['file_name'];  // sesuaikan sesuai dengan nama file
            $lampiran_paths[] = $file_path; // Tambahkan path file ke dalam array
        }

        // Gabungkan semua lampiran dalam format JSON atau koma
        $lampiran_json = json_encode($lampiran_paths);

        // Simpan data lampiran di tabel lampiran, misalnya
        foreach ($lampiran_paths as $path) {
            $this->db->insert('tbl_compliance_lampiran', [
                'id_file' => $id_file,
                'file_url' => $path,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }


    // Fungsi untuk insert lampiran
    public function insert_lampiran($data)
    {
        $this->db->insert('tbl_compliance_lampiran', $data); // Menggunakan tabel lampiran
    }

    // Fungsi update data compliance
    public function update_compliance($id, $data)
    {
        $this->db->where('id_file', $id);
        $this->db->update('tbl_compliance', $data);
        return $this->db->affected_rows(); // Mengembalikan jumlah baris yang terpengaruh
    }

    // Fungsi untuk mengambil kategori berdasarkan ID
    function get_kat($id)
    {
        $this->db->where('id_file', $id);
        return $this->db->get('tbl_compliance')->row(); // Mengambil data dari tabel asli
    }

    // Fungsi untuk menghapus data compliance
    function delete_kat($id)
    {
        $this->db->where('id_file', $id);
        $this->db->delete('tbl_compliance');
    }
    // Fungsi untuk mendapatkan URL file berdasarkan ID
    function getImage($id)
    {
        $this->db->select('url_file');
        $this->db->from('tbl_compliance');
        $this->db->where('id_file', $id);
        return $this->db->get();
    }
    public function getLampiran($id_file)
    {
        return $this->db->get_where('tbl_compliance_lampiran', ['id_file' => $id_file]);
    }

    public function getComplianceWithLampiran($id)
    {
        $compliance = $this->db->get_where('tbl_compliance', ['id_file' => $id])->row_array();
        $lampiran = $this->db->get_where('tbl_compliance_lampiran', ['id_file' => $id])->result_array();

        $compliance['lampiran'] = $lampiran;
        return $compliance;
    }
}
