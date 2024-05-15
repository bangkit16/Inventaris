<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\PeminjamanModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $breadcumb = (object) [
            'title' => 'Dashboard',
            'list' => ['Home', 'Dashboard']
        ];
        $barangTeratas = BarangModel::orderBy('stok', 'asc')->take(3)->get();
        $barangTerbaru = BarangModel::orderBy('created_at', 'desc')->take(3)->get();
        $peminjaman = PeminjamanModel::doesntHave('pengembalian')->get();
        $barang = BarangModel::all();

        


        $activeMenu = 'dashboard';

        return view('welcome', [
            'breadcumb' => $breadcumb, 
            'barangTeratas' => $barangTeratas, 
            'barang' => $barang, 
            'barangTerbaru' => $barangTerbaru, 
            'peminjaman' => $peminjaman, 
            'activeMenu' => $activeMenu
        ]);
        // return view('welcome');
    }
    public function pelaporan()
    {
        $breadcumb = (object) [
            'title' => 'Pelaporan',
            'list' => ['Home', 'Pelaporan']
        ];

        


        $activeMenu = 'pelaporan';

        return view('pelaporan.index', [
            'breadcumb' => $breadcumb, 
            'activeMenu' => $activeMenu
        ]);
        // return view('welcome');
    }
}
