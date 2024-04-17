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
                <a href="<?= base_url('admin/sanksi-administratif') ?>" class="btn btn-primary btn-sm">Kembali</a>
            </div>
            <div class="card-body">
                <form method="POST" action=""<?= base_url('admin/sanksi-administratif/edit/' . $jenisSanksi->id_sanksi) ?>>
                    <div class="form-group">
                        <label for="nama">Jenis Sanksi Administratif</label>
                        <input type="text" class="form-control" id="nmsanksi" name="nmsanksi" value="<?= $jenisSanksi->nmsanksi ?>">
                    </div>
                    <div class="form-group">
                        <label for="nama">Keterangan</label>
                        <textarea type="text" class="form-control" id="keterangan" name="keterangan"><?= $jenisSanksi->keterangan ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>