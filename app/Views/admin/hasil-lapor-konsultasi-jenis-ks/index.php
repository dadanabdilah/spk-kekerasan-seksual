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
                                <th>Nama Pelaku</th>
                                <th>No HP Pelapor</th>
                                <th>Email Pelapor</th>
                                <th>Alamat Pelapor</th>
                                <th>Jenis KS</th>
                                <th>Disabilitas</th>
                                <th>Status Terlapor</th>
                                <th>Alasan Pengaduan</th>
                                <th>No HP Alternatif</th>
                                <th>Email Alternatif</th>
                                <th>Tanggal</th>
                                <th>Bukti</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($laporKonsultasiJenisKs as $data) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $data->nama_pelapor ?></td>
                                    <td><?= $data->nama_pelaku ?></td>
                                    <td><?= $data->tlp ?></td>
                                    <td><?= $data->email ?></td>
                                    <td><?= $data->alamat ?></td>
                                    <td><?= $data->jenis_ks ?></td>
                                    <td><?= ucwords($data->disabilitas ) ?></td>
                                    <td><?= $data->status ?></td>
                                    <td><?= $data->alasan_pengaduan ?></td>
                                    <td><?= $data->no_hp_lain ?></td>
                                    <td><?= $data->email_lain ?></td>
                                    <td><?= $data->tgl ?></td>
                                    <td><a target="_blank" href="<?= base_url('assets/bukti/') . $data->bukti ?>" class="btn btn-primary">Lihat</td>
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
<?= $this->section('js') ?>
<script>
    new DataTable('.table');
</script>
<?= $this->endSection() ?>