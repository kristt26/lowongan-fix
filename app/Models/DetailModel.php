<?php namespace App\Models;

use CodeIgniter\Model;

class DetailModel extends Model
{
    protected $table            = 'detail_tahapan';
    protected $primaryKey       = 'id_detail_tahapan';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_tahapan', 'id_periode', 'urutan'];

    protected bool $allowEmptyInserts = false;
}
