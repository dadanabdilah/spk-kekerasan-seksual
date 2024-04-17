<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class JenisKekersanSeksual extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Jenis Kekerasan Seksual',
            'jenisKs' => $this->jenisKs->findAll()
        ];
        return view('admin/jenis-ks/index', $data);
    }

    public function tambah()
    {
        if($_POST){
            // Proses simpan data
            $this->jenisKs->save([
                'nmjenis' => $this->request->getPost('nmjenis'),
                'keterangan' => $this->request->getPost('keterangan'),
                'solusi' => $this->request->getPost('solusi'),
            ]);

            session()->setFlashdata('status', 'success');
            session()->setFlashdata('pesan', 'Data berhasil disimpan');
            return redirect()->to('/admin/jenis-ks');
        }

        $data = [
            'title' => 'Tambah Data'
        ];
        return view('admin/jenis-ks/tambah', $data);
    }

    public function edit($id)
    {
        if($_POST){
            // Proses update data
            $data = [
                'id_jenis' => $id,
                'nmjenis' => $this->request->getPost('nmjenis'),
                'keterangan' => $this->request->getPost('keterangan'),
                'solusi' => $this->request->getPost('solusi'),
            ];

            $this->jenisKs->save($data);

            session()->setFlashdata('status', 'success');
            session()->setFlashdata('pesan', 'Data berhasil diupdate');
            return redirect()->to('/admin/jenis-ks');
        }

        $data = [
            'title' => 'Edit Data',
            'jenisKs' => $this->jenisKs->find($id)
        ];
        
        return view('admin/jenis-ks/edit', $data);
    }

    public function hapus($id)
    {
        // Proses hapus data
        $this->jenisKs->delete($id);

        session()->setFlashdata('status', 'success');
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/admin/jenis-ks');
    }
}
