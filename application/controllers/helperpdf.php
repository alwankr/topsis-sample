<?php

require __DIR__ . '/../../vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;

class Helperpdf extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function createpdf()
    {
        $html2pdf = new Html2Pdf();
        $html2pdf->writeHTML(isset($_POST['hasil_semua']) ? $_POST['hasil_semua'] : "<b>No Result.</b>");
        $html2pdf->output();
    }
}
