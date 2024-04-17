<?php

namespace App\Models;

use CodeIgniter\Model;

class BasisAturanSanksiModel extends Model
{
    protected $table            = 'basis_aturan_sanksi';
    protected $primaryKey       = 'id_aturansanksi';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_aturansanksi', 'id_sanksi'];

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

    public function withSanksi()
    {
        return $this->join('sanksi_administratif', 'basis_aturan_sanksi.id_sanksi = sanksi_administratif.id_sanksi');
    }
}
