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
                <form method="POST" action="<?= base_url('admin/konsultasi-sanksi/tambah') ?>">
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
                        <label for="nama">Status</label>
                        <select class="form-control" name="status" required>
                            <option value="mahasiswa">Mahasiswa</option>
                            <option value="pendidik">Pendidik</option>
                            <option value="tenaga_pendidik">Tenaga Kependidikan</option>
                            <option value="warga_kampus">Warga Kampus</option>
                            <option value="masyarakat_umum">Masyarakat Umum</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <lable>Jenis pelanggaran yang dilakukan!</lable>
                        <table class="table table-bordered">
                            <?php foreach ($pelanggaran as $key => $value) { ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="id_pelanggaran[]" value="<?= $value->id_pelanggaran ?>">
                                    </td>
                                    <td>
                                        <span><?= $value->nama_pelanggaran ?></span>
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