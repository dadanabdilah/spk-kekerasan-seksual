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
                <a href="<?= base_url('admin/user') ?>" class="btn btn-primary btn-sm">Kembali</a>
            </div>
            <div class="card-body">
                <form method="POST" action=""<?= base_url('admin/user/edit/' . $user->id) ?>>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama_user" name="nama_user" value="<?= $user->nama_user ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $user->email ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <small>Kosongkan jika password tidak diubah.</small>
                    </div>
                    <div class="form-group">
                        <label for="level">Role</label>
                        <select class="form-control" id="role" name="role">
                            <option value="satgas_ppks" <?= $user->role == 'satgas_ppks' ? 'selected' : ''; ?> >Satgas PPKS</option>
                            <option value="pelapor" <?= $user->role == 'pelapor' ? 'selected' : ''; ?>>Pelapor</option>
                            <option value="pimpinan_pt" <?= $user->role == 'pimpinan_pt' ? 'selected' : ''; ?>>Pimpinan PT</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>