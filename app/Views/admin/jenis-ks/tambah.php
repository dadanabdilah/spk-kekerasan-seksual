<?= $this->extend('layout/index') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-12">
        <h2><?= $title ?? '' ?></h2>

        <?php if(session('pesan')) { ?>
            <div class="alert alert-<?= session('status') ?> alert-dismissible fade show" role="alert">
                <strong><?= session('pesan') ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } ?>

        <div class="card">
            <div class="card-header">
                <a href="<?= base_url('admin/jenis-ks') ?>" class="btn btn-primary btn-sm">Kembali</a>
            </div>
            <div class="card-body">
                <form method="POST" action=""<?= base_url('admin/jenis-ks/tambah') ?>>
                    <div class="form-group">
                        <label for="nama">Jenis Kekerasan Seksual</label>
                        <input type="text" class="form-control" id="nmjenis" name="nmjenis">
                    </div>
                    <div class="form-group">
                        <label for="nama">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan">
                    </div>
                    <div class="form-group">
                        <label for="nama">Solusi</label>
                        <input type="text" class="form-control" id="solusi" name="solusi">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>