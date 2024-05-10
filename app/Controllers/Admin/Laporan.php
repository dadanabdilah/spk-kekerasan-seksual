<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Laporan extends BaseController
{

    public function pelaporanKonsulJenisKs()
    {
        if(session()->get('role') == 'pelapor'){
            $konsultasi = $this->laporKonsultasiJenisKs->where('id_user', session()->get('id_user'))->findAll();
        } else {
            $konsultasi = $this->laporKonsultasiJenisKs->findAll();
        }
        
        $data = [
            'title' => 'Laporan Data Pelaporan Konsultasi Kekerasan Seksual',
            'laporKonsultasiJenisKs' => $konsultasi,
        ];

        return view('admin/laporan/laporan-lapor-konsul-ks', $data);
    }

    public function konsulSanksi()
    {
        if(session()->get('role') == 'pelapor'){
            $konsultasi = $this->konsultasiSanksiAdministratif->where('id_user', session()->get('id_user'))->findAll();
        } else {
            $konsultasi = $this->konsultasiSanksiAdministratif->findAll();
        }
        
        $data = [
            'title' => 'Hasil Konsultasi Sanksi Administratif',
            'konsultasiSanksiAdministratif' => $konsultasi,
        ];
        return view('admin/laporan/laporan-konsul-sanksi', $data);
    }

    public function konsulJenisKs()
    {
        if(session()->get('role') == 'pelapor'){
            $konsultasi = $this->konsultasiJenisKs->where('id_user', session()->get('id_user'))->findAll();
        } else {
            $konsultasi = $this->konsultasiJenisKs->findAll();
        }
        
        $data = [
            'title' => 'Hasil Konsultasi Kekerasan Seksusal',
            'konsultasiJenisKs' => $konsultasi,
        ];
        return view('admin/laporan/laporan-konsul-jenis-ks', $data);
    }


    public function export($param = null){
        $spreadsheet = new Spreadsheet();;
        if($param == "konsul-ks"){
            if(session()->get('role') == 'pelapor'){
                $konsultasi = $this->konsultasiJenisKs->where('id_user', session()->get('id_user'))->findAll();
            } else {
                $konsultasi = $this->konsultasiJenisKs->findAll();
            }

            // Mengatur kolom-kolom dalam sheet Excel
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'No');
            $sheet->setCellValue('B1', 'Nama Pelapor');
            $sheet->setCellValue('C1', 'Telepon');
            $sheet->setCellValue('D1', 'Alamat');
            $sheet->setCellValue('E1', 'Tanggal');
            
            // Isi data Anda di sini, misalnya:

            $row = 2;
            $no = 1;

            foreach ($konsultasi as $key => $value) {
                $sheet->setCellValue("A" . $row, $no++ );
                $sheet->setCellValue("B" . $row, $value->nmpelapor );
                $sheet->setCellValue("C" . $row, $value->tlp );
                $sheet->setCellValue("D" . $row, $value->alamat );
                $sheet->setCellValue("D" . $row, $value->tgl );


                $row++;
            }

            // Membuat objek Writer untuk menyimpan file Excel
            $writer = new Xlsx($spreadsheet);

            // Menyimpan file Excel ke dalam folder tertentu
            $filename = 'Laporan Data Konsultasi Jenis KS.xlsx';
            $writer->save($filename);

        } else if($param == "konsul-sanksi"){
            if(session()->get('role') == 'pelapor'){
                $konsultasi = $this->konsultasiSanksiAdministratif->where('id_user', session()->get('id_user'))->findAll();
            } else {
                $konsultasi = $this->konsultasiSanksiAdministratif->findAll();
            }

            // Mengatur kolom-kolom dalam sheet Excel
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'No');
            $sheet->setCellValue('B1', 'Nama Pelapor');
            $sheet->setCellValue('C1', 'Telepon');
            $sheet->setCellValue('D1', 'Alamat');
            $sheet->setCellValue('E1', 'Tanggal');
            
            // Isi data Anda di sini, misalnya:

            $row = 2;
            $no = 1;
            foreach ($konsultasi as $key => $data) {
                $sheet->setCellValue("A" . $row, $no++ );
                $sheet->setCellValue("B" . $row, $data->nmpelapor );
                $sheet->setCellValue("C" . $row, $data->tlp );
                $sheet->setCellValue("D" . $row, $data->alamat );
                $sheet->setCellValue("D" . $row, $data->tgl );


                $row++;
            }

            // Membuat objek Writer untuk menyimpan file Excel
            $writer = new Xlsx($spreadsheet);

            // Menyimpan file Excel ke dalam folder tertentu
            $filename = 'Laporan Data Sanksi Administratif.xlsx';
            $writer->save($filename);
        } else if($param == "pelaporan-konsul-jenisks"){
            if(session()->get('role') == 'pelapor'){
                $konsultasi = $this->laporKonsultasiJenisKs->where('id_user', session()->get('id_user'))->findAll();
            } else {
                $konsultasi = $this->laporKonsultasiJenisKs->findAll();
            }

            // Mengatur kolom-kolom dalam sheet Excel
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'Nama Pelapor');
            $sheet->setCellValue('B1', 'Nama Pelaku');
            $sheet->setCellValue('C1', 'Telepon');
            $sheet->setCellValue('D1', 'Email');
            $sheet->setCellValue('E1', 'Alamat');
            $sheet->setCellValue('F1', 'Jenis KS');
            $sheet->setCellValue('G1', 'Disabilitas');
            $sheet->setCellValue('H1', 'Status');
            $sheet->setCellValue('I1', 'Alasan');
            $sheet->setCellValue('J1', 'No HP Alternatif');
            $sheet->setCellValue('K1', 'Email Alternatif');
            $sheet->setCellValue('L1', 'Tanggal');
            
            // Isi data Anda di sini, misalnya:

            $row = 2;
            foreach ($konsultasi as $key => $data) {
                $sheet->setCellValue("A" . $row, $data->nama_pelapor );
                $sheet->setCellValue("B" . $row, $data->nama_pelaku );
                $sheet->setCellValue("C" . $row, $data->tlp );
                $sheet->setCellValue("D" . $row, $data->email );
                $sheet->setCellValue("E" . $row, $data->alamat );
                $sheet->setCellValue("F" . $row, $data->jenis_ks );
                $sheet->setCellValue("G" . $row, ucwords($data->disabilitas ) );
                $sheet->setCellValue("H" . $row, $data->status );
                $sheet->setCellValue("I" . $row, $data->alasan_pengaduan );
                $sheet->setCellValue("J" . $row, $data->no_hp_lain );
                $sheet->setCellValue("K" . $row, $data->email_lain );
                $sheet->setCellValue("L" . $row, $data->tgl );

                $row++;
            }

            // Membuat objek Writer untuk menyimpan file Excel
            $writer = new Xlsx($spreadsheet);

            // Menyimpan file Excel ke dalam folder tertentu
            $filename = 'Laporan Data Pelaporan Konsultasi KS.xlsx';
            $writer->save($filename);
        }

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename = ' . $filename);
        header('Content-Length: ' . filesize($filename));
        readfile($filename); // send file
        unlink($filename); // delete file
        exit;
    }

}
