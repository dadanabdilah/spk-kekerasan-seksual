<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class KonsultasiSanksi extends BaseController
{

    public function index()
    {
        if($_POST){
            // Proses simpan data
            $this->konsultasiSanksiAdministratif->save([
                'nmpelapor' => $this->request->getPost('nmpelapor'),
                'tlp' => $this->request->getPost('tlp'),
                'alamat' => $this->request->getPost('alamat'),
                'status' => $this->request->getPost('status'),
                'tgl' => date('Y-m-d'),
                'id_user' => session('id_user')
            ]);

            $id_konsul_sanksi = $this->konsultasiSanksiAdministratif->getInsertId();

            foreach ($this->request->getPost('id_pelanggaran') as $key => $value) {
                $this->detailKonsultasiSanksiAdministratif->save([
                    'id_konsul_sanksi' => $id_konsul_sanksi,
                    'id_pelanggaran'  => $value
                ]);
            }

            session()->setFlashdata('status', 'success');
            session()->setFlashdata('pesan', 'Data berhasil disimpan');
            return redirect()->to('/admin/konsultasi-sanksi/hasil/' . $id_konsul_sanksi);
        }

        $pelanggaran = [];
        $no = 1;
        foreach ($this->pelanggaran->findAll() as $key => $value) {
            $pelanggaran[$key] = (object) ['id_pelanggaran' => $value->id_pelanggaran, 'nama_pelanggaran' => $value->nama_pelanggaran, 'no' => $no++];
        }

        $data = [
            'title' => 'Konsultasi Sanksi Administratif',
            'pelanggaran' => $pelanggaran
        ];
        return view('admin/konsultasi-sanksi/tambah', $data);
    }

    public function hasil($id)
    {
        $konsultasi = $this->konsultasiSanksiAdministratif->find($id);
       
        $detailKonsutasi = $this->detailKonsultasiSanksiAdministratif->withPelanggaran()->withDetailBasisAturanSanksi()->withBasisAturanSanksi()->withSanksiAdministratif()->where('id_konsul_sanksi', $id)->findAll();

        $data = [
            'title' => 'Hasil Konsultasi',
            'konsultasi' => $konsultasi,
            'detailKonsultasi' => $detailKonsutasi,
        ];
        
        return view('admin/konsultasi-sanksi/hasil', $data);
    }
}
