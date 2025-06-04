<?php namespace App\Models;

use CodeIgniter\Model;

class TahapanModel extends Model
{
    protected $table            = 'tahapan';
    protected $primaryKey       = 'id_tahapan';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_tahapan', 'status', 'keterangan', 'icon'];

    protected bool $allowEmptyInserts = false;
}
