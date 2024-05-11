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
                <form method="POST" action="<?= base_url('admin/lapor-konsul-jenis-ks') ?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama Pelapor</label>
                                <input class="form-control" type="text" name="nama_pelapor" required/>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Pelaku</label>
                                <input class="form-control" type="text" name="nama_pelaku" required/>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nomor Telepon Pelapor</label>
                                <input class="form-control" type="text" name="tlp" required/>
                            </div>
                            <div class="form-group">
                                <label for="nama">Email Pelapor</label>
                                <input class="form-control" type="text" name="email" required/>
                            </div>
                            <div class="form-group">
                                <label for="nama">Domisili Pelapor</label>
                                <textarea class="form-control" type="text" name="alamat" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="nama">Jenis Kekerasan Seksual (narasikan)</label>
                                <textarea class="form-control" type="text" name="jenis_ks" required></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="nama">Ceritkan Singkat Peristiwa</label>
                                <textarea class="form-control" type="text" name="cerita_peristiswa" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="nama">Disabilitas</label>
                                <select class="form-control" name="disabilitas" required>
                                    <option value="ya">Ya</option>
                                    <option value="tidak">Tidak</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nama">Status Terlapor</label>
                                <select class="form-control" name="status" required>
                                    <option value="Mahasiswa">Mahasiswa</option>
                                    <option value="Pendidik">Pendidik</option>
                                    <option value="Tenaga Kependidikan">Tenaga Kependidikan</option>
                                    <option value="Warga Kampus">Warga Kampus</option>
                                    <option value="Masyarakat Umum">Masyarakat Umum</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nama">Alasan Pengaduan</label>
                                <input class="form-control" type="text" name="alasan_pengaduan" required/>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nomor Telepon Lain Yang Bisa Dikonfirmasi</label>
                                <input class="form-control" type="text" name="no_hp_lain" required/>
                            </div>
                            <div class="form-group">
                                <label for="nama">Email Lain Yang Bisa Dikonfirmasi</label>
                                <input class="form-control" type="text" name="email_lain" required/>
                            </div>
                            <div class="form-group">
                                <label for="nama">Bukti</label>
                                <input class="form-control" type="file" name="bukti" required/>
                                <small class="text-danger">Hanya bisa format .jpg, jpeg, .png dan .mp4</small>
                            </div>
                        </div>
                    </div>
                    <div id="btnsubmit">
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>