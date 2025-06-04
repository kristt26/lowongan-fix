<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Home extends BaseController
{
    protected $pelamar;
    protected $bidang;
    protected $lowongan;
    protected $PeriodeModel;

    public function __construct()
    {
        $this->pelamar = new \App\Models\LamaranModel();
        $this->bidang = new \App\Models\BidangModel();
        $this->lowongan = new \App\Models\LowonganModel();
        $this->PeriodeModel = new \App\Models\PeriodeModel();
    }

    public function index(): string
    {
        $periodeAktif = $this->PeriodeModel->where('status', '1')->first();
        $data['bidang'] = $this->bidang->countAllResults();
        $data['lowongan'] = $this->lowongan->join('bidang', 'bidang.id_bidang=lowongan.id_bidang', 'left')
            ->where('tanggal_buka <=', date('Y-m-d'))
            ->where('tanggal_tutup >=', date('Y-m-d'))
            ->where('id_periode', $periodeAktif->id_periode)->countAllResults();
        $data['pelamar'] = $this->pelamar
            ->join('pelamar', 'pelamar.id_pelamar=lamaran.id_pelamar', 'left')
            ->join('lowongan', 'lowongan.id_lowongan=lamaran.id_lowongan', 'left')
            ->join('bidang', 'bidang.id_bidang=lowongan.id_bidang', 'left')
            ->join('detail_tahapan', 'detail_tahapan.id_detail_tahapan=lamaran.id_detail_tahapan', 'left')
            ->join('tahapan', 'tahapan.id_tahapan=detail_tahapan.id_tahapan', 'left')
            ->where('lowongan.id_periode', $periodeAktif->id_periode)->countAllResults();
        return view('admin/home', $data);
    }
}
