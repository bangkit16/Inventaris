<?php

namespace App\Http\Controllers;

use App\Exports\BarangExport;
use App\Models\BarangModel;
use App\Models\TransaksiModel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class BarangController extends Controller
{
    //
    public function index()
    {
        $breadcumb = (object) [
            'title' => 'Daftar Barang',
            'list' => ['Home', 'Barang']
        ];
        $page = (object) [
            'title' => 'Daftar Barang yang terdaftar dalam sistem'
        ];
        // $kategori = KategoriModel::all();

        $activeMenu = 'barang';
        // Alert::alert('Title', 'Message', 'Type');
        // Alert::success('Toast Message', 'Toast Type');


        // dd(BarangModel::select('barang_id', 'barang_kode', 'barang_nama', 'harga_jual', 'harga_beli', 'kategori_id')->with('kategori')->where('kategori_id', 2));
        // dd(BarangModel::all()->toArray());
        // dd($kategori);

        return view('barang.index', ['breadcumb' => $breadcumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }
    
    public function list(Request $request)
    {
        // $users = BarangModel::all();
        $barangs = BarangModel::select('id_barang', 'nama_barang', 'harga', 'stok');
        // dd(BarangModel::all()->toJson());
        // if ($request->kategori_id) {
        //     $barangs->where('kategori_id', $request->kategori_id);
        // }

        return DataTables::of($barangs)
            ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addColumn('aksi', function ($barang) { // menambahkan kolom aksi

                $btn = '<a href="' . url('/barang/' . $barang->id_barang) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/barang/' . $barang->id_barang . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' .
                    url('/barang/' . $barang->id_barang) . '" id="deleteData">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return deleteData()" data-confirm-delete="true">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
            ->make(true);
    }

    public function create()
    {
        $breadcumb = (object) [
            'title' => 'Tambah Barang',
            'list' => ['Home', 'Barang', 'Tambah']
        ];
        $page = (object) [
            'title' => 'Tambah barang baru'
        ];

        // $kategori = KategoriModel::all();

        $activeMenu = 'barang';

        return view('barang.create', ['breadcumb' => $breadcumb, 'page' => $page,  'activeMenu' => $activeMenu]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_barang' => 'required|unique:m_barang,nama_barang',
            'stok' => 'required|numeric',
            'harga' => 'required|numeric',

        ]);
        $validated['status'] = 'wlee';
        $barang = BarangModel::create($validated);
        TransaksiModel::create([
            'id_barang' => $barang->id_barang,
            'id_user' => auth()->user()->id_user,
            'barang_masuk' => $validated['stok'],
            'tgl_transaksi' => now(),
            'status' => 'baru'
        ]);


        Alert::success('Ditambahkan', 'Data Barang berhasil di tambahkan');

        return redirect('/barang')->with('success', 'Data barang berhasil disimpan');
    }

    public function show(string $id)
    {
        $barang = BarangModel::find($id);

        $breadcumb = (object)[
            'title' => 'Detail Barang',
            'list' => ['Home', 'Barang', 'Detail']
        ];

        $page = (object)[
            'title' => 'Detail barang'
        ];

        $activeMenu = 'barang'; // set menu yang aktif

        return view('barang.show', [
            'breadcumb' => $breadcumb,
            'page' => $page,
            'barang' => $barang,
            'activeMenu' => $activeMenu
        ]);
    }
    public function edit(string $id)
    {
        $barang = BarangModel::find($id);
        // $kategori = KategoriModel::all();

        $breadcumb = (object)[
            'title' => 'Edit Barang',
            'list' => ['Home', 'Barang', 'Edit']
        ];

        $page = (object)[
            'title' => 'Edit barang'
        ];

        $activeMenu = 'barang';

        return view('barang.edit', [
            'breadcumb' => $breadcumb,
            'page' => $page,
            'barang' => $barang,
            // 'kategori' => $kategori,
            'activeMenu' => $activeMenu
        ]);
    }

    public function update(Request $request, string $id)
    {
        if ($request->tipe) {
            $validated = $request->validate([
                'stok' => 'required|numeric',
            ]);
        } else {

            $validated = $request->validate([
                'nama_barang' => 'required|unique:m_barang,nama_barang,' . $id . ',id_barang',
                'stok' => 'required|numeric',
                'harga' => 'required|numeric',
            ]);
        }

        $stokAwal =  BarangModel::find($id)->stok;

        if ($request->tipe) {

            if ($request->tipe == 'masuk') {
                TransaksiModel::create([
                    'id_barang' => $id,
                    'id_user' => auth()->user()->id_user,
                    'barang_masuk' => $validated['stok'],
                    'tgl_transaksi' => now(),
                    'status' => 'baru'
                ]);
                $validated['stok'] += $stokAwal;
            } else if ($request->tipe == 'keluar') {
                TransaksiModel::create([
                    'id_barang' => $id,
                    'id_user' => auth()->user()->id_user,
                    'barang_keluar' => $validated['stok'],
                    'tgl_transaksi' => now(),
                    'status' => 'baru'
                ]);
                $validated['stok'] = $stokAwal - $validated['stok'];
            }
        } else {
            // $stokAwal = $barang->stok;
            if ($stokAwal < $validated['stok']) {
                TransaksiModel::create([
                    'id_barang' => $id,
                    'id_user' => auth()->user()->id_user,
                    'barang_masuk' => ($validated['stok'] - $stokAwal),
                    'tgl_transaksi' => now(),
                    'status' => 'baru'
                ]);
            } else if ($stokAwal > $validated['stok']) {
                TransaksiModel::create([
                    'id_barang' => $id,
                    'id_user' => auth()->user()->id_user,
                    'barang_keluar' => ($stokAwal  - $validated['stok']),
                    'tgl_transaksi' => now(),
                    'status' => 'rusak'
                ]);
            }
        }

        if ($stokAwal < 0 ) {
            # code...
            Alert::Error('Stok Error', 'Stok kurang dari 0');
            return redirect('/barang')->with('success', 'Data berhasil diubah');

        }
        BarangModel::find($id)->update($validated);

        Alert::success('Terubah', 'Data berhasil di ubah');

        // BarangModel::find($id)->update([
        //     'username' => $request->username,
        //     'nama' => $request->nama,
        //     'password' => $request->password ? bcrypt($request->password) : BarangModel::find($id)->password,
        //     'level_id' => $request->level_id
        // ]);

        return redirect('/barang')->with('success', 'Data berhasil diubah');
    }
    public function destroy(string $id)
    {
        // dd($id);
        // $title = 'Delete User!';
        // $text = "Are you sure you want to delete?";
        // confirmDelete($title, $text);
        $check = BarangModel::find($id);
        if (!$check) {
            Alert::error('Error', 'Data barang tidak ditemukan');
            return redirect('/barang')->with('error', 'Data user tidak ditemukan');
        }
        try {
            TransaksiModel::where('id_barang', $id)->delete();
            BarangModel::destroy($id);

            Alert::success('Terhapus', 'Data Barang berhasil di hapus');

            return redirect('/barang')->with('success', 'Data barang berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {

            Alert::error('Error', 'Data barang gagal dihapus karena terdapat tabel lain yang terkait dengan data ini');
            return redirect('/barang')->with('error', 'Data barang gagal dihapus karena terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
