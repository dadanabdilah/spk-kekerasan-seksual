<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/bootstrap.min.css" >
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/dataTables.bootstrap4.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title><?= $title ?? '' ?></title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary p-3">
      <div class="container">
        <a class="navbar-brand" href="#">SPFC</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="<?= base_url('admin/dashboard') ?>">Home</a>
            </li>
            <?php if(session()->get('role') == 'satgas_ppks') { ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('admin/user') ?>">Data User</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                Diagnosa
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="<?= base_url('admin/diagnosa') ?>">Diagnosa Kekerasan Seksual</a>
                <a class="dropdown-item" href="<?= base_url('admin/diagnosa-pelanggaran') ?>">Diagnosa Pelanggaran</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                Jenis
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="<?= base_url('admin/jenis-ks') ?>">Jenis Kekerasan Seksual</a>
                <a class="dropdown-item" href="<?= base_url('admin/sanksi-administratif') ?>">Jenis Sanksi Administratif</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                Basis Aturan
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="<?= base_url('admin/basis-aturan-jenis-ks') ?>">Basis Aturan Kekerasan Seksual</a>
                <a class="dropdown-item" href="<?= base_url('admin/basis-aturan-sanksi') ?>">Basis Aturan Sanksi Administratif</a>
              </div>
            </li>
            <?php } ?>
            <?php if(session()->get('role') != 'pimpinan_pt') { ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                Konsultasi
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="<?= base_url('admin/konsultasi-jenis-ks') ?>">Konsultasi Kekerasan Seksual</a>
                <a class="dropdown-item" href="<?= base_url('admin/konsultasi-sanksi') ?>">Konsultasi Sanksi Administratif</a>
              </div>
            </li>
            <?php } ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                Hasil
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="<?= base_url('admin/hasil-konsultasi-jenis-ks') ?>">Hasil Konsultasi Kekerasan Seksual</a>
                <a class="dropdown-item" href="<?= base_url('admin/hasil-konsultasi-sanksi') ?>">Hasil Konsultasi Sanksi Administratif</a>
                <a class="dropdown-item" href="<?= base_url('admin/hasil-laporan') ?>">Hasil Laporan Jenis Kekerasan Seksual</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                Laporan
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="<?= base_url('admin/laporan/konsul-ks') ?>">Laporan Konsultasi Kekerasan Seksual</a>
                <a class="dropdown-item" href="<?= base_url('admin/laporan/konsul-sanksi') ?>">Laporan Konsultasi Sanksi Administratif</a>
                <a class="dropdown-item" href="<?= base_url('admin/laporan/pelaporan-konsul-jenisks') ?>">Laporan Pelaporan Konsultasi Jenis Kekerasan Seksual</a>
              </div>
            </li>
           <?php if(session()->get('loggedIn') == true) { ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('logout') ?>">Logout</a>
            </li>
           <?php } ?>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container mt-4 mb-5">
      <?= $this->renderSection('content') ?>
    </div>

    <script src="<?= base_url('assets/') ?>js/jquery.slim.min.js" ></script>
    <script src="<?= base_url('assets/') ?>js/bootstrap.bundle.min.js" ></script>
    <script src="<?= base_url('assets/') ?>js/dataTables.js" ></script>
    <script src="<?= base_url('assets/') ?>js/dataTables.bootstrap4.js" ></script>
    <?= $this->renderSection('js') ?>
  </body>
</html>