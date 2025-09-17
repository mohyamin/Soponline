<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_user');
        $this->load->library('upload');
    }

    public function index()
    {
        $id = $this->session->userdata('id_user');
        $data['user'] = $this->Mod_user->getUser($id); // Hasilnya object
        $this->template->load('layoutbackend', 'profile/profile_form', $data);
    }

    public function update()
    {
        $id = $this->session->userdata('id_user');
        $data = [
            'full_name' => $this->input->post('full_name', true)
        ];

        // Jika password diisi, update juga
        if ($this->input->post('password')) {
            $data['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
        }

        // Proses upload foto (jika ada file baru)
        if (!empty($_FILES['image']['name'])) {
            $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

            $config['upload_path']   = './assets/foto/user/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size']      = 5120; // 5MB
            $config['overwrite']     = TRUE;
            $config['file_name']     = 'user_' . $id . '_' . time() . '.' . $ext;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('image')) {
                $uploadData = $this->upload->data();
                $data['image'] = $uploadData['file_name'];

                // hapus foto lama kalau ada
                $oldImage = $this->session->userdata('image');
                if ($oldImage && file_exists('./assets/foto/user/' . $oldImage)) {
                    unlink('./assets/foto/user/' . $oldImage);
                }
            }
        }

        // Update data user
        $this->Mod_user->updateUser($id, $data);

        // Update session agar langsung berubah di UI
        $user = $this->Mod_user->getUser($id);
        $this->session->set_userdata([
            'full_name' => $user->full_name,
            'username'  => $user->username,
            'image'     => $user->image
        ]);

        $this->session->set_flashdata('success', 'Profil berhasil diperbarui.');
        redirect('profile');
    }
}
