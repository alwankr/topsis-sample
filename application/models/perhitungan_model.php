<?php
defined('BASEPATH') or exit('No direct script access allowed');

class perhitungan_model extends CI_Model
{

    private $rata = 0;
    private $akar = 0;
    private $si = array();
    public function getDataBokrit()
    {
        $this->db->select('pegawai.nama_pegawai, bokrit.*');
        $this->db->from('bokrit');
        $this->db->join('pegawai', 'pegawai.id_pegawai = bokrit.pegawai_id');
        return $this->db->get('')->result_array();
    }

    public function getDataKaraywanTerbaik()
    {
        $this->db->select('pegawai.nama_pegawai, (select nama_posisi from posisi where id_posisi = pegawai.posisi_id) as posisi_id, karyawan_terbaik.*');
        $this->db->from('karyawan_terbaik');
        $this->db->join('pegawai', 'pegawai.id_pegawai = karyawan_terbaik.pegawai_id');
        return $this->db->get('')->result_array();
    }

    public function getRataKriteria()
    {
        $datakpi = $this->db->query('SELECT SUM(bokrit_kpi) as kpi FROM bokrit')->row_array();
        $datarejak = $this->db->query('SELECT SUM(bokrit_rejak) as rejak FROM bokrit')->row_array();
        $datapenghargaan = $this->db->query('SELECT SUM(bokrit_penghargaan) as penghargaan FROM bokrit')->row_array();
        $dataassestment = $this->db->query('SELECT SUM(bokrit_assestment) as assestment FROM bokrit')->row_array();
        $datafeedback = $this->db->query('SELECT SUM(bokrit_feedback) as feedback FROM bokrit')->row_array();
        $dataleab = $this->db->query('SELECT SUM(bokrit_leab) as leab FROM bokrit')->row_array();
        $jumlah = $this->db->get('bokrit')->num_rows();

        $this->rata = [
            'kpi' => substr($datakpi['kpi'] / $jumlah, 0, 5),
            'rejak' => substr($datarejak['rejak'] / $jumlah, 0, 5),
            'penghargaan' => substr($datapenghargaan['penghargaan'] / $jumlah, 0, 5),
            'assestment' => substr($dataassestment['assestment'] / $jumlah, 0, 5),
            'feedback' => substr($datafeedback['feedback'] / $jumlah, 0, 5),
            'leab' => substr($dataleab['leab'] / $jumlah, 0, 5)
        ];

        return $data = [
            'kpi' => substr($datakpi['kpi'] / $jumlah, 0, 5),
            'rejak' => substr($datarejak['rejak'] / $jumlah, 0, 5),
            'penghargaan' => substr($datapenghargaan['penghargaan'] / $jumlah, 0, 5),
            'assestment' => substr($dataassestment['assestment'] / $jumlah, 0, 5),
            'feedback' => substr($datafeedback['feedback'] / $jumlah, 0, 5),
            'leab' => substr($dataleab['leab'] / $jumlah, 0, 5)
        ];
    }

    public function AkarRataRata()
    {
        $queryakar = $this->db->get('bokrit')->result_array();
        $datakpi = [];
        $datarejak = [];
        $datapenghargaan = [];
        $dataassestment = [];
        $datafeedback = [];
        $dataleab = [];

        foreach ($queryakar as $row) {
            if ($row['bokrit_kpi']) {
                $kpi = pow($row['bokrit_kpi'], 2);
            }
            if ($row['bokrit_rejak']) {
                $rejak = pow($row['bokrit_rejak'], 2);
            }
            if ($row['bokrit_penghargaan']) {
                $penghargaan = pow($row['bokrit_penghargaan'], 2);
            }
            if ($row['bokrit_assestment']) {
                $assestment = pow($row['bokrit_assestment'], 2);
            }
            if ($row['bokrit_feedback']) {
                $feedback = pow($row['bokrit_feedback'], 2);
            }
            if ($row['bokrit_leab']) {
                $leab = pow($row['bokrit_leab'], 2);
            }

            $datakpi[] = $kpi;
            $datarejak[] = $rejak;
            $datapenghargaan[] = $penghargaan;
            $dataassestment[] = $assestment;
            $datafeedback[] = $feedback;
            $dataleab[] = $leab;
        }

        $this->akar = [
            'kpi' => substr(sqrt(array_sum($datakpi)), 0, 5),
            'rejak' => substr(sqrt(array_sum($datarejak)), 0, 5),
            'penghargaan' => substr(sqrt(array_sum($datapenghargaan)), 0, 5),
            'assestment' => substr(sqrt(array_sum($dataassestment)), 0, 5),
            'feedback' => substr(sqrt(array_sum($datafeedback)), 0, 5),
            'leab' => substr(sqrt(array_sum($dataleab)), 0, 5),
        ];

        return $data = [
            'kpi' => substr(sqrt(array_sum($datakpi)), 0, 5),
            'rejak' => substr(sqrt(array_sum($datarejak)), 0, 5),
            'penghargaan' => substr(sqrt(array_sum($datapenghargaan)), 0, 5),
            'assestment' => substr(sqrt(array_sum($dataassestment)), 0, 5),
            'feedback' => substr(sqrt(array_sum($datafeedback)), 0, 5),
            'leab' => substr(sqrt(array_sum($dataleab)), 0, 5),
        ];
    }

