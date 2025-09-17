<?php

use Dompdf\Dompdf;
use Dompdf\Options;

defined('BASEPATH') or exit('No direct script access allowed');

class Dompdf_gen
{
    protected $dompdf;

    public function __construct()
    {
        // Composer's autoloader
        require_once FCPATH . 'vendor/autoload.php';

        // Initialize Dompdf with default options
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $this->dompdf = new Dompdf($options);
    }

    public function loadHtml($html)
    {
        $this->dompdf->loadHtml($html);
    }

    public function setPaper($size, $orientation)
    {
        $this->dompdf->setPaper($size, $orientation);
    }

    public function render()
    {
        $this->dompdf->render();
    }

    public function stream($filename = "document.pdf", $options = array())
    {
        $this->dompdf->stream($filename, $options);
    }
}
