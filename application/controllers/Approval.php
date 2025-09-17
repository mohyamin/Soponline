<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Approval extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_approval');
        // Pastikan session sudah jalan
        if (!$this->session->userdata('id_user')) {
            redirect('auth'); // redirect ke login
        }
    }

    public function process()
    {
        $id_file = $this->input->post('id_file');
        $table   = $this->input->post('table');
        $action  = $this->input->post('action'); // approve / reject
        $note    = $this->input->post('note');

        // Validasi nama tabel
        if (!in_array($table, ['compliance'])) {
            echo json_encode(['status' => false, 'message' => 'Tabel tidak valid']);
            return;
        }

        // Ambil data user dari session
        $user_id  = $this->session->userdata('id_user');
        $id_level = $this->session->userdata('id_level');

        // Hanya level 12 (Administrator) yang boleh approve/reject
        if ($id_level != 12) {
            echo json_encode(['status' => false, 'message' => 'Anda tidak memiliki hak akses untuk melakukan approval']);
            return;
        }

        // Jalankan proses update status
        $result = $this->Mod_approval->update_status($table, $id_file, $action, $note, $user_id);

        echo json_encode($result);
    }
}
