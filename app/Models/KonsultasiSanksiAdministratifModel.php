<?php

namespace App\Models;

use CodeIgniter\Model;

class KonsultasiSanksiAdministratifModel extends Model
{
    protected $table            = 'konsultasi_sanksi_administratif';
    protected $primaryKey       = 'id_konsul_sanksi';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_konsul_sanksi', 'nmpelapor', 'tlp', 'tgl', 'alamat', 'kondisi', 'status', 'id_user'];

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

    public function withDetailKonsultasiSanksi()
    {
        return $this->join('detail_konsultasi_sanksi_admnistratif', 'konsultasi_sanksi_administratif.id_konsul_sanksi = detail_konsultasi_sanksi_admnistratif.id_konsul_sanksi');
    }

    public function withPelanggaran()
    {
        return $this->join('pelanggaran', 'detail_konsultasi_sanksi_administratif.id_pelanggaran = pelanggaran.id_pelanggaran');
    }

    public function withDetailBasisAturanSanksi()
    {
        return $this->join('detail_basis_aturan_sanksi', 'detail_basis_aturan_sanksi.id_pelanggaran = pelanggaran.id_pelanggaran');
    }

    public function withBasisAturanSanksi()
    {
        return $this->join('basis_aturan_sanksi', 'basis_aturan_sanksi.id_aturansanksi = detail_basis_aturan_sanksi.id_aturansanksi');
    }

    public function withSanksiAdministratif()
    {
        return $this->join('sanksi_admnistratif', 'sanksi_admnistratif.id_sanksi = basis_aturan_sanksi.id_sanksi');
    }
}
