<?php namespace App\Models;

use CodeIgniter\Model;

class BidangModel extends Model
{
    protected $table            = 'bidang';
    protected $primaryKey       = 'id_bidang';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_bidang', 'singkatan'];

    protected bool $allowEmptyInserts = false;
}
