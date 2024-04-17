<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class KonsultasiJenisKs extends BaseController
{

    public function index()
    {
        if($_POST){
            // Proses simpan data
            $this->konsultasiJenisKs->save([
                'nmpelapor' => $this->request->getPost('nmpelapor'),
                'tlp' => $this->request->getPost('tlp'),
                'alamat' => $this->request->getPost('alamat'),
                'kondisi' => $this->request->getPost('kondisi'),
                'tgl' => date('Y-m-d'),
                'id_user' => session('id_user')
            ]);

            $id_konsul_jenis = $this->konsultasiJenisKs->getInsertId();

            foreach ($this->request->getPost('id_pertanyaan') as $key => $value) {
                $this->detailKonsultasiJenisKs->save([
                    'id_konsul_jenis' => $id_konsul_jenis,
                    'id_pertanyaan'  => $value
                ]);
            }

            session()->setFlashdata('status', 'success');
            session()->setFlashdata('pesan', 'Data berhasil disimpan');
            return redirect()->to('/admin/konsultasi-jenis-ks/hasil/' . $id_konsul_jenis);
        }

        $data = [
            'title' => 'Konsultasi',
            'pertanyaan' => $this->pertanyaan->findAll()
        ];
        return view('admin/konsultasi-jenis-ks/tambah', $data);
    }

    public function hasil($id)
    {
        $konsultasi = $this->konsultasiJenisKs->find($id);
       
        $detailKonsutasi = $this->detailKonsultasiJenisKs->withPertanyaan()->withDetailBasisAturanJenisKs()->withBasisAturanJenisKs()->withJenisKs()->where('id_konsul_jenis', $id)->findAll();

        $data = [
            'title' => 'Hasil Konsultasi',
            'konsultasi' => $konsultasi,
            'detailKonsultasi' => $detailKonsutasi,
        ];
        
        return view('admin/konsultasi-jenis-ks/hasil', $data);
    }
}
