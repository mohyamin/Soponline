<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Emailtest extends CI_Controller
{

    public function index()
    {
        // config SMTP
        $config = array(
            'protocol'    => 'smtp',
            'smtp_host'   => 'smtp.office365.com',   // pakai host utama Office 365
            'smtp_port'   => 587,
            'smtp_user'   => 'moh.yamin@boiindonesia.co.id', // ganti sesuai email
            'smtp_pass'   => 'adminmintaakses$',            // ganti app password kalau MFA
            'smtp_crypto' => 'tls',
            'mailtype'    => 'html',
            'charset'     => 'utf-8',
            'newline'     => "\r\n",
            'crlf'        => "\r\n",
            'smtp_timeout' => 30,
            'smtp_keepalive' => TRUE,
            'wordwrap'    => TRUE,
            'smtp_options' => array(
                'ssl' => array(
                    'verify_peer'       => false,
                    'verify_peer_name'  => false,
                    'allow_self_signed' => true
                )
            )
        );

        $this->load->library('email', $config);

        // pengirim & penerima
        $this->email->from('moh.yamin@boiindonesia.co.id', 'Compliance System');
        $this->email->to('moh.yamin@boiindonesia.co.id');

        // subject & pesan
        $this->email->subject('Test Email dari SOPONLINE DEV');
        $this->email->message('<p>Hello! Ini test email dengan debug verbose.</p>');

        // kirim
        if ($this->email->send()) {
            echo "✅ Email berhasil dikirim.";
        } else {
            echo "❌ Email gagal dikirim.<br><br>";
            // tampilkan debug lengkap (header + body komunikasi SMTP)
            echo nl2br(htmlspecialchars($this->email->print_debugger(array('headers', 'subject', 'body'))));
        }
    }
}
