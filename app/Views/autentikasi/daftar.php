<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/bootstrap.min.css" >
    
    <style>
      body,html {
        height: 100%;
      }
    </style>

    <?= $this->renderSection('css') ?>

    <title><?= $title ?? '' ?></title>
  </head>
  <body class="bg-light">
    <div class="container-fluid h-100">
      <div class="row justify-content-center align-items-center h-100">
        <div class="col col-lg-4">
          <div class="card p-3 shadow-sm border-0">
            <div class="card-header bg-white">
              <h5>Buat Akun</h5>
            </div>
            <div class="card-body">

              <?php if(session('pesan')) { ?>
                <div class="alert alert-<?= session('status') ?> alert-dismissible fade show" role="alert">
                    <strong><?= session('pesan') ?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
              <?php } ?>

              <form action="<?= base_url('daftar') ?>" method="POST">
                <div class="form-group">
                    <input _ngcontent-c0="" class="form-control" placeholder="Nama Lengkap" type="text" name="nama_user" required>
                </div>
                <div class="form-group">
                    <input _ngcontent-c0="" class="form-control" placeholder="Email" type="text" name="email" required>
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Password" type="password" name="password" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                    <a href="<?= base_url() ?>" class="btn btn-outline-primary btn-block">Login</a>
                </div>
              </form>
            </div>
            <div class="card-footer bg-white">
                <!-- <a href="<?= base_url() ?>">Login</a></p> -->
            </div>
          </div>
        </div>
      </div>
    </div>
<!-- 
    <div class="bg-light pt-3 pb-1 mt-5">
      <p class="text-center">© <?= date('Y') ?></p>
    </div> -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="<?= base_url('assets/') ?>js/jquery.slim.min.js"></script>
    <script src="<?= base_url('assets/') ?>js/bootstrap.bundle.min.js"></script>

    <?= $this->renderSection('js') ?>
  </body>
</html>