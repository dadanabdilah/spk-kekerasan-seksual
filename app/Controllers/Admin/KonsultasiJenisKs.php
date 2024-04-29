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
                'nama_pelaku' => $this->request->getPost('nama_pelaku'),
                'tlp' => $this->request->getPost('tlp'),
                'alamat' => $this->request->getPost('alamat'),
                'kondisi' => $this->request->getPost('kondisi'),
                'tgl' => date('Y-m-d'),
                'id_user' => session('id_user')
            ]);

            $id_konsul_jenis = $this->konsultasiJenisKs->getInsertId();

            foreach ($this->request->getPost('id_diagnosa') as $key => $value) {
                $this->detailKonsultasiJenisKs->save([
                    'id_konsul_jenis' => $id_konsul_jenis,
                    'id_diagnosa'  => $value
                ]);
            }

            session()->setFlashdata('status', 'success');
            session()->setFlashdata('pesan', 'Data berhasil disimpan');
            return redirect()->to('/admin/konsultasi-jenis-ks/hasil/' . $id_konsul_jenis);
        }

        $diagnosa = [];
        $no = 1;
        foreach ($this->diagnosa->findAll() as $key => $value) {
            $diagnosa[$key] = (object) ['id_diagnosa' => $value->id_diagnosa, 'nama_diagnosa' => $value->nama_diagnosa, 'no' => $no++];
        }

        $data = [
            'title' => 'Konsultasi',
            'diagnosa' => $diagnosa,
        ];
        return view('admin/konsultasi-jenis-ks/tambah', $data);
    }

    public function hasil($id)
    {
        $konsultasi = $this->konsultasiJenisKs->find($id);
       
        $detailKonsutasi = $this->detailKonsultasiJenisKs->withDiagnosa()->withDetailBasisAturanJenisKs()->withBasisAturanJenisKs()->withJenisKs()->where('id_konsul_jenis', $id)->findAll();

        $data = [
            'title' => 'Hasil Konsultasi',
            'konsultasi' => $konsultasi,
            'detailKonsultasi' => $detailKonsutasi,
        ];
        
        return view('admin/konsultasi-jenis-ks/hasil', $data);
    }
}
