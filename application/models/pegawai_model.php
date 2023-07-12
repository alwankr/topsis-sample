<?php

defined('BASEPATH') or exit('No direct script access allowed');

class pegawai_model extends CI_Model
{

    public function getPegawai()
    {
        $this->db->select('pegawai.*, posisi.nama_posisi');
        $this->db->from('pegawai');
        $this->db->join('posisi', 'posisi.id_posisi = pegawai.posisi_id');
        return $this->db->get()->result_array();
    }
}

/* End of file pegawai_model.php */
