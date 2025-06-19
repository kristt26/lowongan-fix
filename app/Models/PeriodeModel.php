<?php namespace App\Models;

use CodeIgniter\Model;

class PeriodeModel extends Model
{
    protected $table            = 'periode';
    protected $primaryKey       = 'id_periode';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['periode','status'];

    protected bool $allowEmptyInserts = false;

    public function getAktif() {
        return $this->db->table('periode')->where('status', '1')->get()->getRow()->id_periode; 
    }
}
