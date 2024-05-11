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
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="nama">Nama Pelapor</label>
                        <input class="form-control" type="text" name="nmpelapor" value="<?= $konsultasi->nmpelapor ?>" readonly/>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nomor Telepon</label>
                        <input class="form-control" type="number" name="tlp" value="<?= $konsultasi->tlp ?>" readonly/>
                    </div>
                    <div class="form-group">
                        <label for="nama">Alamat</label>
                        <textarea class="form-control" type="text" name="alamat" readonly><?= $konsultasi->alamat ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="nama">Status</label>
                        <input class="form-control" type="text" name="tlp" value="<?= $konsultasi->status ?>" readonly/>
                    </div>

                    <div class="form-group mt-4">
                        <label for="nama">Pelanggaran yang dilakukan</label>
                        <ul>
                            <?php foreach ($detailKonsultasi as $key => $value) { ?>
                                <li><?= $value->nama_pelanggaran ?></li>
                            <?php } ?>
                            <?php if(! $detailKonsultasi) { ?>
                                <li>Tidak ada data</li>
                            <?php } ?>
                        </ul>
                    </div>

                    <div class="form-group">
                        <h6>Sanksi Administratif</h6>
                        <table class="table table-bordered">
                            <tr style="font-weight : bold;">
                                <td>Sanksi Administratif</td>
                                <td>Keterangan</td>
                                <td>Persen</td>
                            </tr>
                            <?php if($detailKonsultasi) { ?>
                            <?php
                                foreach ($detailKonsultasi as $key => $value) {
                                    $jenis[] = $value->nmsanksi . '|' . $value->keterangan;     
                                }

                                // Hitung persentase
                                $persent = 100 / count($jenis);

                                // cari persentase
                                $data = [];
                                foreach ($jenis as $key => $value) {
                                    $data[$value . '|' . $key] = $persent; 
                                }
                                
                                // Array baru untuk menyimpan hasil penjumlahan
                                $array_hasil = array();
                                
                                // Loop melalui array awal
                                foreach ($data as $key => $value) {
                                    // Pisahkan kunci menjadi dua bagian
                                    $pecah_kunci = explode("|", $key);
                                    $kunci_utama = $pecah_kunci[0];
                                    $keterangan = $pecah_kunci[1];
                                    $kunci_tambahan = $pecah_kunci[2];
                                
                                    // Jika kunci utama sudah ada di array hasil, tambahkan nilai
                                    if (array_key_exists($kunci_utama, $array_hasil)) {
                                        $array_hasil[$kunci_utama] = [
                                            'jenis' => $kunci_utama,
                                            'keterangan' => $keterangan,
                                            'persen' => $array_hasil[$kunci_utama]['persen'] + round($value, 2),
                                        ];
                                    } else {
                                        // Jika tidak, buat entri baru di array hasil
                                        // $array_hasil[$kunci_utama] = round($value, 2);
                                        $array_hasil[$kunci_utama] = [
                                            'jenis' => $kunci_utama,
                                            'keterangan' => $keterangan,
                                            'persen' => round($value, 2),
                                        ];
                                    }
                                } 
                            ?>
                            <?php foreach ($array_hasil as $key => $value) { ?>
                                <tr>
                                    <td>
                                        <?= $value['jenis'] ?>
                                    </td>
                                    <td>
                                        <?= $value['keterangan'] ?>
                                    </td>
                                    <td>
                                        <?= $value['persen'] ?>%
                                    </td>
                                </tr>
                            <?php } ?>
                            <?php } else {?>
                                <tr>
                                    <td colspan="3">Tidak ada data</td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>