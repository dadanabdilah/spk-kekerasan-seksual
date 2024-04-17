<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class LoginFilter implements FilterInterface{
    public function before(RequestInterface $request, $arguments = null)
    {
        if(session()->get('loggedIn') != true ){
            session()->setFlashdata('status', 'danger');
            session()->setFlashdata('pesan', 'Anda harus login terlebih dahulu');
            return redirect()->to('/');
        }
    }
    
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        
    }
}

?>