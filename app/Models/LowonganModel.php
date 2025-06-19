<?php

namespace App\Models;

use CodeIgniter\Model;

class LowonganModel extends Model
{
    protected $table            = 'lowongan';
    protected $primaryKey       = 'id_lowongan';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['desc', 'id_periode', 'id_bidang', 'tanggal_buka', 'tanggal_tutup', 'posisi', 'jenis_pekerjaan', 'perkiraan_gaji', 'pekerjaan', 'kuota'];

    protected bool $allowEmptyInserts = false;


}
