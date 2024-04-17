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

$routes->get('admin/dashboard', 'Admin\Dashboard::index');
$routes->get('admin/user', 'Admin\User::index');
$routes->get('admin/user/tambah', 'Admin\User::tambah');
$routes->post('admin/user/tambah', 'Admin\User::tambah');
$routes->get('admin/user/edit/(:num)', 'Admin\User::edit/$1');
$routes->post('admin/user/edit/(:num)', 'Admin\User::edit/$1');
$routes->get('admin/user/hapus/(:num)', 'Admin\User::hapus/$1');

$routes->get('admin/diagnosa', 'Admin\Diagnosa::index');
$routes->get('admin/diagnosa/tambah', 'Admin\Diagnosa::tambah');
$routes->post('admin/diagnosa/tambah', 'Admin\Diagnosa::tambah');
$routes->get('admin/diagnosa/edit/(:num)', 'Admin\Diagnosa::edit/$1');
$routes->post('admin/diagnosa/edit/(:num)', 'Admin\Diagnosa::edit/$1');
$routes->get('admin/diagnosa/hapus/(:num)', 'Admin\Diagnosa::hapus/$1');

$routes->get('admin/diagnosa-pelanggaran', 'Admin\DiagnosaPelanggaran::index');
$routes->get('admin/diagnosa-pelanggaran/tambah', 'Admin\DiagnosaPelanggaran::tambah');
$routes->post('admin/diagnosa-pelanggaran/tambah', 'Admin\DiagnosaPelanggaran::tambah');
$routes->get('admin/diagnosa-pelanggaran/edit/(:num)', 'Admin\DiagnosaPelanggaran::edit/$1');
$routes->post('admin/diagnosa-pelanggaran/edit/(:num)', 'Admin\DiagnosaPelanggaran::edit/$1');
$routes->get('admin/diagnosa-pelanggaran/hapus/(:num)', 'Admin\DiagnosaPelanggaran::hapus/$1');

$routes->get('admin/jenis-ks', 'Admin\JenisKekersanSeksual::index');
$routes->get('admin/jenis-ks/tambah', 'Admin\JenisKekersanSeksual::tambah');
$routes->post('admin/jenis-ks/tambah', 'Admin\JenisKekersanSeksual::tambah');
$routes->get('admin/jenis-ks/edit/(:num)', 'Admin\JenisKekersanSeksual::edit/$1');
$routes->post('admin/jenis-ks/edit/(:num)', 'Admin\JenisKekersanSeksual::edit/$1');
$routes->get('admin/jenis-ks/hapus/(:num)', 'Admin\JenisKekersanSeksual::hapus/$1');

$routes->get('admin/sanksi-administratif', 'Admin\SanksiAdministratif::index');
$routes->get('admin/sanksi-administratif/tambah', 'Admin\SanksiAdministratif::tambah');
$routes->post('admin/sanksi-administratif/tambah', 'Admin\SanksiAdministratif::tambah');
$routes->get('admin/sanksi-administratif/edit/(:num)', 'Admin\SanksiAdministratif::edit/$1');
$routes->post('admin/sanksi-administratif/edit/(:num)', 'Admin\SanksiAdministratif::edit/$1');
$routes->get('admin/sanksi-administratif/hapus/(:num)', 'Admin\SanksiAdministratif::hapus/$1');

$routes->get('admin/basis-aturan-jenis-ks', 'Admin\BasisAturanJenisKs::index');
$routes->get('admin/basis-aturan-jenis-ks/tambah', 'Admin\BasisAturanJenisKs::tambah');
$routes->post('admin/basis-aturan-jenis-ks/tambah', 'Admin\BasisAturanJenisKs::tambah');
$routes->get('admin/basis-aturan-jenis-ks/edit/(:num)', 'Admin\BasisAturanJenisKs::edit/$1');
$routes->get('admin/basis-aturan-jenis-ks/detail/(:num)', 'Admin\BasisAturanJenisKs::detail/$1');
$routes->post('admin/basis-aturan-jenis-ks/edit/(:num)', 'Admin\BasisAturanJenisKs::edit/$1');
$routes->get('admin/basis-aturan-jenis-ks/hapus/(:num)', 'Admin\BasisAturanJenisKs::hapus/$1');


