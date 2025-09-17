<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Change extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Load necessary models, libraries, helpers, etc.
        $this->load->model('Mod_change');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->helper('url');

        $this->template->load('layoutbackend', 'admin/password');
    }

    public function change_password()
    {

        $this->form_validation->set_rules('password', 'New Password', 'trim|required');
        $this->form_validation->set_rules('password', 'Confirm New Password');

        if ($this->form_validation->run() == FALSE) {
            // Form validation errors, load the view again with errors
            $this->load->view('password');
        } else {
            // Validasi sukses, dapatkan data dari form

            $new_password = $this->input->post('password');

            // Cek password lama pengguna
            $user_id = $this->session->userdata('id_user'); // Ganti dengan cara yang sesuai untuk mendapatkan ID pengguna dari sesi atau pengiriman form
            // Password lama cocok, update password baru
            if ($this->Mod_change->update_password($user_id, $new_password)) {
                echo ' <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
                <a href="http://128.10.69.75/appdev/dashboard" class="btn btn-primary">Update Password Success, Go to Dashboard, Klik disini..!!</a>';
            } else {
                echo "Failed to update password.";
            }
        }
    }
}
