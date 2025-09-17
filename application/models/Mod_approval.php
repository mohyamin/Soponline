<?php
class Mod_approval extends CI_Model
{

    public function update_status($table, $id, $action, $note, $user_id)
    {
        $table_map = [
            'compliance' => 'tbl_compliance'
        ];

        $table_name = $table_map[$table];

        $data = [
            'approval_status' => $action == 'approve' ? 'approved' : 'rejected',
            'approved_by' => $user_id,
            'approved_at' => date('Y-m-d H:i:s'),
            'approval_note' => $note
        ];

        $this->db->where('id_file', $id);
        $updated = $this->db->update($table_name, $data);

        return $updated ?
            ['status' => true, 'message' => ucfirst($action) . ' berhasil'] :
            ['status' => false, 'message' => 'Gagal update status'];
    }
}
