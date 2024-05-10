<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class HasilLaporKonsultasiJenisKs extends BaseController
{
    public function index()
    {
        if(session()->get('role') == 'pelapor'){
            $konsultasi = $this->laporKonsultasiJenisKs->where('id_user', session()->get('id_user'))->findAll();
        } else {
            $konsultasi = $this->laporKonsultasiJenisKs->findAll();
        }
        
        $data = [
            'title' => 'Hasil Pelaporan Konsultasi Kekerasan Seksusal',
            'laporKonsultasiJenisKs' => $konsultasi,
        ];
        return view('admin/hasil-lapor-konsultasi-jenis-ks/index', $data);
    }

    public function detail($id)
    {
        $konsultasi = $this->konsultasiJenisKs->find($id);
       
        $detailKonsutasi = $this->detailKonsultasiJenisKs->withDiagnosa()->withDetailBasisAturanJenisKs()->withBasisAturanJenisKs()->withJenisKs()->where('id_konsul_jenis', $id)->findAll();

        $data = [
            'title' => 'Detail Konsultasi',
            'konsultasi' => $konsultasi,
            'detailKonsultasi' => $detailKonsutasi,
        ];
        
        return view('admin/hasil-konsultasi-jenis-ks/detail', $data);
    }
}
