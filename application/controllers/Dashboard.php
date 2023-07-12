<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Dashboard';

        $this->load->view('templates/sidebar');
        $this->load->view('templates/header');
        $this->load->view('dashboard/index');
        $this->load->view('templates/footer');
    }
}

/* End of file Dashboard.php */
