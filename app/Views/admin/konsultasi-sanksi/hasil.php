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
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="nama">Nama Pelapor</label>
                        <input class="form-control" type="text" name="nmpelapor" value="<?= $konsultasi->nmpelapor ?>" readonly/>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nomor Telepon</label>
                        <input class="form-control" type="number" name="tlp" value="<?= $konsultasi->tlp ?>" readonly/>
                    </div>
                    <div class="form-group">
                        <label for="nama">Alamat</label>
                        <textarea class="form-control" type="text" name="alamat" readonly><?= $konsultasi->alamat ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="nama">Status</label>
                        <input class="form-control" type="text" name="tlp" value="<?= $konsultasi->status ?>" readonly/>
                    </div>

                    <div class="form-group mt-4">
                        <label for="nama">Pelanggaran yang dilakukan</label>
                        <ul>
                            <?php foreach ($detailKonsultasi as $key => $value) { ?>
                                <li><?= $value->nama_pelanggaran ?></li>
                            <?php } ?>
                        </ul>
                    </div>

                    <div class="form-group">
                        <h6>Sanksi Administratif</h6>
                        <table class="table table-bordered">
                            <tr style="font-weight : bold;">
                                <td>Sanksi Administratif</td>
                                <td>Keterangan</td>
                            </tr>
                            <?php foreach ($detailKonsultasi as $key => $value) { ?>
                                <tr>
                                    <td>
                                        <?= $value->nmsanksi ?>
                                    </td>
                                    <td>
                                        <?= $value->keterangan ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>