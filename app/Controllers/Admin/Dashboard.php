<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index(): string
    {
        $konsulJenisKs = $this->konsultasiJenisKs->select('COUNT(detail_konsultasi_jenis_ks.id) AS total_jenis, jenis_kekerasan_seksual.nmjenis')
                                        ->join('detail_konsultasi_jenis_ks', 'konsultasi_jenis_ks.id_konsul_jenis = detail_konsultasi_jenis_ks.id_konsul_jenis')
                                        ->join('diagnosa', 'detail_konsultasi_jenis_ks.id_diagnosa = diagnosa.id_diagnosa')
                                        ->join('detail_basis_aturan_jenis_kekerasan_seksual', 'detail_basis_aturan_jenis_kekerasan_seksual.id_diagnosa = diagnosa.id_diagnosa')
                                        ->join('basis_aturan_jenis_kekerasan_seksual', 'basis_aturan_jenis_kekerasan_seksual.id_aturanjenis = detail_basis_aturan_jenis_kekerasan_seksual.id_aturanjenis')
                                        ->join('jenis_kekerasan_seksual', 'jenis_kekerasan_seksual.id_jenis = basis_aturan_jenis_kekerasan_seksual.id_jenis')
                                        ->groupBy('jenis_kekerasan_seksual.nmjenis')->findAll();


        $dataKonsulJenisKs = [];
        foreach ($konsulJenisKs as $key => $value) {
            $dataKonsulJenisKs[] = [$value->nmjenis, $value->total_jenis];
        }

        $konsulKs = $this->konsultasiJenisKs->select('COUNT(id_konsul_jenis) AS total_jenis, tgl AS tanggal')
                                            ->groupBy('tgl')->findAll();
        
        $dataKonsulKs = [];
        foreach ($konsulKs as $key => $value) {
            $dataKonsulKs[] = [$value->tanggal, (int) $value->total_jenis];
        }

        $data['chart_konsul'] = $dataKonsulJenisKs;
        $data['grafik_konsul'] = $dataKonsulKs;
        return view('admin/dashboard/index', $data);
    }
}
