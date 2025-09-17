<?php
defined('BASEPATH') or exit('No direct script access allowed');

$config['protocol']    = 'smtp';
$config['smtp_host']   = 'smtp.office365.com';
$config['smtp_port']   = 587;
$config['smtp_user']   = 'moh.yamin@boiindonesia.co.id';   // email outlook/office 365
$config['smtp_pass']   = 'adminmintaakses$';   // app password jika MFA aktif
$config['smtp_crypto'] = 'tls';
$config['mailtype']    = 'html';
$config['charset']     = 'utf-8';
$config['newline']     = "\r\n";
$config['crlf']        = "\r\n";
$config['wordwrap']    = TRUE;
