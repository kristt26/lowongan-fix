<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Laporan extends BaseController
{
    public function index()
    {
        $periode = new \App\Models\PeriodeModel();
        $lamaran = new \App\Models\LamaranModel();
        $data = $lamaran->laporanPenerimaan($periode->getAktif());
        return view('laporan', ['data' => $data]);
    }

    public function cetak()
    {
        $periode = new \App\Models\PeriodeModel();
        $model = new \App\Models\LamaranModel();
        $data['data'] = $model->laporanPenerimaan($periode->getAktif());
        return view('laporan_cetak', $data);
    }


    public function exportExcel()
    {
        $periode = new \App\Models\PeriodeModel();
        $model = new \App\Models\LamaranModel();
        $data = $model->laporanPenerimaan($periode->getAktif()); // sesuaikan

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Bidang');
        $sheet->setCellValue('C1', 'Posisi');
        $sheet->setCellValue('D1', 'Pekerjaan');
        $sheet->setCellValue('E1', 'Nama Pelamar');
        $sheet->setCellValue('F1', 'Telepon');

        // Data
        $row = 2;
        $no = 1;
        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $no++);
            $sheet->setCellValue('B' . $row, $item->nama_bidang);
            $sheet->setCellValue('C' . $row, $item->posisi);
            $sheet->setCellValue('D' . $row, $item->pekerjaan);
            $sheet->setCellValue('E' . $row, $item->nama_pelamar);
            $sheet->setCellValue('F' . $row, $item->telepon);
            $row++;
        }

        // Output Excel
        $filename = 'laporan_penerimaan_' . date('Ymd_His') . '.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment;filename=\"$filename\"");
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }
}
