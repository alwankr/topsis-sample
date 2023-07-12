<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('pegawai_model', 'pegawai');
        $this->load->helper('MY');
        log_login();
    }


    public function index()
    {

        $this->form_validation->set_rules('nama', 'Nama', 'trim|required', [
            "required" => "Nama Harus Diisi"
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Pegawai';
            $data['pegawai'] = $this->pegawai->getPegawai();
            $data['posisi'] = $this->db->get('posisi')->result_array();

            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/header');
            $this->load->view('pegawai/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                "nama_pegawai" => $this->input->post('nama'),
                "posisi_id" => $this->input->post('posisi'),
                "kpi" => 0,
                "rekam_jejak" => 0,
                "penghargaan" => 0,
                "assestment" => 0,
                "feedback" => 0,
                "leab" => 0
            ];
            $this->db->insert('pegawai', $data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan');
            redirect('pegawai');
        }
    }

    public function hapus($id)
    {
        $this->db->where('id_pegawai', $id);
        $this->db->delete('pegawai');
        $this->db->where('pegawai_id', $id);
        $this->db->delete('bokrit');
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
        redirect('pegawai');
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Pegawai';

        $data['detail'] = $this->db->get_where('pegawai', ['id_pegawai' => $id])->result_array();
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/header');
        $this->load->view('pegawai/detail', $data);
        $this->load->view('templates/footer');
    }

    public function ubah()
    {
        $id = $this->uri->segment(3);
        // data convert
        $nama = $this->input->post('nama');
        $posisi = $this->input->post('posisi');
        $conkpi = convertKpi($this->input->post('kpi'));
        $conrekam_jejak = convertRejak($this->input->post('rekam_jejak'));
        $conpenghargaan = convertPenghargaan($this->input->post('penghargaan'));
        $conassestment = convertAssestment($this->input->post('assestment'));
        $confeedback = convertFeedback($this->input->post('feedback'));
        $conleab = convertLeab($this->input->post('leab'));


        $this->form_validation->set_rules('nama', 'Nama', 'trim|required', [
            "required" => "Nama Harus Diisi"
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Edit Pegawai';
            $data['posisi'] = $this->db->get('posisi')->result_array();
            $data['ubah'] = $this->db->get_where('pegawai', ['id_pegawai' => $id])->row_array();

            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/header');
            $this->load->view('pegawai/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            // untuk update
            $data = [
                "nama_pegawai" => $this->input->post('nama'),
                "posisi_id" => $this->input->post('posisi'),
                "kpi" => $this->input->post('kpi'),
                "rekam_jejak" => $this->input->post('rekam_jejak'),
                "penghargaan" => $this->input->post('penghargaan'),
                "assestment" => $this->input->post('assestment'),
                "feedback" => $this->input->post('feedback'),
                "leab" => $this->input->post('leab')
            ];
            $iddata = $this->input->post('id');
            $this->db->where('id_pegawai', $iddata);
            $this->db->update('pegawai', $data);

            $query = $this->db->get_where('bokrit', ['pegawai_id' => $this->input->post('id')])->row_array();
            if (empty($query)) {
                // input convert
                $convertInput = [
                    "pegawai_id" => $this->input->post('id'),
                    "bokrit_kpi" => $conkpi,
                    "bokrit_rejak" => $conrekam_jejak,
                    "bokrit_penghargaan" => $conpenghargaan,
                    "bokrit_assestment" => $conassestment,
                    "bokrit_feedback" => $confeedback,
                    "bokrit_leab" =>  $conleab
                ];
                $this->db->insert('bokrit', $convertInput);
            } else {
                // update convert
                $convertUpdate = [
                    "pegawai_id" => $this->input->post('id'),
                    "bokrit_kpi" => $conkpi,
                    "bokrit_rejak" => $conrekam_jejak,
                    "bokrit_penghargaan" => $conpenghargaan,
                    "bokrit_assestment" => $conassestment,
                    "bokrit_feedback" => $confeedback,
                    "bokrit_leab" =>  $conleab
                ];
                $this->db->where('pegawai_id', $this->input->post('id'));
                $this->db->update('bokrit', $convertUpdate);
            }
            $this->session->set_flashdata('pesan', 'Data Berhasil Diubah');
            redirect('pegawai');
        }
    }
}

/* End of file Pegawai.php */
