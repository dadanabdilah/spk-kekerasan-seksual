<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class HasilKonsultasiSanksi extends BaseController
{
    public function index(): string
    {
        if(session()->get('role') == 'pelapor'){
            $konsultasi = $this->konsultasiSanksiAdministratif->where('id_user', session()->get('id_user'))->findAll();
        } else {
            $konsultasi = $this->konsultasiSanksiAdministratif->findAll();
        }
        
        $data = [
            'title' => 'Hasil Konsultasi Sanksi Administratif',
            'konsultasiSanksiAdministratif' => $konsultasi,
        ];
        return view('admin/hasil-konsultasi-sanksi/index', $data);
    }

    public function detail($id)
    {
        $konsultasi = $this->konsultasiSanksiAdministratif->find($id);
       
        $detailKonsutasi = $this->detailKonsultasiSanksiAdministratif->withPelanggaran()->withDetailBasisAturanSanksi()->withBasisAturanSanksi()->withSanksiAdministratif()->where('id_konsul_sanksi', $id)->findAll();

        $data = [
            'title' => 'Detail Konsultasi',
            'konsultasi' => $konsultasi,
            'detailKonsultasi' => $detailKonsutasi,
        ];
        
        return view('admin/hasil-konsultasi-sanksi/detail', $data);
    }

    public function hapus($id)
    {
        // Proses hapus data
        $this->konsultasiSanksiAdministratif->delete($id);

        if($this->detailKonsultasiSanksiAdministratif->where('id_konsul_sanksi', $id)->countAll() > 0){
            $this->detailKonsultasiSanksiAdministratif->where('id_konsul_sanksi', $id)->delete();
        }

        session()->setFlashdata('status', 'success');
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/admin/hasil-konsultasi-sanksi');
    }
}