    public function Solusi()
    {
        $dataBokrit = $this->getDataBokrit();
        $akar = $this->AkarRataRata();
        $rata = $this->getRataKriteria();

        $sikpi = [];
        $sirejak = [];
        $sipenghargaan = [];
        $siassestment = [];
        $sifeedback = [];
        $sileab = [];

        foreach ($dataBokrit as $data) {
            $sikpi[] = $data['bokrit_kpi'] * $rata['kpi'] / $akar['kpi'];
            $sirejak[] = $data['bokrit_rejak'] * $rata['rejak'] / $akar['rejak'];
            $sipenghargaan[] = $data['bokrit_penghargaan'] * $rata['penghargaan'] / $akar['penghargaan'];
            $siassestment[] = $data['bokrit_assestment'] * $rata['assestment'] / $akar['assestment'];
            $sifeedback[] = $data['bokrit_feedback'] * $rata['feedback'] / $akar['feedback'];
            $sileab[] = $data['bokrit_leab'] * $rata['leab'] / $akar['leab'];
        }

        return $data = [
            "sikpi" => $sikpi,
            "sirejak" => $sirejak,
            "sipenghargaan" => $sipenghargaan,
            "siassestment" => $siassestment,
            "sifeedback" => $sifeedback,
            "sileab" => $sileab,
        ];
    }

    public function SolusiIdeal()
    {
        $separasi = $this->Solusi();

        $this->si = [
            "positif" => [
                "positifkpi" => substr(max($separasi['sikpi']), 0, 5),
                "positifrejak" => substr(max($separasi['sirejak']), 0, 5),
                "positifpenghargaan" => substr(max($separasi['sipenghargaan']), 0, 5),
                "positifassestment" => substr(max($separasi['siassestment']), 0, 5),
                "positiffeedback" => substr(max($separasi['sifeedback']), 0, 5),
                "positifleab" => substr(max($separasi['sileab']), 0, 5)
            ],
            "negatif" => [
                "negatifkpi" => substr(min($separasi['sikpi']), 0, 5),
                "negatifrejak" => substr(min($separasi['sirejak']), 0, 5),
                "negatifpenghargaan" => substr(min($separasi['sipenghargaan']), 0, 5),
                "negatifassestment" => substr(min($separasi['siassestment']), 0, 5),
                "negatiffeedback" => substr(min($separasi['sifeedback']), 0, 5),
                "negatifleab" => substr(min($separasi['sileab']), 0, 5)
            ]
        ];

        return $data = [
            "positif" => [
                "positifkpi" => substr(max($separasi['sikpi']), 0, 5),
                "positifrejak" => substr(max($separasi['sirejak']), 0, 5),
                "positifpenghargaan" => substr(max($separasi['sipenghargaan']), 0, 5),
                "positifassestment" => substr(max($separasi['siassestment']), 0, 5),
                "positiffeedback" => substr(max($separasi['sifeedback']), 0, 5),
                "positifleab" => substr(max($separasi['sileab']), 0, 5)
            ],
            "negatif" => [
                "negatifkpi" => substr(min($separasi['sikpi']), 0, 5),
                "negatifrejak" => substr(min($separasi['sirejak']), 0, 5),
                "negatifpenghargaan" => substr(min($separasi['sipenghargaan']), 0, 5),
                "negatifassestment" => substr(min($separasi['siassestment']), 0, 5),
                "negatiffeedback" => substr(min($separasi['sifeedback']), 0, 5),
                "negatifleab" => substr(min($separasi['sileab']), 0, 5)
            ]
        ];
    }

