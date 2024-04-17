<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class BasisAturanSanksi extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Basis Aturan Sanksi Administratif',
            'basisAturanSanksi' => $this->basisAturanSanksi->withSanksi()->findAll()
        ];
        return view('admin/basis-aturan-sanksi/index', $data);
    }

    public function tambah()
    {
        if($_POST){
            // Proses simpan data
            $this->basisAturanSanksi->save([
                'id_sanksi' => $this->request->getPost('id_sanksi'),
            ]);

            $id_aturansanksi = $this->basisAturanSanksi->getInsertId();

            foreach ($this->request->getPost('id_pelanggaran') as $key => $value) {
                $this->detailBasisAturanSanksi->save([
                    'id_aturansanksi' => $id_aturansanksi,
                    'id_pelanggaran'  => $value
                ]);
            }

            session()->setFlashdata('status', 'success');
            session()->setFlashdata('pesan', 'Data berhasil disimpan');
            return redirect()->to('/admin/basis-aturan-sanksi');
        }

        $data = [
            'title' => 'Tambah Data',
            'sanksiAdministratif' => $this->sanksiAdm->where('id_sanksi NOT IN(SELECT id_sanksi FROM basis_aturan_sanksi)')->findAll(),
            'pelanggaran' => $this->pelanggaran->findAll()
        ];
        return view('admin/basis-aturan-sanksi/tambah', $data);
    }

    public function detail($id)
    {
        $basisAturan = $this->basisAturanSanksi->find($id);
       
        $detailBasisAturan = $this->detailBasisAturanSanksi->select('id_pelanggaran')->where('id_aturansanksi', $id)->findAll();

        $rows = [];
        foreach ($detailBasisAturan as $key => $value) {
            $rows[] = $value->id_pelanggaran;
        }

        $data = [
            'title' => 'Detail Data',
            'basisAturanSanksi' => [$basisAturan, $rows],
            'sanksiAdm' => $this->sanksiAdm->findAll(),
            'pelanggaran' => $this->pelanggaran->whereIn('id_pelanggaran', $rows)->findAll()
        ];
        
        return view('admin/basis-aturan-sanksi/detail', $data);
    }

    public function edit($id)
    {
        if($_POST){
            // Proses update data
            $this->detailBasisAturanSanksi->where('id_aturansanksi', $id)->delete();

            foreach ($this->request->getPost('id_pelanggaran') as $key => $value) {
                $this->detailBasisAturanSanksi->save([
                    'id_aturansanksi' => $id,
                    'id_pelanggaran'  => $value
                ]);
            }

            session()->setFlashdata('status', 'success');
            session()->setFlashdata('pesan', 'Data berhasil diupdate');
            return redirect()->to('/admin/basis-aturan-sanksi');
        }

        $basisAturan = $this->basisAturanSanksi->find($id);
       
        $detailBasisAturan = $this->detailBasisAturanSanksi->select('id_pelanggaran')->where('id_aturansanksi', $id)->findAll();

        $rows = [];
        foreach ($detailBasisAturan as $key => $value) {
            $rows[] = $value->id_pelanggaran;
        }

        $data = [
            'title' => 'Edit Data',
            'basisAturanSanksi' => [$basisAturan, $rows],
            'sanksiAdm' => $this->sanksiAdm->findAll(),
            'pelanggaran' => $this->pelanggaran->findAll()
        ];
        
        return view('admin/basis-aturan-sanksi/edit', $data);
    }

    public function hapus($id)
    {
        if($this->detailBasisAturanSanksi->where('id_aturansanksi', $id)->countAll() > 0){
            $this->detailBasisAturanSanksi->where('id_aturansanksi', $id)->delete();
            session()->setFlashdata('status', 'danger');
            session()->setFlashdata('pesan', 'Data tidak bisa dihapus');
            return redirect()->to('/admin/basis-aturan-sanksi');
        }
        // Proses hapus data
        $this->basisAturanSanksi->delete($id);

        session()->setFlashdata('status', 'success');
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/admin/basis-aturan-sanksi');
    }
}
