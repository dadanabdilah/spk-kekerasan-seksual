<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class LaporKonsultasiJenisKs extends BaseController
{

    public function index()
    {
        if($_POST){

            $ekstensi  = ['png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG', 'mp4', 'MP4'];
            $filename  = $_FILES['bukti']['name'];
            $ukuran    = $_FILES['bukti']['size'];
            $temp_name = $_FILES['bukti']['tmp_name']; 
            $ext       = pathinfo($filename, PATHINFO_EXTENSION);

            if(!in_array($ext,$ekstensi) ) {
                $data = [   
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
    
                            'status' => 'warning',
                            'pesan'  => 'Ektensi foto salah, ekstensi foto yang diperbolehkan .png | .jpg | .jpeg',
                        ];
    
                session()->setFlashdata($data);
                return redirect()->to('admin/lapor-konsul-jenis-ks');
            }

            if (file_exists('assets/bukti/' .$filename)) {
                unlink('assets/bukti/' .$filename);
            }
    
            move_uploaded_file($temp_name, 'assets/bukti/' . $filename);
            
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
                'bukti'      => $filename,
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
