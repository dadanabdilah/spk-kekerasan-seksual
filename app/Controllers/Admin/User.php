<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class User extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Data User',
            'users' => $this->user->findAll()
        ];
        return view('admin/user/index', $data);
    }

    public function tambah()
    {
        if($_POST){
            // Proses simpan data
            $this->user->save([
                'nama_user' => $this->request->getPost('nama_user'),
                'email' => $this->request->getPost('email'),
                'password' => md5($this->request->getPost('password')),
                'role' => $this->request->getPost('role'),
                'tanggal_dibuat' => date('Y-m-d')
            ]);

            session()->setFlashdata('status', 'success');
            session()->setFlashdata('pesan', 'Data berhasil disimpan');
            return redirect()->to('/admin/user');
        }

        $data = [
            'title' => 'Tambah Data User'
        ];
        return view('admin/user/tambah', $data);
    }

    public function edit($id)
    {
        if($_POST){
            // Proses update data
            if($this->request->getPost('password') == ''){
                $data = [
                    'nama_user' => $this->request->getPost('nama_user'),
                    'email' => $this->request->getPost('email'),
                    'role' => $this->request->getPost('role')
                ];
            } else {
                $data = [
                    'nama_user' => $this->request->getPost('nama_user'),
                    'email' => $this->request->getPost('email'),
                    'password' => md5($this->request->getPost('password')),
                    'role' => $this->request->getPost('role')
                ];
            }

            $this->user->update($id, $data);

            session()->setFlashdata('status', 'success');
            session()->setFlashdata('pesan', 'Data berhasil diupdate');
            return redirect()->to('/admin/user');
        }

        $data = [
            'title' => 'Edit Data User',
            'user' => $this->user->find($id)
        ];
        
        return view('admin/user/edit', $data);
    }

    public function hapus($id)
    {
        // Proses hapus data
        $this->user->delete($id);

        session()->setFlashdata('status', 'success');
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/admin/user');
    }
}
