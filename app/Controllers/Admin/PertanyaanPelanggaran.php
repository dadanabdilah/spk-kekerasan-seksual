<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class PertanyaanPelanggaran extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Pertanyaan Pelanggaran',
            'pertanyaanPelanggaran' => $this->pelanggaran->findAll()
        ];
        return view('admin/pertanyaan-pelanggaran/index', $data);
    }

    public function tambah()
    {
        if($_POST){
            // Proses simpan data
            $this->pelanggaran->save([
                'nama_pelanggaran' => $this->request->getPost('nama_pelanggaran'),
            ]);

            session()->setFlashdata('status', 'success');
            session()->setFlashdata('pesan', 'Data berhasil disimpan');
            return redirect()->to('/admin/pertanyaan-pelanggaran');
        }

        $data = [
            'title' => 'Tambah Data'
        ];
        return view('admin/pertanyaan-pelanggaran/tambah', $data);
    }

    public function edit($id)
    {
        if($_POST){
            // Proses update data
            $data = [
                'id_pelanggaran' => $id,
                'nama_pelanggaran' => $this->request->getPost('nama_pelanggaran'),
            ];

            $this->pelanggaran->save($data);

            session()->setFlashdata('status', 'success');
            session()->setFlashdata('pesan', 'Data berhasil diupdate');
            return redirect()->to('/admin/pertanyaan-pelanggaran');
        }

        $data = [
            'title' => 'Edit Data',
            'pertanyaanPelanggaran' => $this->pelanggaran->find($id)
        ];
        
        return view('admin/pertanyaan-pelanggaran/edit', $data);
    }

    public function hapus($id)
    {
        // Proses hapus data
        $this->pelanggaran->delete($id);

        session()->setFlashdata('status', 'success');
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/admin/pertanyaan-pelanggaran');
    }
}
