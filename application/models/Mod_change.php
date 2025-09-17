
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_change extends CI_Model
{

    public function update_password($user_id, $new_password)
    {
        // Query untuk memperbarui password baru ke database
        $data = array(
            'password' => get_hash($new_password) // Sesuaikan dengan metode hash dan enkripsi yang Anda gunakan
        );

        $this->db->where('id_user', $user_id);
        $this->db->update('tbl_user', $data);

        return $this->db->affected_rows() > 0;
    }
}
?>