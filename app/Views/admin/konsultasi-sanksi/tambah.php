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
                    <div id="data">
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
                            <button type="button" class="btn btn-primary" onclick="lanjut('pelanggaran', 'data')">Lanjut</button>
                        </div>
                    </div>
                    <div id="pelanggaran">
                        <div class="form-group">
                            <!-- <button type="button" class="btn btn-primary" onclick="lanjut('diagnosa', 'data')">Lanjut</button> -->
                            <!-- <button type="button" class="btn btn-secondary" onclick="kembali('diagnosa', 'data')">Kembali</button> -->
                        </div>
                        <div class="form-group">
                            <?php $total_pelanggaran = count($pelanggaran) ?>
                            <?php $no = 1; ?>
                            <?php foreach ($pelanggaran as $key => $value) { ?>
                                <div class="text-center p-5" id="pelanggaran<?= $value->no ?>" style="min-height : 450px;">
                                    <div class="mt-3" style="min-height : 100px;">
                                        <p style="font-size: 50px;" class="text-dark mt-3"><?= $value->nama_pelanggaran ?></p>
                                        <input type="checkbox" id="check<?= $value->id_pelanggaran ?>" name="id_pelanggaran[]" value="<?= $value->id_pelanggaran ?>" hidden>
                                    </div>
                                    <div class="d-felx mt-3">
                                        <button type="button" class="btn btn-primary" onclick="setCheckbox('check<?= $value->id_pelanggaran ?>', '<?= $total_pelanggaran == $no ? 'btnsubmit' : 'pelanggaran' . $value->no +1 ?>', 'pelanggaran<?= $value->no ?>')">Ya</button>
                                        <button type="button" class="btn btn-danger" onclick="lanjut('<?= $total_pelanggaran == $no ? 'btnsubmit' : 'pelanggaran' . $value->no + 1 ?>', 'pelanggaran<?= $value->no ?>')">Tidak</button>
                                    </div>
                                </div> 
                                <?php $no++; ?>                          
                            <?php } ?>
                        </div>
                    </div>
                    <div id="btnsubmit">
                        <div class="form-group text-center">
                            <p>Klik tombol simpan untuk menyimpan data anda!</p>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script>
    function kembali(idhide, idshow) {
        $('#' + idhide).hide();
        $('#' + idshow).show();
    }

    function lanjut(idshow, idhide) {
        console.log(idhide);
        $('#' + idhide).hide();
        $('#' + idshow).show();
    }

    function setCheckbox(id, idshow, idhide) {
        $('#' + id).prop('checked', true);
        $('#' + idshow).show();
        $('#' + idhide).hide();
    }

    $(document).ready(function() {
        $('#btnsubmit').hide();
        $('#pelanggaran').hide();

        <?php for($i = 2; $i <= $total_pelanggaran; $i++) { ?>
            $('#pelanggaran<?= $i ?>').hide();
        <?php } ?>
    });
</script>
<?= $this->endSection() ?>