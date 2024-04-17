<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class BasisAturanJenisKs extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Basis Aturan Kekerasan Seksusal',
            'basisAturanJenisKs' => $this->basisAturanJenisKs->withJenis()->findAll()
        ];
        return view('admin/basis-aturan-jenis-ks/index', $data);
    }

    public function tambah()
    {
        if($_POST){
            // Proses simpan data
            $this->basisAturanJenisKs->save([
                'id_jenis' => $this->request->getPost('id_jenis'),
            ]);

            $id_aturanjenis = $this->basisAturanJenisKs->getInsertId();

            foreach ($this->request->getPost('id_pertanyaan') as $key => $value) {
                $this->detailBasisAturanJenisKs->save([
                    'id_aturanjenis' => $id_aturanjenis,
                    'id_pertanyaan'  => $value
                ]);
            }

            session()->setFlashdata('status', 'success');
            session()->setFlashdata('pesan', 'Data berhasil disimpan');
            return redirect()->to('/admin/basis-aturan-jenis-ks');
        }

        $data = [
            'title' => 'Tambah Data',
            'jenisKs' => $this->jenisKs->where('id_jenis NOT IN(SELECT id_jenis FROM basis_aturan_jenis_kekerasan_seksual)')->findAll(),
            'pertanyaan' => $this->pertanyaan->findAll()
        ];
        return view('admin/basis-aturan-jenis-ks/tambah', $data);
    }

    public function detail($id)
    {
        $basisAturan = $this->basisAturanJenisKs->find($id);
       
        $detailBasisAturan = $this->detailBasisAturanJenisKs->select('id_pertanyaan')->where('id_aturanjenis', $id)->findAll();

        $rows = [];
        foreach ($detailBasisAturan as $key => $value) {
            $rows[] = $value->id_pertanyaan;
        }

        $data = [
            'title' => 'Edit Data',
            'basisAturanJks' => [$basisAturan, $rows],
            'jenisKs' => $this->jenisKs->findAll(),
            'pertanyaan' => $this->pertanyaan->whereIn('id_pertanyaan', $rows)->findAll()
        ];
        
        return view('admin/basis-aturan-jenis-ks/detail', $data);
    }

    public function edit($id)
    {
        if($_POST){
            // Proses update data
            $this->detailBasisAturanJenisKs->where('id_aturanjenis', $id)->delete();

            foreach ($this->request->getPost('id_pertanyaan') as $key => $value) {
                $this->detailBasisAturanJenisKs->save([
                    'id_aturanjenis' => $id,
                    'id_pertanyaan'  => $value
                ]);
            }

            session()->setFlashdata('status', 'success');
            session()->setFlashdata('pesan', 'Data berhasil diupdate');
            return redirect()->to('/admin/basis-aturan-jenis-ks');
        }

        $basisAturan = $this->basisAturanJenisKs->find($id);
        
        $detailBasisAturan = $this->detailBasisAturanJenisKs->select('id_pertanyaan')->where('id_aturanjenis', $id)->findAll();

        $rows = [];
        foreach ($detailBasisAturan as $key => $value) {
            $rows[] = $value->id_pertanyaan;
        }

        $data = [
            'title' => 'Edit Data',
            'basisAturanJks' => [$basisAturan, $rows],
            'jenisKs' => $this->jenisKs->findAll(),
            'pertanyaan' => $this->pertanyaan->findAll()
        ];
        
        return view('admin/basis-aturan-jenis-ks/edit', $data);
    }

    public function hapus($id)
    {
        // Proses hapus data
        if($this->detailBasisAturanJenisKs->where('id_aturanjenis', $id)->countAll() > 0){
            $this->detailBasisAturanJenisKs->where('id_aturanjenis', $id)->delete();
        }
        
        $this->basisAturanJenisKs->delete($id);

        session()->setFlashdata('status', 'success');
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/admin/basis-aturan-jenis-ks');
    }
}
