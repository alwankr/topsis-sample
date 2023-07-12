<?php
function convertKpi($data)
{
    if ($data <= 20) {
        $nilai = 1;
    } else if ($data <= 40) {
        $nilai = 2;
    } else if ($data <= 60) {
        $nilai = 3;
    } else if ($data <= 80) {
        $nilai = 4;
    } else if ($data <= 100) {
        $nilai = 5;
    } else {
        $nilai = 5;
    }
    return $nilai;
}

function convertRejak($data)
{
    if ($data <= 2) {
        $nilai = 5;
    } else if ($data <= 4) {
        $nilai = 4;
    } else if ($data <= 6) {
        $nilai = 3;
    } else if ($data <= 8) {
        $nilai = 2;
    } else if ($data <= 10) {
        $nilai = 1;
    } else {
        $nilai = 1;
    }
    return $nilai;
}
function convertPenghargaan($data)
{
    if ($data <= 3) {
        $nilai = 1;
    } else if ($data <= 6) {
        $nilai = 2;
    } else if ($data <= 9) {
        $nilai = 3;
    } else if ($data <= 12) {
        $nilai = 4;
    } else if ($data <= 15) {
        $nilai = 5;
    } else {
        $nilai = 5;
    }
    return $nilai;
}
function convertAssestment($data)
{
    if ($data <= 20) {
        $nilai = 1;
    } else if ($data <= 40) {
        $nilai = 2;
    } else if ($data <= 60) {
        $nilai = 3;
    } else if ($data <= 80) {
        $nilai = 4;
    } else if ($data <= 100) {
        $nilai = 5;
    } else {
        $nilai = 5;
    }
    return $nilai;
}
function convertFeedback($data)
{
    if ($data <= 4) {
        $nilai = 1;
    } else if ($data <= 8) {
        $nilai = 2;
    } else if ($data <= 12) {
        $nilai = 3;
    } else if ($data <= 16) {
        $nilai = 4;
    } else if ($data <= 20) {
        $nilai = 5;
    } else {
        $nilai = 5;
    }
    return $nilai;
}
function convertLeab($data)
{
    if ($data <= 2) {
        $nilai = 1;
    } else if ($data <= 4) {
        $nilai = 2;
    } else if ($data <= 6) {
        $nilai = 3;
    } else if ($data <= 8) {
        $nilai = 4;
    } else if ($data <= 10) {
        $nilai = 5;
    } else {
        $nilai = 5;
    }
    return $nilai;
}
function log_login()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email') && !$ci->session->userdata('role_id')) {
        // $ci->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Silahkan login terlebih dahulu</div>');
        redirect('login');
    } else {
        $roleId = $ci->session->userdata('role_id');
        $url = $ci->uri->segment(1);
        if ($url == 'pegawai' && !$roleId == 0) {
            redirect('direktur/dashboard');
        } else if ($url == 'perhitungan' && !$roleId == 0) {
            redirect('direktur/dashboard');
        } else if ($url == 'admin/dashboard' && !$roleId == 0) {
            redirect('direktur/dashboard');
        } else if ($url == 'karyawanpilihan' && !$roleId == 1) {
            redirect('admin/dashboard');
        }
    }
}