    function hitung_kpi($data)
    {
        return substr($data * $this->rata['kpi'] / $this->akar['kpi'], 0, 5);
    }
    function hitung_rejak($data)
    {
        return substr($data * $this->rata['rejak'] / $this->akar['rejak'], 0, 5);
    }
    function hitung_penghargaan($data)
    {
        return substr($data * $this->rata['penghargaan'] / $this->akar['penghargaan'], 0, 5);
    }
    function hitung_assestment($data)
    {
        return substr($data * $this->rata['assestment'] / $this->akar['assestment'], 0, 5);
    }
    function hitung_feedback($data)
    {
        return substr($data * $this->rata['feedback'] / $this->akar['feedback'], 0, 5);
    }
    function hitung_leab($data)
    {
        return substr($data * $this->rata['leab'] / $this->akar['leab'], 0, 5);
    }
    function hitung_separasi_positif($data)
    {
        $pow1 = pow(($this->si['positif']['positifkpi'] - substr($data['bokrit_kpi'] * $this->rata['kpi'] / $this->akar['kpi'], 0, 5)), 2);
        $pow2 = pow(($this->si['positif']['positifrejak'] - substr($data['bokrit_rejak'] * $this->rata['rejak'] / $this->akar['rejak'], 0, 5)), 2);
        $pow3 = pow(($this->si['positif']['positifpenghargaan'] - substr($data['bokrit_penghargaan'] * $this->rata['penghargaan'] / $this->akar['penghargaan'], 0, 5)), 2);
        $pow4 = pow(($this->si['positif']['positifassestment'] - substr($data['bokrit_assestment'] * $this->rata['assestment'] / $this->akar['assestment'], 0, 5)), 2);
        $pow5 = pow(($this->si['positif']['positiffeedback'] - substr($data['bokrit_feedback'] * $this->rata['feedback'] / $this->akar['feedback'], 0, 5)), 2);
        $pow6 = pow(($this->si['positif']['positifleab'] - substr($data['bokrit_leab'] * $this->rata['leab'] / $this->akar['leab'], 0, 5)), 2);
        return substr(sqrt($pow1 + $pow2 + $pow3 + $pow4 + $pow5 + $pow6), 0, 5);
    }
    function hitung_separasi_negatif($data)
    {
        $pow1 = pow((substr($data['bokrit_kpi'] * $this->rata['kpi'] / $this->akar['kpi'], 0, 5)) - $this->si['negatif']['negatifkpi'], 2);
        $pow2 = pow((substr($data['bokrit_rejak'] * $this->rata['rejak'] / $this->akar['rejak'], 0, 5)) - $this->si['negatif']['negatifrejak'], 2);
        $pow3 = pow((substr($data['bokrit_penghargaan'] * $this->rata['penghargaan'] / $this->akar['penghargaan'], 0, 5)) - $this->si['negatif']['negatifpenghargaan'], 2);
        $pow4 = pow((substr($data['bokrit_assestment'] * $this->rata['assestment'] / $this->akar['assestment'], 0, 5)) - $this->si['negatif']['negatifassestment'], 2);
        $pow5 = pow((substr($data['bokrit_feedback'] * $this->rata['feedback'] / $this->akar['feedback'], 0, 5)) - $this->si['negatif']['negatiffeedback'], 2);
        $pow6 = pow((substr($data['bokrit_leab'] * $this->rata['leab'] / $this->akar['leab'], 0, 5)) - $this->si['negatif']['negatifleab'], 2);
        return substr(sqrt($pow1 + $pow2 + $pow3 + $pow4 + $pow5 + $pow6), 0, 5);
    }
    function hitung_kedekatan_relatif($data)
    {
        return substr($this->hitung_separasi_negatif($data) / ($this->hitung_separasi_positif($data) + $this->hitung_separasi_negatif($data)), 0, 9);
    }

    public function sort_top($bokrit)
    {
        $this->getRataKriteria();
        $this->AkarRataRata();
        $this->SolusiIdeal();

        $data_array = array();
        $i = 0;
        foreach ($bokrit as $data) {
            $data['hitung_separasi_negatif'] = $this->hitung_separasi_negatif($data);
            $data['hitung_separasi_positif'] = $this->hitung_separasi_positif($data);
            $data['hitung_kedekatan_relatif'] = $this->hitung_kedekatan_relatif($data);
            $data_array[$i] = $data;
            $i++;
        }
        $j = 0;
        while (isset($data_array[$j])) {
            $j_temp = $j;
            for ($i = $j; $i > -1; $i--) {
                if ($data_array[$j]['hitung_kedekatan_relatif'] > $data_array[$i]['hitung_kedekatan_relatif']) {
                    $temp = $data_array[$j];
                    $data_array[$j] = $data_array[$i];
                    $data_array[$i] = $temp;
                    $j = $i;
                }
            }

            $j = $j_temp;
            $j++;
        }
        return $data_array;
    }
}

    /* End of file perhitungan_model.php */
