<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\TransaksiModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class BarangMasukController extends Controller
{
    //
    public function index()
    {
        // dd(TransaksiModel::select('id_barang', 'id_user', 'barang_masuk', 'tgl_transaksi', 'status')->with('barang'));
        $breadcumb = (object) [
            'title' => 'Daftar Barang Masuk',
            'list' => ['Home', 'Barang Masuk']
        ];
        $page = (object) [
            'title' => 'Daftar Barang masuk di sistem'
        ];
        $barang = BarangModel::all();
        $user = UserModel::all();

        $activeMenu = 'barang_masuk';
        // Alert::alert('Title', 'Message', 'Type');
        // Alert::success('Toast Message', 'Toast Type');


        // dd(BarangModel::select('barang_id', 'barang_kode', 'barang_nama', 'harga_jual', 'harga_beli', 'kategori_id')->with('kategori')->where('kategori_id', 2));
        // dd(BarangModel::all()->toArray());
        // dd($kategori);

        return view('barang_masuk.index', ['breadcumb' => $breadcumb, 'page' => $page,'barang' => $barang, 'user' => $user, 'activeMenu' => $activeMenu]);
    }
    public function list(Request $request)
    {
        // $users = BarangModel::all();
        $barangMasuks = TransaksiModel::select('id_barang', 'id_user', 'barang_masuk', 'tgl_transaksi', 'status')->with('barang')->with('user')->where('barang_keluar', null);
        // ->where('barang_masuk', !null);

        // dd(BarangModel::all()->toJson());
        if ($request->id_barang) {
            $barangMasuks->where('id_barang', $request->id_barang);
        }
        if ($request->id_user) {
            $barangMasuks->where('id_user', $request->id_user);
        }

        return DataTables::of($barangMasuks)
            ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addColumn('aksi', function ($barangMasuk) { // menambahkan kolom aksi

                $btn = '<a href="' . url('/barang_masuk/' . $barangMasuk->id_transaksi) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/barang_masuk/' . $barangMasuk->id_transaksi . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' .
                    url('/barang_masuk/' . $barangMasuk->id_transaksi) . '" id="deleteData">'
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
            'title' => 'Tambah Masuk Barang'
        ];

        // $kategori = KategoriModel::all();

        $activeMenu = 'barang_masuk';

        return view('barang.create', ['breadcumb' => $breadcumb, 'page' => $page,  'activeMenu' => $activeMenu]);
    }

    public function store(Request $request)
    {
        // try {
        $validated = $request->validate([
            //username harus diisi, berupa string, minimal 3 karakter dan bernilai unik di table m_user kolom username
            'nama_barang' => 'required|unique:m_barang,nama_barang',
            'stok' => 'required|numeric',
            'harga' => 'required|numeric',
        ]);
        BarangModel::create($validated);

        Alert::success('Ditambahkan', 'Data Barang berhasil di tambahkan');
        // } catch (\Throwable $th) {
        // return response()->json(['success' => false, 'message' => 'error'], 422);
        // return [
        //     "data" => $bar,
        //     "success" => true,
        // ];
        // }
        return redirect('/barang')->with('success', 'Data barang berhasil disimpan');
        // if (!$validated) {
        //     return response()->json(['success' => false, 'message' => 'error'], 422);
        // }


        //     return [
        //         "error" => "asdadsasdadsasdadsa",
        //         "success" => false
        //     ];
        // }
        // dd($request);

        // die("asdasd");



        // // dd($request);


        // BarangModel::create([
        //     'username' => $request->username,
        //     'nama' => $request->nama,
        //     'password' => bcrypt($request->password),
        //     'level_id' => $request->level_id
        // ]);

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
        $validated = $request->validate([
            'nama_barang' => 'required|unique:m_barang,nama_barang,' . $id . ',id_barang',
            // 'nama_barang' => 'required|unique:m_barang,nama_barang , ' . $id . ',id_barang',
            'stok' => 'required|numeric',
            'harga' => 'required|numeric',
        ]);

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
            BarangModel::destroy($id);

            Alert::success('Terhapus', 'Data Barang berhasil di hapus');

            return redirect('/barang')->with('success', 'Data barang berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {

            Alert::error('Error', 'Data barang gagal dihapus karena terdapat tabel lain yang terkait dengan data ini');
            return redirect('/barang')->with('error', 'Data barang gagal dihapus karena terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
