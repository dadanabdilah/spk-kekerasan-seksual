<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class LaporKonsultasiJenisKs extends BaseController
{

    public function index()
    {
        if($_POST){
            // Proses simpan data
            $this->laporKonsultasiJenisKs->save([
                'nama_pelapor' => $this->request->getPost('nama_pelapor'),
                'nama_pelaku' => $this->request->getPost('nama_pelaku'),
                'tlp' => $this->request->getPost('tlp'),
                'email' => $this->request->getPost('email'),
                'alamat' => $this->request->getPost('alamat'),
                'jenis_ks' => $this->request->getPost('jenis_ks'),
                'cerita_peristiswa' => $this->request->getPost('cerita_peristiswa'),
                'disabilitas' => $this->request->getPost('disabilitas'),
                'status' => $this->request->getPost('status'),
                'alasan_pengaduan' => $this->request->getPost('alasan_pengaduan'),
                'no_hp_lain' => $this->request->getPost('no_hp_lain'),
                'email_lain' => $this->request->getPost('email_lain'),
                'tgl' => date('Y-m-d'),
                'id_user' => session('id_user')
            ]);

            session()->setFlashdata('status', 'success');
            session()->setFlashdata('pesan', 'Laporan berhasil disimpan');

            return redirect()->to('/admin/dashboard');
        }


        $data = [
            'title' => 'Lapor',
        ];
        return view('admin/lapor-konsultasi-jenis-ks/tambah', $data);
    }
}
