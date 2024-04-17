<?php

namespace App\Models;

use CodeIgniter\Model;

class BasisAturanJenisKSModel extends Model
{
    protected $table            = 'basis_aturan_jenis_kekerasan_seksual';
    protected $primaryKey       = 'id_aturanjenis';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_aturanjenis', 'id_jenis'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function withJenis()
    {
        return $this->join('jenis_kekerasan_seksual', 'basis_aturan_jenis_kekerasan_seksual.id_jenis = jenis_kekerasan_seksual.id_jenis');
    }
}
