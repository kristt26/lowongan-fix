<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Lamaran extends BaseController
{
    protected $LamaranModel;
    protected $pelamar;
    protected $tahapan;
    protected $PeriodeModel;
    protected $lowongan;

    public function __construct()
    {
        $this->LamaranModel = new \App\Models\LamaranModel();
        $this->pelamar = new \App\Models\PelamarModel();
        $this->tahapan = new \App\Models\DetailModel();
        $this->PeriodeModel = new \App\Models\PeriodeModel();
        $this->lowongan = new \App\Models\LowonganModel();
    }

    public function index(): string
    {
        if (session()->get('role') == 'Admin') return view('admin/lamaran');
        else return view('pelamar/lamaran');
    }

    public function store()
    {
        $periodeAktif = $this->PeriodeModel->where('status', '1')->first();
        $data['lamaran'] = $this->LamaranModel->select("lamaran.*, pelamar.nama_pelamar, pelamar.nik, pelamar.telepon, lowongan.posisi, bidang.nama_bidang, tahapan.nama_tahapan, tahapan.icon")
            ->join('pelamar', 'pelamar.id_pelamar=lamaran.id_pelamar', 'left')
            ->join('lowongan', 'lowongan.id_lowongan=lamaran.id_lowongan', 'left')
            ->join('bidang', 'bidang.id_bidang=lowongan.id_bidang', 'left')
            ->join('detail_tahapan', 'detail_tahapan.id_detail_tahapan=lamaran.id_detail_tahapan', 'left')
            ->join('tahapan', 'tahapan.id_tahapan=detail_tahapan.id_tahapan', 'left')
            ->where('lowongan.id_periode', $periodeAktif->id_periode)
            ->orderBy('tanggal_buka', 'asc')->findAll();
        foreach ($data['lamaran'] as $key => $value) {
            $value->pelamar = $this->pelamar->where('id_pelamar', $value->id_pelamar)->first();
        }
        $data['tahapan'] = $this->tahapan->select("detail_tahapan.*, tahapan.nama_tahapan")
            ->join('tahapan', 'detail_tahapan.id_tahapan=tahapan.id_tahapan', 'left')
            ->where('id_periode', $periodeAktif->id_periode)
            ->orderBy('urutan', 'asc')->findAll();
        return $this->response->setJSON($data);
    }

    public function saya()
    {
        $pelamar = $this->pelamar->where('id_users', session()->get('uid'))->first();
        $data = $this->LamaranModel->select("lamaran.*, pelamar.nama_pelamar, pelamar.nik, pelamar.telepon, lowongan.posisi, bidang.nama_bidang, tahapan.nama_tahapan, tahapan.icon")
            ->join('pelamar', 'pelamar.id_pelamar=lamaran.id_pelamar', 'left')
            ->join('lowongan', 'lowongan.id_lowongan=lamaran.id_lowongan', 'left')
            ->join('bidang', 'bidang.id_bidang=lowongan.id_bidang', 'left')
            ->join('detail_tahapan', 'detail_tahapan.id_detail_tahapan=lamaran.id_detail_tahapan', 'left')
            ->join('tahapan', 'tahapan.id_tahapan=detail_tahapan.id_tahapan', 'left')
            ->where('lamaran.id_pelamar', $pelamar->id_pelamar)
            ->orderBy('tanggal_buka', 'asc')->findAll();
        return $this->response->setJSON($data);
    }

    public function add(): ResponseInterface
    {
        $param = $this->request->getJSON();
        $pelamar = $this->pelamar->where('id_users', session()->get('uid'))->first();
        $tahapan = $this->tahapan->limit(1)->orderBy('urutan', 'asc')->first();
        try {
            $item = [
                'id_pelamar' => $pelamar->id_pelamar,
                'id_lowongan' => $param->id_lowongan,
                'id_detail_tahapan' => $tahapan->id_detail_tahapan,
                'status' => 'Seleksi',
                'tanggal_lamar' => date('Y-m-d')
            ];
            $lamaranAktif = $this->LamaranModel
                ->where('id_pelamar', $pelamar->id_pelamar)
                ->whereNotIn('status', ['Ditolak']) // status aktif
                ->countAllResults();

            if ($lamaranAktif > 0) {
                throw new \Exception("Anda hanya diizinkan melamar satu lowongan selama lamaran Anda masih aktif.", 1);
            }

            // Cek apakah pelamar pernah ditolak pada lowongan yang sama
            $pernahDitolakDiLowonganIni = $this->LamaranModel
                ->where('id_pelamar', $pelamar->id_pelamar)
                ->where('id_lowongan', $param->id_lowongan)
                ->where('status', 'Ditolak')
                ->countAllResults();

            if ($pernahDitolakDiLowonganIni > 0) {
                throw new \Exception("Anda tidak dapat melamar kembali ke lowongan ini karena sudah pernah ditolak.", 1);
            }
            $this->LamaranModel->insert($item);
            return $this->response->setJSON($param);
        } catch (\Throwable $th) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => $th->getMessage()
            ])->setStatusCode(500);
        }
    }

    public function edit(): ResponseInterface
    {
        $param = $this->request->getJSON();
        $dataLamaran = $this->LamaranModel->where('id_lamaran', $param->id_lamaran)->first();
        $tahapan = $this->tahapan->where('urutan >', $param->urutan)->orderBy('urutan', 'ASC')->first();
        try {
            if ($param->set == 'setuju') {
                if ($this->LamaranModel->isKuotaTerpenuhi($dataLamaran->id_lowongan)) {
                    throw new \Exception("Kuota lowongan sudah penuh. Tidak bisa menerima pelamar lagi.");
                }
                if (!is_null($param->status)) {
                    $item = ['status' => 'Diterima'];
                    $param->status = 'Diterima';
                } else {
                    $item = ['id_detail_tahapan' => $tahapan->id_detail_tahapan];
                    $param->id_detail_tahapan = $tahapan->id_detail_tahapan;
                }
            } else {
                $item = ['status' => 'Ditolak'];
                $param->status = 'Ditolak';
            }
            $this->LamaranModel->update($param->id_lamaran, $item);
            return $this->response->setJSON($param);
        } catch (\Throwable $th) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => $th->getMessage()
            ])->setStatusCode(500);
        }
    }

    public function delete($id = null): ResponseInterface
    {
        try {
            $this->LamaranModel->delete($id);
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