$routes->get('admin/basis-aturan-sanksi', 'Admin\BasisAturanSanksi::index');
$routes->get('admin/basis-aturan-sanksi/tambah', 'Admin\BasisAturanSanksi::tambah');
$routes->post('admin/basis-aturan-sanksi/tambah', 'Admin\BasisAturanSanksi::tambah');
$routes->get('admin/basis-aturan-sanksi/edit/(:num)', 'Admin\BasisAturanSanksi::edit/$1');
$routes->get('admin/basis-aturan-sanksi/detail/(:num)', 'Admin\BasisAturanSanksi::detail/$1');
$routes->post('admin/basis-aturan-sanksi/edit/(:num)', 'Admin\BasisAturanSanksi::edit/$1');
$routes->get('admin/basis-aturan-sanksi/hapus/(:num)', 'Admin\BasisAturanSanksi::hapus/$1');

$routes->get('admin/konsultasi-jenis-ks', 'Admin\KonsultasiJenisKs::index');
$routes->post('admin/konsultasi-jenis-ks/tambah', 'Admin\KonsultasiJenisKs::index');
$routes->get('admin/konsultasi-jenis-ks/hasil/(:num)', 'Admin\KonsultasiJenisKs::hasil/$1');

$routes->get('admin/hasil-konsultasi-jenis-ks', 'Admin\HasilKonsultasiJenisKs::index');
$routes->get('admin/hasil-konsultasi-jenis-ks/detail/(:num)', 'Admin\HasilKonsultasiJenisKs::detail/$1');
$routes->get('admin/hasil-konsultasi-jenis-ks/hapus/(:num)', 'Admin\HasilKonsultasiJenisKs::hapus/$1');

$routes->get('admin/konsultasi-sanksi', 'Admin\KonsultasiSanksi::index');
$routes->post('admin/konsultasi-sanksi/tambah', 'Admin\KonsultasiSanksi::index');
$routes->get('admin/konsultasi-sanksi/hasil/(:num)', 'Admin\KonsultasiSanksi::hasil/$1');

$routes->get('admin/hasil-konsultasi-sanksi', 'Admin\HasilKonsultasiSanksi::index');
$routes->get('admin/hasil-konsultasi-sanksi/detail/(:num)', 'Admin\HasilKonsultasiSanksi::detail/$1');
$routes->get('admin/hasil-konsultasi-sanksi/hapus/(:num)', 'Admin\HasilKonsultasiSanksi::hapus/$1');

// $routes->group('admin', ['namespace' => 'App\controllers\Admin'], function ($routes) {
//     $routes->get('dashboard', 'Dashboard::index');
//     $routes->get('user', 'User::index');
//     $routes->get('user/tambah', 'User::tambah');
//     $routes->post('user/tambah', 'User::tambah');
//     $routes->get('user/edit/(:num)', 'User::edit/$1');
//     $routes->post('user/edit/(:num)', 'User::edit/$1');
//     $routes->get('user/hapus/(:num)', 'User::hapus/$1');

//     $routes->get('pertanyaan', 'Pertanyaan::index');
//     $routes->get('pertanyaan/tambah', 'Pertanyaan::tambah');
//     $routes->post('pertanyaan/tambah', 'Pertanyaan::tambah');
//     $routes->get('pertanyaan/edit/(:num)', 'Pertanyaan::edit/$1');
//     $routes->post('pertanyaan/edit/(:num)', 'Pertanyaan::edit/$1');
//     $routes->get('pertanyaan/hapus/(:num)', 'Pertanyaan::hapus/$1');

//     $routes->get('pertanyaan-pelanggaran', 'PertanyaanPelanggaran::index');
//     $routes->get('pertanyaan-pelanggaran/tambah', 'PertanyaanPelanggaran::tambah');
//     $routes->post('pertanyaan-pelanggaran/tambah', 'PertanyaanPelanggaran::tambah');
//     $routes->get('pertanyaan-pelanggaran/edit/(:num)', 'PertanyaanPelanggaran::edit/$1');
//     $routes->post('pertanyaan-pelanggaran/edit/(:num)', 'PertanyaanPelanggaran::edit/$1');
//     $routes->get('pertanyaan-pelanggaran/hapus/(:num)', 'PertanyaanPelanggaran::hapus/$1');

