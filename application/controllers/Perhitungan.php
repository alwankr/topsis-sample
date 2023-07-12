<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Perhitungan extends CI_Controller
{
    private $rata = 0;
    private $akar = 0;
    private $si = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->model('perhitungan_model', 'hitung');
        $this->load->helper('MY');
        log_login();
    }


    public function bobotKriteria()
    {
        $data['title'] = 'Bobot Kriteria';
        $data['bokrit'] = $this->hitung->getDataBokrit();
        $data['akar'] = $this->hitung->AkarRataRata();

        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/header');
        $this->load->view('perhitungan/bobotkriteria', $data);
        $this->load->view('templates/footer');
    }
    public function normalisasi()
    {
        $data['title'] = 'Matriks Normalisasi';
        $data['bokrit'] = $this->hitung->getDataBokrit();
        $data['rata'] = $this->hitung->getRataKriteria();
        $data['akar'] = $this->hitung->AkarRataRata();

        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/header');
        $this->load->view('perhitungan/normalisasi', $data);
        $this->load->view('templates/footer');
    }
    public function terbobot()
    {
        $data['title'] = 'Matriks Terbobot';
        $data['bokrit'] = $this->hitung->getDataBokrit();
        $data['rata'] = $this->hitung->getRataKriteria();
        $data['akar'] = $this->hitung->AkarRataRata();
        $data['si'] = $this->hitung->SolusiIdeal();

        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/header');
        $this->load->view('perhitungan/terbobot', $data);
        $this->load->view('templates/footer');
    }
    public function separasi()
    {
        $data['title'] = 'Separasi dan Solusi Ideal';
        $data['bokrit'] = $this->hitung->getDataBokrit();
        $data['si'] = $this->hitung->SolusiIdeal();
        $data['controll'] = $this;
        $data['model_hitung'] = $this->hitung;

        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/header');
        $this->load->view('perhitungan/separasi', $data);
        $this->load->view('templates/footer');
    }
    public function rangking()
    {
        $data['title'] = 'Peringkat Sementara';
        $data['bokrit'] = $this->hitung->sort_top($this->hitung->getDataBokrit());

        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/header');
        $this->load->view('perhitungan/rangking', $data);
        $this->load->view('templates/footer');
    }
}

    /* End of file Perhitungan.php */
