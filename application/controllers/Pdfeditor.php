<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pdfeditor extends CI_Controller
{

    public function index()
    {
        $this->load->view('pdfeditor_view');
    }

    public function upload()
    {
        $config['upload_path']   = './uploads/';
        $config['allowed_types'] = 'pdf';
        $config['file_name']     = uniqid();
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('pdf_file')) {
            echo json_encode(['status' => false, 'error' => $this->upload->display_errors()]);
        } else {
            $data = $this->upload->data();
            echo json_encode(['status' => true, 'path' => base_url('uploads/' . $data['file_name'])]);
        }
    }

    public function save()
    {
        $outputDir = './output/';
        if (!is_dir($outputDir)) mkdir($outputDir, 0777, true);

        if (isset($_FILES['pdf_data'])) {
            $filename = uniqid() . '_edited.pdf';
            $path = $outputDir . $filename;
            move_uploaded_file($_FILES['pdf_data']['tmp_name'], $path);
            echo json_encode(['status' => true, 'path' => base_url('output/' . $filename)]);
        } else {
            echo json_encode(['status' => false, 'message' => 'No file received']);
        }
    }
}
