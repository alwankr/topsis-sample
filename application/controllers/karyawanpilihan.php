    <?php

    defined('BASEPATH') or exit('No direct script access allowed');

    class karyawanPilihan extends CI_Controller
    {


        public function __construct()
        {
            parent::__construct();
            $this->load->model('perhitungan_model', 'hitung');
            $this->load->helper('MY');
            log_login();
        }

        function testpdf()
        {
            $data['title'] = 'PDF TOPSIS';
            $data['pegawai'] = $this->hitung->getDataKaraywanTerbaik();
            $data['posisi'] = $this->db->get('posisi')->result_array();
            $data['bokrit'] = $this->hitung->sort_top($this->hitung->getDataBokrit());

            libpdf::readpdf("coba", $data);
        }
        public function karyawanPilihan($data, $id)
        {
            $data = [
                "pegawai_id" => $id,
                "kedekatan_relatif" => $data,
                "tanggal_pemilihan" => date('Y-m-d')
            ];
            $query = $this->db->get_where('karyawan_terbaik', array('pegawai_id' => $data['pegawai_id']))->row_array();
            if (empty($query)) {
                $this->db->insert('karyawan_terbaik', $data);
                $this->session->set_flashdata('pesan', 'Karyawan Terbaik Terpilih');
            } else {
                $this->session->set_flashdata('pesan', 'Karyawan Sudah Terpilih');
            }
            redirect('karyawanpilihan/terbaik');
        }
        public function krpilihan()
        {
            $data['title'] = 'Karyawan Terbaik Terbaik';
            $data['pegawai'] = $this->hitung->getDataKaraywanTerbaik();
            $data['posisi'] = $this->db->get('posisi')->result_array();

            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/header');
            $this->load->view('perhitungan/krpilihan', $data);
            $this->load->view('templates/footer');
        }
        public function terbaik()
        {
            $data['title'] = 'Karyawan Terbaik';
            $data['bokrit'] = $this->hitung->sort_top($this->hitung->getDataBokrit());

            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/header');
            $this->load->view('perhitungan/terbaik', $data);
            $this->load->view('templates/footer');
        }
        public function detail($id)
        {
            $data['title'] = 'Detail Pegawai';

            $data['detail'] = $this->db->get_where('pegawai', ['id_pegawai' => $id])->result_array();
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/header');
            $this->load->view('detail', $data);
            $this->load->view('templates/footer');
        }
        public function hapus($id)
        {
            $this->db->where('pegawai_id', $id);
            $this->db->delete('karyawan_terbaik');
            $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
            redirect('karyawanpilihan/krpilihan');
        }
    }
    ?>