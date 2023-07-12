<?php

require __DIR__ . '/../../vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;

function call_pdf($view_result)
{
    $html2pdf = new Html2Pdf();
    $html2pdf->writeHTML($view_result);
    $html2pdf->output();
}
