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
}
