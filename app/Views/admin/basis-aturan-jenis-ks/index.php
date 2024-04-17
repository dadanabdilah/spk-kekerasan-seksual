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
                <a href="<?= base_url('admin/basis-aturan-jenis-ks/tambah') ?>" class="btn btn-primary btn-sm">Tambah Data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis Kekerasan Seksual</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($basisAturanJenisKs as $data) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $data->nmjenis ?></td>
                                    <td><?= $data->keterangan ?></td>
                                    <td>
                                        <a href="<?= base_url('admin/basis-aturan-jenis-ks/detail/' . $data->id_aturanjenis) ?>" class="btn btn-sm btn-info">Detail</a>
                                        <a href="<?= base_url('admin/basis-aturan-jenis-ks/edit/' . $data->id_aturanjenis) ?>" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="<?= base_url('admin/basis-aturan-jenis-ks/hapus/' . $data->id_aturanjenis) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>