<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporKonsultasiJenisKsModel extends Model
{
    protected $table            = 'lapor_konsultasi_jenis_ks';
    protected $primaryKey       = 'id_lapor_konsul';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_lapor_konsul', 'nama_pelapor', 'nama_pelaku', 'tlp','email', 'alamat', 'jenis_ks', 'cerita_peristiswa', 'disabilitas', 'status', 'alasan_pengaduan', 'no_hp_lain', 'email_lain', 'tgl', 'id_user'];

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

    public function withDetailKonsultasi()
    {
        return $this->join('detail_konsultasi_jenis_ks', 'konsultasi_jenis_ks.id_konsul_jenis = detail_konsultasi_jenis_ks.id_konsul_jenis');
    }

    public function withDiagnosa()
    {
        return $this->join('diagnosa', 'detail_konsultasi_jenis_ks.id_diagnosa = diagnosa.id_diagnosa');
    }

    public function withDetailBasisAturanJenisKs()
    {
        return $this->join('detail_basis_aturan_jenis_kekerasan_seksual', 'detail_basis_aturan_jenis_kekerasan_seksual.id_diagnosa = diagnosa.id_diagnosa');
    }

    public function withBasisAturanJenisKs()
    {
        return $this->join('basis_aturan_jenis_kekerasan_seksual', 'basis_aturan_jenis_kekerasan_seksual.id_aturanjenis = detail_basis_aturan_jenis_kekerasan_seksual.id_aturanjenis');
    }

    public function withJenisKs()
    {
        return $this->join('jenis_kekerasan_seksual', 'jenis_kekerasan_seksual.id_jenis = basis_aturan_jenis_kekerasan_seksual.id_jenis');
    }
}
