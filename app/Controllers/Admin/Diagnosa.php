<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class Diagnosa extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Diagnosa Kekerasan Seksual',
            'diagnosaKs' => $this->diagnosa->findAll()
        ];
        return view('admin/diagnosa/index', $data);
    }

    public function tambah()
    {
        if($_POST){
            // Proses simpan data
            $this->diagnosa->save([
                'nama_diagnosa' => $this->request->getPost('nama_diagnosa'),
            ]);

            session()->setFlashdata('status', 'success');
            session()->setFlashdata('pesan', 'Data berhasil disimpan');
            return redirect()->to('/admin/diagnosa');
        }

        $data = [
            'title' => 'Tambah Data'
        ];
        return view('admin/diagnosa/tambah', $data);
    }

    public function edit($id)
    {
        if($_POST){
            // Proses update data
            $data = [
                'id_diagnosa' => $id,
                'nama_diagnosa' => $this->request->getPost('nama_diagnosa'),
            ];

            $this->diagnosa->save($data);

            session()->setFlashdata('status', 'success');
            session()->setFlashdata('pesan', 'Data berhasil diupdate');
            return redirect()->to('/admin/diagnosa');
        }

        $data = [
            'title' => 'Edit Data',
            'diagnosaKs' => $this->diagnosa->find($id)
        ];
        
        return view('admin/diagnosa/edit', $data);
    }

    public function hapus($id)
    {
        // Proses hapus data
        $this->diagnosa->delete($id);

        session()->setFlashdata('status', 'success');
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/admin/diagnosa');
    }
}
