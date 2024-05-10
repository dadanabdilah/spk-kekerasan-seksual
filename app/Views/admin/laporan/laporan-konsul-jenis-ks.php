<?= $this->extend('layout/index') ?>
<?= $this->section('content') ?>


<div class="row">
    <div class="col-md-12">
        <h2><?= $title ?? '' ?></h2>
        
        <a href="<?= base_url('admin/laporan/export/konsul-ks') ?>" class="btn btn-primary">Export</a>
        <?php if(session('pesan')) { ?>
            <div class="alert alert-<?= session('status') ?> alert-dismissible fade show" role="alert">
                <strong><?= session('pesan') ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } ?>

        <div class="card mt-4">
            <div class="card-header">
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pelapor</th>
                                <th>Nomor Telpon</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($konsultasiJenisKs as $data) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $data->nmpelapor ?></td>
                                    <td><?= $data->tlp ?></td>
                                    <td><?= $data->tgl ?></td>
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