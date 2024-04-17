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
                <form method="POST" action="<?= base_url('admin/konsultasi-jenis-ks/tambah') ?>">
                    <div class="form-group">
                        <label for="nama">Nama Pelapor</label>
                        <input class="form-control" type="text" name="nmpelapor" required/>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nomor Telepon</label>
                        <input class="form-control" type="number" name="tlp" required/>
                    </div>
                    <div class="form-group">
                        <label for="nama">Alamat</label>
                        <textarea class="form-control" type="text" name="alamat" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="nama">Disabilitas</label>
                        <select class="form-control" name="kondisi" required>
                            <option value="disabilitas">Ya</option>
                            <option value="bukan_disabilitas">Tidak</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <lable>Pilih pernyataan diagnosa sesuai dengan yang pernah anda alami!</lable>
                        <table class="table table-bordered">
                            <?php foreach ($diagnosa as $key => $value) { ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="id_diagnosa[]" value="<?= $value->id_diagnosa ?>">
                                    </td>
                                    <td>
                                        <span><?= $value->nama_diagnosa ?></span>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>