<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class HasilKonsultasiJenisKs extends BaseController
{
    public function index(): string
    {
        if(session()->get('role') == 'pelapor'){
            $konsultasi = $this->konsultasiJenisKs->where('id_user', session()->get('id_user'))->findAll();
        } else {
            $konsultasi = $this->konsultasiJenisKs->findAll();
        }
        
        $data = [
            'title' => 'Hasil Konsultasi Kekerasan Seksusal',
            'konsultasiJenisKs' => $konsultasi,
        ];
        return view('admin/hasil-konsultasi-jenis-ks/index', $data);
    }

    public function detail($id)
    {
        $konsultasi = $this->konsultasiJenisKs->find($id);
       
        $detailKonsutasi = $this->detailKonsultasiJenisKs->withPertanyaan()->withDetailBasisAturanJenisKs()->withBasisAturanJenisKs()->withJenisKs()->where('id_konsul_jenis', $id)->findAll();

        $data = [
            'title' => 'Detail Konsultasi',
            'konsultasi' => $konsultasi,
            'detailKonsultasi' => $detailKonsutasi,
        ];
        
        return view('admin/hasil-konsultasi-jenis-ks/detail', $data);
    }

    public function hapus($id)
    {
        // Proses hapus data
        $this->konsultasiJenisKs->delete($id);

        if($this->detailKonsultasiJenisKs->where('id_konsul_jenis', $id)->countAll() > 0){
            $this->detailKonsultasiJenisKs->where('id_konsul_jenis', $id)->delete();
        }

        session()->setFlashdata('status', 'success');
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/admin/hasil-konsultasi-jenis-ks');
    }
}
