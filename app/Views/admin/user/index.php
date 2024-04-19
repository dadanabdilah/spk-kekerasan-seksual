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
                <a href="<?= base_url('admin/user/tambah') ?>" class="btn btn-primary btn-sm">Tambah Data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($users as $user) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $user->nama_user ?></td>
                                    <td><?= $user->email ?></td>
                                    <td><?= strtoupper(str_replace('_', ' ', $user->role)) ?></td>
                                    <td>
                                        <a href="<?= base_url('admin/user/edit/' . $user->id) ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                        <a href="<?= base_url('admin/user/hapus/' . $user->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i></a>
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