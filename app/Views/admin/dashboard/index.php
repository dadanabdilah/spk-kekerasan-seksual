<?= $this->extend('layout/index') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-12">
        <?php if(session()->get('pesan')) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Selamat datang <?= session()->get('nama_user') ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } ?>

        <div class="card">
            <div class="card-body">
                <h2 class="card-title">SISTEM PAKAR SATGAS PPKS</h2>
                <p class="card-text">Sistem Pakar Satgas PPKS adalah sistem pakar yang dibangun untuk membantu dalam memberikan informasi dan konsultasi terkait dengan kekerasan seksual.</p>
                <p class="card-text text-center">
                    <img src="<?= base_url('assets/images/satgas-ppks.jpeg') ?>" class="img-fluid img-cover"/>
                </p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>