//     $routes->get('jenis-ks', 'JenisKekersanSeksual::index');
//     $routes->get('jenis-ks/tambah', 'JenisKekersanSeksual::tambah');
//     $routes->post('jenis-ks/tambah', 'JenisKekersanSeksual::tambah');
//     $routes->get('jenis-ks/edit/(:num)', 'JenisKekersanSeksual::edit/$1');
//     $routes->post('jenis-ks/edit/(:num)', 'JenisKekersanSeksual::edit/$1');
//     $routes->get('jenis-ks/hapus/(:num)', 'JenisKekersanSeksual::hapus/$1');

//     $routes->get('sanksi-administratif', 'SanksiAdministratif::index');
//     $routes->get('sanksi-administratif/tambah', 'SanksiAdministratif::tambah');
//     $routes->post('sanksi-administratif/tambah', 'SanksiAdministratif::tambah');
//     $routes->get('sanksi-administratif/edit/(:num)', 'SanksiAdministratif::edit/$1');
//     $routes->post('sanksi-administratif/edit/(:num)', 'SanksiAdministratif::edit/$1');
//     $routes->get('sanksi-administratif/hapus/(:num)', 'SanksiAdministratif::hapus/$1');

//     $routes->get('basis-aturan-jenis-ks', 'BasisAturanJenisKs::index');
//     $routes->get('basis-aturan-jenis-ks/tambah', 'BasisAturanJenisKs::tambah');
//     $routes->post('basis-aturan-jenis-ks/tambah', 'BasisAturanJenisKs::tambah');
//     $routes->get('basis-aturan-jenis-ks/edit/(:num)', 'BasisAturanJenisKs::edit/$1');
//     $routes->get('basis-aturan-jenis-ks/detail/(:num)', 'BasisAturanJenisKs::detail/$1');
//     $routes->post('basis-aturan-jenis-ks/edit/(:num)', 'BasisAturanJenisKs::edit/$1');
//     $routes->get('basis-aturan-jenis-ks/hapus/(:num)', 'BasisAturanJenisKs::hapus/$1');


//     $routes->get('basis-aturan-sanksi', 'BasisAturanSanksi::index');
//     $routes->get('basis-aturan-sanksi/tambah', 'BasisAturanSanksi::tambah');
//     $routes->post('basis-aturan-sanksi/tambah', 'BasisAturanSanksi::tambah');
//     $routes->get('basis-aturan-sanksi/edit/(:num)', 'BasisAturanSanksi::edit/$1');
//     $routes->get('basis-aturan-sanksi/detail/(:num)', 'BasisAturanSanksi::detail/$1');
//     $routes->post('basis-aturan-sanksi/edit/(:num)', 'BasisAturanSanksi::edit/$1');
//     $routes->get('basis-aturan-sanksi/hapus/(:num)', 'BasisAturanSanksi::hapus/$1');

//     $routes->get('konsultasi-jenis-ks', 'KonsultasiJenisKs::index');
//     $routes->post('konsultasi-jenis-ks/tambah', 'KonsultasiJenisKs::index');
//     $routes->get('konsultasi-jenis-ks/hasil/(:num)', 'KonsultasiJenisKs::hasil/$1');

//     $routes->get('hasil-konsultasi-jenis-ks', 'HasilKonsultasiJenisKs::index');
//     $routes->get('hasil-konsultasi-jenis-ks/detail/(:num)', 'HasilKonsultasiJenisKs::detail/$1');
//     $routes->get('hasil-konsultasi-jenis-ks/hapus/(:num)', 'HasilKonsultasiJenisKs::hapus/$1');

//     $routes->get('konsultasi-sanksi', 'KonsultasiSanksi::index');
//     $routes->post('konsultasi-sanksi/tambah', 'KonsultasiSanksi::index');
//     $routes->get('konsultasi-sanksi/hasil/(:num)', 'KonsultasiSanksi::hasil/$1');

//     $routes->get('hasil-konsultasi-sanksi', 'HasilKonsultasiSanksi::index');
//     $routes->get('hasil-konsultasi-sanksi/detail/(:num)', 'HasilKonsultasiSanksi::detail/$1');
//     $routes->get('hasil-konsultasi-sanksi/hapus/(:num)', 'HasilKonsultasiSanksi::hapus/$1');
// });