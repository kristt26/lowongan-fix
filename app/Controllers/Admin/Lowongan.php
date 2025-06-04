<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Lowongan extends BaseController
{
    protected $LowonganModel;
    protected $BidangModel;
    protected $PeriodeModel;

    public function __construct()
    {
        $this->LowonganModel = new \App\Models\LowonganModel();
        $this->BidangModel = new \App\Models\BidangModel();
        $this->PeriodeModel = new \App\Models\PeriodeModel();
    }

    public function index(): string
    {
        if (session()->get('role') == 'Admin') return view('admin/lowongan');
        else return view('pelamar/lowongan');
    }

    public function store()
    {
        $periodeAktif = $this->PeriodeModel->where('status', '1')->first();
        $data['bidang'] = $this->BidangModel->findAll();
        $data['lowongan'] = $this->LowonganModel->select("lowongan.*, bidang.nama_bidang")
            ->join('bidang', 'bidang.id_bidang=lowongan.id_bidang', 'left')
            ->where('id_periode', $periodeAktif->id_periode)->findAll();
        return $this->response->setJSON($data);
    }

    public function aktif()
    {
        $periodeAktif = $this->PeriodeModel->where('status', '1')->first();
        $data['lowongan'] = $this->LowonganModel
            ->select("lowongan.*, bidang.nama_bidang")
            ->join('bidang', 'bidang.id_bidang = lowongan.id_bidang', 'left')
            ->where('id_periode', $periodeAktif->id_periode)
            ->where('tanggal_buka <=', date('Y-m-d'))
            ->where('tanggal_tutup >=', date('Y-m-d'))
            ->findAll();
        return $this->response->setJSON($data);
    }

    public function add(): ResponseInterface
    {
        $param = $this->request->getJSON();
        $param->id_periode = $this->PeriodeModel->where('status', '1')->first()->id_periode;
        try {
            $this->LowonganModel->insert($param);
            $param->id_lowongan = $this->LowonganModel->insertID();
            return $this->response->setJSON($param);
        } catch (\Throwable $th) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => $th->getMessage()
            ]);
        }
    }

    public function edit(): ResponseInterface
    {
        $param = $this->request->getJSON();
        try {
            $this->LowonganModel->update($param->id_lowongan, $param);
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Data berhasil diubah'
            ]);
        } catch (\Throwable $th) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => $th->getMessage()
            ]);
        }
    }

    public function delete($id = null): ResponseInterface
    {
        try {
            $this->LowonganModel->delete($id);
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Data berhasil dihapus'
            ]);
        } catch (\Throwable $th) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => $th->getMessage()
            ])->setStatusCode(500);
        }
    }
}
