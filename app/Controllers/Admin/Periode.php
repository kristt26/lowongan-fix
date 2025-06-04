<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Periode extends BaseController
{
    protected $PeriodeModel;
    protected $detail;
    protected $tahapan;

    public function __construct()
    {
        $this->PeriodeModel = new \App\Models\PeriodeModel();
        $this->detail = new \App\Models\DetailModel();
        $this->tahapan = new \App\Models\TahapanModel();
    }

    public function index(): string
    {
        return view('Admin/periode');
    }

    public function store()
    {
        $data = $this->PeriodeModel->findAll();
        foreach ($data as $key => $item) {
            $item->tahapan = $this->detail->select("detail_tahapan.*, tahapan.nama_tahapan")
                ->join('tahapan', 'tahapan.id_tahapan=detail_tahapan.id_tahapan', 'left')
                ->where('id_periode', $item->id_periode)->orderBy('urutan', 'asc')->findAll();
        }
        return $this->response->setJSON($data);
    }

    public function add(): ResponseInterface
    {
        $param = $this->request->getJSON();
        $conn = \Config\Database::connect();
        try {
            $conn->transException(true)->transStart();
            if ($param->status == '1') $this->PeriodeModel->where('status', '1')->update(null, ['status' => '0']);
            $this->PeriodeModel->insert($param);
            $param->id_periode = $this->PeriodeModel->insertID();
            $tahapan = $this->tahapan->where('status', '1')->findAll();
            $dataDetail = [];
            foreach ($tahapan as $key => $tahap) {
                $item = [
                    'id_periode' => $param->id_periode,
                    'id_tahapan' => $tahap->id_tahapan,
                    'urutan' => $key + 1
                ];
                $dataDetail[] = $item;
            }
            $this->detail->insertBatch($dataDetail);
            $param->tahapan = $this->detail->select("detail_tahapan.*, tahapan.nama_tahapan")
                ->join('tahapan', 'tahapan.id_tahapan=detail_tahapan.id_tahapan', 'left')
                ->where('id_periode', $param->id_periode)->orderBy('urutan', 'asc')->findAll();
            $conn->transComplete();
            return $this->response->setJSON($param);
        } catch (\Throwable $th) {
            $conn->transRollback();
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
            if ($param->status == '1') $this->PeriodeModel->where('status', '1')->update(null, ['status' => '0']);
            $this->PeriodeModel->update($param->id_periode, $param);
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
            $this->PeriodeModel->delete($id);
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
