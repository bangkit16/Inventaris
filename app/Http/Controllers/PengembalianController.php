<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\MahasiswaModel;
use App\Models\PengembalianModel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class PengembalianController extends Controller
{
    //
    public function index()
    {
        $breadcumb = (object) [
            'title' => 'Daftar Transaksi Pengembalian',
            'list' => ['Home', 'pengembalian']
        ];
        $page = (object) [
            'title' => 'Daftar Transaksi pengembalian yang terdaftar dalam sistem'
        ];
        // $barang = BarangModel::all();
        // $user = UserModel::all();
        // $mahasiswa = MahasiswaModel::all();

        $activeMenu = 'pengembalian';
        // Alert::alert('Title', 'Message', 'Type');
        // Alert::success('Toast Message', 'Toast Type');


        // dd(PengembalianModel::select('user_id', 'user_kode', 'user_nama', 'harga_jual', 'harga_beli', 'kategori_id')->with('kategori')->where('kategori_id', 2));
        // dd(PengembalianModel::all()->toArray());
        // dd($kategori);

        return view('pengembalian.index', [
            'breadcumb' => $breadcumb,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }
    public function list(Request $request)
    {
        // $pengembalians = PengembalianModel::all();
        $pengembalians = PengembalianModel::select(
            'id_pengembalian',
            'id_peminjaman',
            'tgl_kembali',
        )->with('peminjaman.barang')->with('peminjaman.mahasiswa');
        // dd(PengembalianModel::all()->toJson());
        // if ($request->id_barang) {
        //     $pengembalians->where('id_barang', $request->id_barang);
        // }
        // if ($request->id_user) {
        //     $pengembalians->where('id_user', $request->id_user);
        // }
        // if ($request->id_mahasiswa) {
        //     $pengembalians->where('id_mahasiswa', $request->id_mahasiswa);
        // }

        return DataTables::of($pengembalians)
            ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addColumn('aksi', function ($pengembalian) { // menambahkan kolom aksi

                $btn = '<a href="' . url('/pengembalian/' . $pengembalian->id_pengembalian) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/pengembalian/' . $pengembalian->id_pengembalian . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                if ($pengembalian->denda()->exists()) {
                    // Ada pengembalian untuk pengembalian ini
                    $btn .=  '<a href="' . url('/denda/' . $pengembalian->denda->id_denda) . '" class="btn btn-secondary btn-sm " > Cek Denda</a>';
                }
                // $btn .= '<form class="d-inline-block" method="POST" action="' .
                //     url('/pengembalian/' . $pengembalian->id_pengembalian) . '" id="deleteData">'
                //     . csrf_field() . method_field('DELETE') .
                //     '<button type="submit" class="btn btn-danger btn-sm" onclick="return deleteData()" data-confirm-delete="true">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
            ->make(true);
    }

    public function create()
    {
        $breadcumb = (object) [
            'title' => 'Tambah pengembalian',
            'list' => ['Home', 'pengembalian', 'Tambah']
        ];
        $page = (object) [
            'title' => 'Tambah pengembalian baru'
        ];
        // $barang = BarangModel::all();
        // $user = UserModel::all();
        // $mahasiswa = MahasiswaModel::all();
        // $pengembalian = PengembalianModel::all();

        $activeMenu = 'pengembalian';

        return view('pengembalian.create', [
            'breadcumb' => $breadcumb,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }

    public function store(Request $request)
    {
        // try {
        $validated = $request->validate([
            // '' => 'required|unique:m_user,username',
            'id_barang' => 'required',
            'id_user' => 'required',
            'id_mahasiswa' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_tenggat' => 'required',
            'jumlah' => 'required',
            // 'password' => 'required|min:5',
        ]);
        // $validated['password'] = bcrypt($validated['password']);
        PengembalianModel::create($validated);

        Alert::success('Ditambahkan', 'Data pengembalian berhasil di tambahkan');
    }

    public function show(string $id)
    {
        $pengembalian = PengembalianModel::find($id);
        // ->with('pengembalian.barang')->with('pengembalian.mahasiswa')->with('pengembalian');
        // ->with('barang');
        // ->with('user')->with('mahasiswa');

        // ddd($pengembalian);

        $breadcumb = (object)[
            'title' => 'Detail pengembalian',
            'list' => ['Home', 'pengembalian', 'Detail']
        ];

        $page = (object)[
            'title' => 'Detail pengembalian'
        ];

        $activeMenu = 'pengembalian'; // set menu yang aktif

        return view('pengembalian.show', [
            'breadcumb' => $breadcumb,
            'page' => $page,
            'pengembalian' => $pengembalian,
            'activeMenu' => $activeMenu
        ]);
    }
    public function edit(string $id)
    {
        $pengembalian = PengembalianModel::find($id);

        $breadcumb = (object)[
            'title' => 'Edit pengembalian',
            'list' => ['Home', 'pengembalian', 'Edit']
        ];

        $page = (object)[
            'title' => 'Edit pengembalian'
        ];

        $activeMenu = 'pengembalian';

        return view('pengembalian.edit', [
            'breadcumb' => $breadcumb,
            'page' => $page,
            'pengembalian' => $pengembalian,
            // 'barang' => $barang,
            // 'user' => $user,
            // 'mahasiswa' => $mahasiswa,
            'activeMenu' => $activeMenu
        ]);
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'tgl_kembali' => 'required',
        ]);

        // $validated['password'] = $request->password ? bcrypt($request->password) : PengembalianModel::find($id)->password;

        PengembalianModel::find($id)->update($validated);

        Alert::success('Terubah', 'Data berhasil di ubah');

        // PengembalianModel::find($id)->update([
        //     'username' => $request->username,
        //     'nama' => $request->nama,
        //     'password' => $request->password ? bcrypt($request->password) : PengembalianModel::find($id)->password,
        //     'level_id' => $request->level_id
        // ]);

        return redirect('/pengembalian')->with('success', 'Data berhasil diubah');
    }
    public function destroy(string $id)
    {
        // dd($id);
        // $title = 'Delete pengembalian!';
        // $text = "Are you sure you want to delete?";
        // confirmDelete($title, $text);
        $check = PengembalianModel::find($id);
        if (!$check) {
            Alert::error('Error', 'Data pengembalian tidak ditemukan');
            return redirect('/pengembalian')->with('error', 'Data pengembalian tidak ditemukan');
        }
        try {
            PengembalianModel::destroy($id);

            Alert::success('Terhapus', 'Data pengembalian berhasil di hapus');

            return redirect('/pengembalian')->with('success', 'Data pengembalian berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {

            Alert::error('Error', 'Data pengembalian gagal dihapus karena terdapat tabel lain yang terkait dengan data ini');
            return redirect('/pengembalian')->with('error', 'Data pengembalian gagal dihapus karena terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
