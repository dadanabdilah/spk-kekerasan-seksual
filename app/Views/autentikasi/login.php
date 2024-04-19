<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    
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
              <h5>Login</h5>
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

              <form action="<?= base_url('') ?>" method="POST">
                <div class="form-group">
                    <input _ngcontent-c0="" class="form-control" placeholder="Email" type="text" name="email" required>
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Password" type="password" name="password" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                    <a href="<?= base_url('daftar') ?>" class="btn btn-outline-primary btn-block">Daftar</a>
                </div>
              </form>
            </div>
            <div class="card-footer bg-white">
                <!-- <a href="<?= base_url('daftar') ?>">Daftar</a></p> -->
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
    <script src="<?= base_url('assets/') ?>js/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/') ?>js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <?= $this->renderSection('js') ?>
  </body>
</html>