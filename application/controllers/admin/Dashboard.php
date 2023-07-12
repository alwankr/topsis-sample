<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('MY');
        log_login();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';

        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/header');
        $this->load->view("dashboard/admin");
        $this->load->view('templates/footer');
    }
}
