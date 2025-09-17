<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once 'vendor/autoload.php';

class Dashboard extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model(array('mod_log'));
        $this->load->model('Mod_dashboard'); // BUKAN 'mod_dashboard'

    }

    public function index()
    {
        $this->load->helper('url');

        $data['kategori_data'] = $this->Mod_dashboard->get_compliance_per_kategori();
        $data['tahun_data']    = $this->Mod_dashboard->get_compliance_per_tahun();
        $data['kategori_data_internal'] = $this->Mod_dashboard->get_compliance_per_kategori_internal();
        $data['role_data'] = $this->Mod_dashboard->get_user_per_role();

        $this->template->load('layoutbackend', 'admin/log', $data);
    }


    public function ajax_list()
    {
        $from = $this->input->post('from');
        $until = $this->input->post('until');

        $list = $this->mod_log->get_datatables($from, $until);
        $data = array();
        $no = $_POST['start'] + 1;

        foreach ($list as $pel) {
            $row = array();
            $row[] = $no++;
            $row[] = $pel->full_name;
            $row[] = $pel->fitur;
            $row[] = $pel->keterangan;
            $row[] = $pel->cretead_at;
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->mod_log->count_all($from, $until),
            "recordsFiltered" => $this->mod_log->count_filtered($from, $until),
            "data" => $data,
        );

        echo json_encode($output);
    }
    public function data_grafik_dokumen()
    {
        $query = $this->db->query("
        SELECT tahun, 'BOII-REGULASI' AS sumber_menu, COUNT(id_file) AS total_dokumen
        FROM tbl_compliance
        GROUP BY tahun

        UNION ALL

        SELECT tahun, 'BOII-INTERNAL' AS sumber_menu, COUNT(id_file) AS total_dokumen
        FROM tbl_internal
        GROUP BY tahun

        UNION ALL

        SELECT tahun, 'BOII-REVOKED' AS sumber_menu, COUNT(id_file) AS total_dokumen
        FROM tbl_revoked
        GROUP BY tahun
    ");

        echo json_encode($query->result());
    }


    public function chart_data()
    {
        $tahun = $this->input->get('tahun');
        $kategori = $this->input->get('kategori');

        $this->db->select('YEAR(created_at) as tahun, COUNT(*) as total');
        $this->db->from('tbl_compliance');

        if (!empty($tahun)) {
            $this->db->where('YEAR(created_at)', $tahun);
        }

        if (!empty($kategori)) {
            $this->db->where('id_kat', $kategori);
        }

        $this->db->group_by('YEAR(created_at)');
        $this->db->order_by('tahun', 'ASC');

        $result = $this->db->get()->result();
        echo json_encode($result);
    }

    public function chart_kategori()
    {
        $tahun = $this->input->get('tahun');
        $kategori = $this->input->get('kategori');

        $this->db->select('k.nama_kat, COUNT(c.id_file) as total');
        $this->db->from('tbl_compliance c');
        $this->db->join('kategori k', 'k.id_kat = c.id_kat');

        if (!empty($tahun)) {
            $this->db->where('YEAR(c.created_at)', $tahun);
        }

        if (!empty($kategori)) {
            $this->db->where('c.id_kat', $kategori);
        }

        $this->db->group_by('k.nama_kat');
        $this->db->order_by('k.nama_kat', 'ASC');

        $result = $this->db->get()->result();

        echo json_encode($result);
    }
    public function pdf()
    {
        $this->load->library('Pdf');
        $this->load->model('Mod_log');

        $from = $this->input->get('from');
        $until = $this->input->get('until');

        $data['logs'] = $this->mod_log->get_filtered($from, $until); // ✅ ambil berdasarkan tanggal


        $html = $this->load->view('admin/pdf_log', $data, true);

        $pdf = new Pdf();
        $pdf->loadHtml($html);
        $pdf->setPaper('A4', 'landscape');
        $pdf->render();
        $pdf->stream("log_user.pdf", array("Attachment" => false));
    }
}
