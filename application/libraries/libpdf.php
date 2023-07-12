<?php

require __DIR__ . '/function.php';
class libpdf
{
    public static function readpdf($view_file, $array_var = array(), $nama_document = "document")
    {
        $CI = &get_instance();
        ob_start();
        $CI->load->view($view_file, $array_var);
        $hasil = ob_get_clean();
        header("Content-type:application/pdf");
        header("Content-Disposition:attachment;filename=" . $nama_document . ".pdf");
        $postdata = http_build_query(
            array(
                "hasil_semua" => $hasil
            )
        );

        $opts = array(
            'http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-Type: application/x-www-form-urlencoded',
                'content' => $postdata
            )
        );

        $context  = stream_context_create($opts);

        $result = file_get_contents(base_url() . "helperpdf/createpdf/", false, $context);
        echo $result;
    }
}
