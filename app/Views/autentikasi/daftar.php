<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    
    <style>
      body,html {
        height: 100%;
      }
    </style>

    <?= $this->renderSection('css') ?>

    <title><?= $title ?? '' ?></title>
  </head>
  <body>

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
                    <input _ngcontent-c0="" class="form-control" placeholder="Nama Lengkap" type="text" name="nama_user">
                </div>
                <div class="form-group">
                    <input _ngcontent-c0="" class="form-control" placeholder="Email" type="text" name="email">
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Password" type="password" name="password">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                </div>
              </form>
            </div>
            <div class="card-footer bg-white">
                <a href="<?= base_url() ?>">Login</a></p>
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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <?= $this->renderSection('js') ?>
  </body>
</html>