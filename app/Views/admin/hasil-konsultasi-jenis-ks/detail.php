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
                <a href="<?= base_url('admin/hasil-konsultasi-jenis-ks') ?>" class="btn btn-primary btn-sm">Kembali</a>
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
                        <label for="nama">Disabilitas</label>
                        <select class="form-control" name="kondisi" disabled>
                            <option disable>Pilih</option>
                            <option value="disabilitas" <?= $konsultasi->kondisi == "disabilitas" ? "selected" : "" ?>>Ya</option>
                            <option value="bukan_disabilitas" <?= $konsultasi->kondisi == "bukan_disabilitas" ? "selected" : "" ?>>Tidak</option>
                        </select>
                    </div>

                    <div class="form-group mt-4">
                        <label for="nama">Pernyataan Diagnosa yang sesuai dengan kejadin yang dialami!</label>
                        <ul>
                            <?php foreach ($detailKonsultasi as $key => $value) { ?>
                                <li><?= $value->nama_pertanyaan ?></li>
                            <?php } ?>
                        </ul>
                    </div>

                    <div class="form-group">
                        <h6>Jenis Kekerasan Seksusal</h6>
                        <table class="table table-bordered">
                            <tr style="font-weight : bold;">
                                <td>Jenis Kekerasan Seksusal</td>
                                <td>Keterangan</td>
                            </tr>
                            <?php foreach ($detailKonsultasi as $key => $value) { ?>
                                <tr>
                                    <td>
                                        <?= $value->nmjenis ?>
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