<?php namespace App\Models;

use CodeIgniter\Model;

class PelamarModel extends Model
{
    protected $table            = 'pelamar';
    protected $primaryKey       = 'id_pelamar';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nik','nama_pelamar','telepon','ktp','kk','ijazah','id_users', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'foto', 'skck', 'cv'];

    protected bool $allowEmptyInserts = false;
}
