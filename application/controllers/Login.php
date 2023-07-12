<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
        $data = $this->db->get_where('loginlah', ['email' => $this->input->post('email')])->row_array();

        if ($this->form_validation->run() == false) {
            $get_pesan = $this->get_pesan();
            $this->load->view('auth/index', $get_pesan);
        } else {
            if ($data) {
                // jika ada
                if (password_verify($this->input->post('password'), $data['password'])) {
                    // jika password benar
                    if ($data['role_id'] == 0) {
                        $data = [
                            "email" => $data['email'],
                            "role_id" => $data['role_id']
                        ];
                        $this->session->set_userdata($data);
                        redirect('admin/dashboard');
                    } else {
                        $data = [
                            "email" => $data['email'],
                            "role_id" => $data['role_id']
                        ];
                        $this->session->set_userdata($data);
                        redirect('direktur/dashboard');
                    }
                } else {
                    // jika passsowrd salah
                    // echo "<script>alert('Password Anda Salah')</script>";
                    $this->set_pesan('Password Anda Salah');
                    redirect('login');
                }
            } else {
                // jika tidak ada
                // echo "<script>alert('Username Anda Salah')</script>";
                $this->set_pesan('Email Anda Salah');
                redirect('login');
            }
        }
    }
    public function set_pesan($pesan)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['pesan'] = $pesan;
    }
    public function get_pesan()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $array_var = array();
        if (isset($_SESSION['pesan']) && $_SESSION['pesan'] != "") {
            $array_var['pesan'] = $_SESSION['pesan'];
            $array_var['modal'] = "$(\" #alertModal\").modal('show');";
            unset($_SESSION['pesan']);
        }
        return $array_var;
    }
}
