<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class Pertanyaan extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Pertanyaan Kekerasan Seksual',
            'pertanyaanKs' => $this->pertanyaan->findAll()
        ];
        return view('admin/pertanyaan/index', $data);
    }

    public function tambah()
    {
        if($_POST){
            // Proses simpan data
            $this->pertanyaan->save([
                'nama_pertanyaan' => $this->request->getPost('nama_pertanyaan'),
            ]);

            session()->setFlashdata('status', 'success');
            session()->setFlashdata('pesan', 'Data berhasil disimpan');
            return redirect()->to('/admin/pertanyaan');
        }

        $data = [
            'title' => 'Tambah Data'
        ];
        return view('admin/pertanyaan/tambah', $data);
    }

    public function edit($id)
    {
        if($_POST){
            // Proses update data
            $data = [
                'id_pertanyaan' => $id,
                'nama_pertanyaan' => $this->request->getPost('nama_pertanyaan'),
            ];

            $this->pertanyaan->save($data);

            session()->setFlashdata('status', 'success');
            session()->setFlashdata('pesan', 'Data berhasil diupdate');
            return redirect()->to('/admin/pertanyaan');
        }

        $data = [
            'title' => 'Edit Data',
            'pertanyaanKs' => $this->pertanyaan->find($id)
        ];
        
        return view('admin/pertanyaan/edit', $data);
    }

    public function hapus($id)
    {
        // Proses hapus data
        $this->pertanyaan->delete($id);

        session()->setFlashdata('status', 'success');
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/admin/pertanyaan');
    }
}
