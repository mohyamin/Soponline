<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Portal extends MY_Controller
{

    public function index()
    {
        $this->load->helper('url');
        $this->view->load('admin/portal');
    }
}
