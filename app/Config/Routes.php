<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Autentikasi::index');
$routes->post('/', 'Autentikasi::login');
$routes->get('/logout', 'Autentikasi::logout');

$routes->get('/daftar', 'Autentikasi::daftar');
$routes->post('/daftar', 'Autentikasi::prosesDaftar');

$routes->group('admin', ['namespace' => 'App\controllers\Admin'], function ($routes) {
    $routes->get('dashboard', 'Dashboard::index');
    $routes->get('user', 'User::index');
    $routes->get('user/tambah', 'User::tambah');
    $routes->post('user/tambah', 'User::tambah');
    $routes->get('user/edit/(:num)', 'User::edit/$1');
    $routes->post('user/edit/(:num)', 'User::edit/$1');
    $routes->get('user/hapus/(:num)', 'User::hapus/$1');

    $routes->get('pertanyaan', 'Pertanyaan::index');
    $routes->get('pertanyaan/tambah', 'Pertanyaan::tambah');
    $routes->post('pertanyaan/tambah', 'Pertanyaan::tambah');
    $routes->get('pertanyaan/edit/(:num)', 'Pertanyaan::edit/$1');
    $routes->post('pertanyaan/edit/(:num)', 'Pertanyaan::edit/$1');
    $routes->get('pertanyaan/hapus/(:num)', 'Pertanyaan::hapus/$1');

    $routes->get('pertanyaan-pelanggaran', 'PertanyaanPelanggaran::index');
    $routes->get('pertanyaan-pelanggaran/tambah', 'PertanyaanPelanggaran::tambah');
    $routes->post('pertanyaan-pelanggaran/tambah', 'PertanyaanPelanggaran::tambah');
    $routes->get('pertanyaan-pelanggaran/edit/(:num)', 'PertanyaanPelanggaran::edit/$1');
    $routes->post('pertanyaan-pelanggaran/edit/(:num)', 'PertanyaanPelanggaran::edit/$1');
    $routes->get('pertanyaan-pelanggaran/hapus/(:num)', 'PertanyaanPelanggaran::hapus/$1');

    $routes->get('jenis-ks', 'JenisKekersanSeksual::index');
    $routes->get('jenis-ks/tambah', 'JenisKekersanSeksual::tambah');
    $routes->post('jenis-ks/tambah', 'JenisKekersanSeksual::tambah');
    $routes->get('jenis-ks/edit/(:num)', 'JenisKekersanSeksual::edit/$1');
    $routes->post('jenis-ks/edit/(:num)', 'JenisKekersanSeksual::edit/$1');
    $routes->get('jenis-ks/hapus/(:num)', 'JenisKekersanSeksual::hapus/$1');

    $routes->get('sanksi-administratif', 'SanksiAdministratif::index');
    $routes->get('sanksi-administratif/tambah', 'SanksiAdministratif::tambah');
    $routes->post('sanksi-administratif/tambah', 'SanksiAdministratif::tambah');
    $routes->get('sanksi-administratif/edit/(:num)', 'SanksiAdministratif::edit/$1');
    $routes->post('sanksi-administratif/edit/(:num)', 'SanksiAdministratif::edit/$1');
    $routes->get('sanksi-administratif/hapus/(:num)', 'SanksiAdministratif::hapus/$1');

    $routes->get('basis-aturan-jenis-ks', 'BasisAturanJenisKs::index');
    $routes->get('basis-aturan-jenis-ks/tambah', 'BasisAturanJenisKs::tambah');
    $routes->post('basis-aturan-jenis-ks/tambah', 'BasisAturanJenisKs::tambah');
    $routes->get('basis-aturan-jenis-ks/edit/(:num)', 'BasisAturanJenisKs::edit/$1');
    $routes->get('basis-aturan-jenis-ks/detail/(:num)', 'BasisAturanJenisKs::detail/$1');
    $routes->post('basis-aturan-jenis-ks/edit/(:num)', 'BasisAturanJenisKs::edit/$1');
    $routes->get('basis-aturan-jenis-ks/hapus/(:num)', 'BasisAturanJenisKs::hapus/$1');


    $routes->get('basis-aturan-sanksi', 'BasisAturanSanksi::index');
    $routes->get('basis-aturan-sanksi/tambah', 'BasisAturanSanksi::tambah');
    $routes->post('basis-aturan-sanksi/tambah', 'BasisAturanSanksi::tambah');
    $routes->get('basis-aturan-sanksi/edit/(:num)', 'BasisAturanSanksi::edit/$1');
    $routes->get('basis-aturan-sanksi/detail/(:num)', 'BasisAturanSanksi::detail/$1');
    $routes->post('basis-aturan-sanksi/edit/(:num)', 'BasisAturanSanksi::edit/$1');
    $routes->get('basis-aturan-sanksi/hapus/(:num)', 'BasisAturanSanksi::hapus/$1');

    $routes->get('konsultasi-jenis-ks', 'KonsultasiJenisKs::index');
    $routes->post('konsultasi-jenis-ks/tambah', 'KonsultasiJenisKs::index');
    $routes->get('konsultasi-jenis-ks/hasil/(:num)', 'KonsultasiJenisKs::hasil/$1');

    $routes->get('hasil-konsultasi-jenis-ks', 'HasilKonsultasiJenisKs::index');
    $routes->get('hasil-konsultasi-jenis-ks/detail/(:num)', 'HasilKonsultasiJenisKs::detail/$1');
    $routes->get('hasil-konsultasi-jenis-ks/hapus/(:num)', 'HasilKonsultasiJenisKs::hapus/$1');

    $routes->get('konsultasi-sanksi', 'KonsultasiSanksi::index');
    $routes->post('konsultasi-sanksi/tambah', 'KonsultasiSanksi::index');
    $routes->get('konsultasi-sanksi/hasil/(:num)', 'KonsultasiSanksi::hasil/$1');

    $routes->get('hasil-konsultasi-sanksi', 'HasilKonsultasiSanksi::index');
    $routes->get('hasil-konsultasi-sanksi/detail/(:num)', 'HasilKonsultasiSanksi::detail/$1');
    $routes->get('hasil-konsultasi-sanksi/hapus/(:num)', 'HasilKonsultasiSanksi::hapus/$1');
});