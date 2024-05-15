<?php

namespace App\Http\Controllers;

use App\Exports\BarangExport;
use App\Exports\PeminjamanExport;
use App\Exports\TransaksiExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class PelaporanController extends Controller
{
    //
    public function barangPdf()
    {
        // Alert::success('Berhasil' , 'data barang berhasil di cetak');
        return Excel::download(new BarangExport, 'barang.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
    }
    public function barangExcel()
    {
        return Excel::download(new BarangExport, 'barang.xlsx');
    }
    public function barangCsv()
    {
        return Excel::download(new BarangExport, 'barang.csv', \Maatwebsite\Excel\Excel::CSV);
    }
    public function transaksiPdf()
    {
        // Alert::success('Berhasil' , 'data transaksi berhasil di cetak');
        return Excel::download(new TransaksiExport, 'transaksi.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
    }
    public function transaksiExcel()
    {
        return Excel::download(new TransaksiExport, 'transaksi.xlsx');  
    }
    public function transaksiCsv()
    {
        return Excel::download(new TransaksiExport, 'transaksi.csv', \Maatwebsite\Excel\Excel::CSV);
    }
    public function peminjamanPdf()
    {
        // Alert::success('Berhasil' , 'data peminjaman berhasil di cetak');
        return Excel::download(new PeminjamanExport, 'peminjaman.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
    }
    public function peminjamanExcel()
    {
        return Excel::download(new PeminjamanExport, 'peminjaman.xlsx');  
    }
    public function peminjamanCsv()
    {
        return Excel::download(new PeminjamanExport, 'peminjaman.csv', \Maatwebsite\Excel\Excel::CSV);
    }
}
