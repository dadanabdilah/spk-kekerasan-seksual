<?php

namespace App\Controllers;

class Autentikasi extends BaseController
{
    public function index(): string
    {
        return view('autentikasi/login');
    }

    public function login(){
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $data = $this->user->where('email', $email)->first();

        if($data){
            if(md5($password) == $data->password){
                session()->set('id_user', $data->id);
                session()->set('nama_user', $data->nama_user);
                session()->set('email', $data->email);
                session()->set('role', $data->role);
                session()->set('loggedIn', true);

                session()->setFlashdata('status', 'success');
                session()->setFlashdata('pesan', 'Selamat datang ' . $data->nama_user);

                return redirect()->to('/admin/dashboard');
            } else {
                session()->setFlashdata('status', 'danger');
                session()->setFlashdata('pesan', 'Password yang Anda masukkan salah');
                return redirect()->to('/');
            }
        } else {
            session()->setFlashdata('status', 'danger');
            session()->setFlashdata('pesan', 'Email tidak ditemukan');
            return redirect()->to('/');
        }
    }

    public function daftar()
    {
        return view('autentikasi/daftar');
    }

    public function prosesDaftar()
    {
        $data = [
            'nama_user' => $this->request->getPost('nama_user'),
            'email' => $this->request->getPost('email'),
            'password' => md5($this->request->getPost('password')),
            'role' => 'pelapor',
            'tanggal_dibuat' => date('Y-m-d'),
        ];

        $this->user->save($data);

        session()->setFlashdata('status', 'success');
        session()->setFlashdata('pesan', 'Anda berhasil mendaftar');
        return redirect()->to('/');
    }

    public function logout(){
        session()->destroy();

        session()->setFlashdata('status', 'success');
        session()->setFlashdata('pesan', 'Anda berhasil logout');
        return redirect()->to('/');
    }
}
