<?php

namespace App\Models;

use CodeIgniter\Model;

class LamaranModel extends Model
{
    protected $table            = 'lamaran';
    protected $primaryKey       = 'id_lamaran';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_pelamar', 'id_lowongan', 'id_detail_tahapan', 'status', 'tanggal_lamar'];

    protected bool $allowEmptyInserts = false;

    public function isKuotaTerpenuhi(int $id_lowongan): bool
    {
        $kuota = $this->db->table('lowongan')
            ->select('kuota')
            ->where('id_lowongan', $id_lowongan)
            ->get()
            ->getRow('kuota');

        $jumlahDiterima = $this->where('id_lowongan', $id_lowongan)
            ->where('status', 'Diterima')
            ->countAllResults();

        return $jumlahDiterima >= $kuota;
    }

    public function laporanPenerimaan($id_periode)
    {
        $kuota = $this->db->table('lamaran')
            ->select('bidang.nama_bidang, lowongan.posisi, lowongan.pekerjaan, pelamar.nik, pelamar.nama_pelamar, pelamar.telepon')
            ->join('lowongan', 'lowongan.id_lowongan = lamaran.id_lowongan', 'left')
            ->join('bidang', 'bidang.id_bidang = lowongan.id_bidang', 'left')
            ->join('pelamar', 'pelamar.id_pelamar = lamaran.id_pelamar', 'left')
            ->where('lowongan.id_periode', $id_periode) // diperjelas asalnya
            ->get()
            ->getResult();
        return $kuota;
    }
}
