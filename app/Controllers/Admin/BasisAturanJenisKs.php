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

            foreach ($this->request->getPost('id_diagnosa') as $key => $value) {
                $this->detailBasisAturanJenisKs->save([
                    'id_aturanjenis' => $id_aturanjenis,
                    'id_diagnosa'  => $value
                ]);
            }

            session()->setFlashdata('status', 'success');
            session()->setFlashdata('pesan', 'Data berhasil disimpan');
            return redirect()->to('/admin/basis-aturan-jenis-ks');
        }

        $data = [
            'title' => 'Tambah Data',
            'jenisKs' => $this->jenisKs->where('id_jenis NOT IN(SELECT id_jenis FROM basis_aturan_jenis_kekerasan_seksual)')->findAll(),
            'diagnosa' => $this->diagnosa->where('id_diagnosa NOT IN(SELECT id_diagnosa FROM detail_basis_aturan_jenis_kekerasan_seksual)')->findAll()
        ];
        return view('admin/basis-aturan-jenis-ks/tambah', $data);
    }

    public function detail($id)
    {
        $basisAturan = $this->basisAturanJenisKs->find($id);
       
        $detailBasisAturan = $this->detailBasisAturanJenisKs->select('id_diagnosa')->where('id_aturanjenis', $id)->findAll();

        $rows = [];
        foreach ($detailBasisAturan as $key => $value) {
            $rows[] = $value->id_diagnosa;
        }

        $data = [
            'title' => 'Detail Data',
            'basisAturanJks' => [$basisAturan, $rows],
            'jenisKs' => $this->jenisKs->findAll(),
            'diagnosa' => $this->diagnosa->whereIn('id_diagnosa', $rows)->findAll()
        ];
        
        return view('admin/basis-aturan-jenis-ks/detail', $data);
    }

    public function edit($id)
    {
        if($_POST){
            if($this->detailBasisAturanJenisKs->where('id_aturanjenis', $id)->countAll() > 0){
                $this->detailBasisAturanJenisKs->where('id_aturanjenis', $id)->delete();
            }

            foreach ($this->request->getPost('id_diagnosa') as $key => $value) {
                $this->detailBasisAturanJenisKs->save([
                    'id_aturanjenis' => $id,
                    'id_diagnosa'  => $value
                ]);
            }

            session()->setFlashdata('status', 'success');
            session()->setFlashdata('pesan', 'Data berhasil diupdate');
            return redirect()->to('/admin/basis-aturan-jenis-ks');
        }

        $basisAturan = $this->basisAturanJenisKs->find($id);
        
        $detailBasisAturan = $this->detailBasisAturanJenisKs->select('id_diagnosa')->where('id_aturanjenis', $id)->findAll();

        $idDiagnosa = $this->detailBasisAturanJenisKs->select('id_diagnosa')->where("id_aturanjenis != $id")->findAll();
        $idDiagnosa = array_values(array_column($idDiagnosa, 'id_diagnosa'));

        $rows = [];
        foreach ($detailBasisAturan as $key => $value) {
            $rows[] = $value->id_diagnosa;
        }

        $data = [
            'title' => 'Edit Data',
            'basisAturanJks' => [$basisAturan, $rows],
            'jenisKs' => $this->jenisKs->findAll(),
            'diagnosa' => $this->diagnosa->whereNotIn('id_diagnosa', array_merge([0], $idDiagnosa))->findAll()
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
