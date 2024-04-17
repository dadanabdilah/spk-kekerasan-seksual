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
                <a href="<?= base_url('admin/basis-aturan-jenis-ks') ?>" class="btn btn-primary btn-sm">Kembali</a>
            </div>
            <div class="card-body">
                <form method="POST" action=""<?= base_url('admin/basis-aturan-jenis-ks/tambah') ?>>
                    <div class="form-group">
                        <label for="nama">Jenis Kekerasan Seksual</label>
                        <select class="form-control" name="id_jenis">
                            <option selected disabled>Pilih</option>
                            <?php foreach ($jenisKs as $key => $value) { ?>
                                <option value="<?= $value->id_jenis ?>"><?= $value->nmjenis  ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <lable>Pernyataan Diagnosa</lable>
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