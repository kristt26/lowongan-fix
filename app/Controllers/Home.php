<?php

namespace App\Controllers;

use App\Controllers\Admin\Tahapan;
use CodeIgniter\HTTP\ResponseInterface;

class Home extends BaseController
{
    public function index(): string
    {
        return view('home');
    }

    public function lowongan(): string
    {
        return view('lowongan');
    }

    public function detail($id = null): string
    {
        return view('detail_lowongan');
    }

    public function read(): ResponseInterface
    {
        $periode = new \App\Models\PeriodeModel();
        $lowongan = new \App\Models\LowonganModel();
        $tahapan = new \App\Models\TahapanModel();
        $data['lowongan'] = $lowongan->select("lowongan.*, bidang.nama_bidang, bidang.singkatan")
            ->join('bidang', 'bidang.id_bidang=lowongan.id_bidang', 'left')
            ->where('tanggal_buka <=', date('Y-m-d'))
            ->where('tanggal_tutup >=', date('Y-m-d'))
            ->where('id_periode', $periode->where('status', '1')->first()->id_periode)->findAll();
        $data['tahapan'] = $tahapan->findAll();
        return $this->response->setJSON($data);
    }

    public function readDetail($id = null): ResponseInterface
    {
        $periode = new \App\Models\PeriodeModel();
        $lowongan = new \App\Models\LowonganModel();
        $data['detail'] = $lowongan->select("lowongan.*, bidang.nama_bidang, bidang.singkatan")
            ->join('bidang', 'bidang.id_bidang=lowongan.id_bidang', 'left')
            ->where('id_lowongan', $id)->first();
        $data['lowongan'] = $lowongan->select("lowongan.*, bidang.nama_bidang, bidang.singkatan")
            ->join('bidang', 'bidang.id_bidang=lowongan.id_bidang', 'left')
            ->where('id_periode', $periode->where('status', '1')->first()->id_periode)
            ->where('lowongan.id_bidang', $data['detail']->id_bidang)->findAll();
        return $this->response->setJSON($data);
    }

    public function readRekrutmen(): ResponseInterface
    {
        $PeriodeModel = new \App\Models\PeriodeModel();
        $LowonganModel = new \App\Models\LowonganModel();
        $periodeAktif = $PeriodeModel->where('status', '1')->first();
        $data = $LowonganModel->select("lowongan.*, bidang.nama_bidang, bidang.singkatan")
            ->where('tanggal_buka <=', date('Y-m-d'))
            ->where('tanggal_tutup >=', date('Y-m-d'))
            ->join('bidang', 'bidang.id_bidang=lowongan.id_bidang', 'left')
            ->where('id_periode', $periodeAktif->id_periode)->findAll();
        return $this->response->setJSON($data);
    }
}
