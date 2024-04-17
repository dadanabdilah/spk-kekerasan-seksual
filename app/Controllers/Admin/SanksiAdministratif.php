<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class SanksiAdministratif extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Sanksi Administratif',
            'jenisSanksi' => $this->sanksiAdm->findAll()
        ];
        return view('admin/sanksi-administratif/index', $data);
    }

    public function tambah()
    {
        if($_POST){
            // Proses simpan data
            $this->sanksiAdm->save([
                'nmsanksi' => $this->request->getPost('nmsanksi'),
                'keterangan' => $this->request->getPost('keterangan'),
            ]);

            session()->setFlashdata('status', 'success');
            session()->setFlashdata('pesan', 'Data berhasil disimpan');
            return redirect()->to('/admin/sanksi-administratif');
        }

        $data = [
            'title' => 'Tambah Data'
        ];
        return view('admin/sanksi-administratif/tambah', $data);
    }

    public function edit($id)
    {
        if($_POST){
            // Proses update data
            $data = [
                'id_sanksi' => $id,
                'nmsanksi' => $this->request->getPost('nmsanksi'),
                'keterangan' => $this->request->getPost('keterangan'),
            ];

            $this->sanksiAdm->save($data);

            session()->setFlashdata('status', 'success');
            session()->setFlashdata('pesan', 'Data berhasil diupdate');
            return redirect()->to('/admin/sanksi-administratif');
        }

        $data = [
            'title' => 'Edit Data',
            'jenisSanksi' => $this->sanksiAdm->find($id)
        ];
        
        return view('admin/sanksi-administratif/edit', $data);
    }

    public function hapus($id)
    {
        // Proses hapus data
        $this->sanksiAdm->delete($id);

        session()->setFlashdata('status', 'success');
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/admin/sanksi-administratif');
    }
}
