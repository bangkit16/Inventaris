<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\MahasiswaModel;
use App\Models\PeminjamanModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class PeminjamanController extends Controller
{
    //
    public function index()
    {
        $breadcumb = (object) [
            'title' => 'Daftar peminjaman',
            'list' => ['Home', 'peminjaman']
        ];
        $page = (object) [
            'title' => 'Daftar peminjaman yang terdaftar dalam sistem'
        ];
        $barang = BarangModel::all();
        $user = UserModel::all();
        $mahasiswa = MahasiswaModel::all();

        $activeMenu = 'peminjaman';
        // Alert::alert('Title', 'Message', 'Type');
        // Alert::success('Toast Message', 'Toast Type');


        // dd(PeminjamanModel::select('user_id', 'user_kode', 'user_nama', 'harga_jual', 'harga_beli', 'kategori_id')->with('kategori')->where('kategori_id', 2));
        // dd(PeminjamanModel::all()->toArray());
        // dd($kategori);

        return view('peminjaman.index', [
            'breadcumb' => $breadcumb,
            'page' => $page,
            'barang' => $barang,
            'user' => $user,
            'mahasiswa' => $mahasiswa,
            'activeMenu' => $activeMenu
        ]);
    }
    public function list(Request $request)
    {
        // $peminjamans = PeminjamanModel::all();
        $peminjamans = PeminjamanModel::select(
            'id_peminjaman',
            'id_barang',
            'id_user',
            'id_mahasiswa',
            'tgl_pinjam',
            'tgl_tenggat',
            'jumlah'
        )->with('barang')->with('user')->with('mahasiswa');
        // dd(PeminjamanModel::all()->toJson());
        if ($request->id_barang) {
            $peminjamans->where('id_barang', $request->id_barang);
        }
        if ($request->id_user) {
            $peminjamans->where('id_user', $request->id_user);
        }
        if ($request->id_mahasiswa) {
            $peminjamans->where('id_mahasiswa', $request->id_mahasiswa);
        }

        return DataTables::of($peminjamans)
            ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addColumn('aksi', function ($peminjaman) { // menambahkan kolom aksi

                $btn = '<a href="' . url('/peminjaman/' . $peminjaman->id_peminjaman) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/peminjaman/' . $peminjaman->id_peminjaman . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' .
                    url('/peminjaman/' . $peminjaman->id_peminjaman) . '" id="deleteData">'
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
            'title' => 'Tambah peminjaman',
            'list' => ['Home', 'peminjaman', 'Tambah']
        ];
        $page = (object) [
            'title' => 'Tambah peminjaman baru'
        ];
        $barang = BarangModel::all();
        $user = UserModel::all();
        $mahasiswa = MahasiswaModel::all();
        // $peminjaman = PeminjamanModel::all();

        $activeMenu = 'peminjaman';

        return view('peminjaman.create', [
            'breadcumb' => $breadcumb,
            'page' => $page,
            'barang' => $barang,
            'user' => $user,
            'mahasiswa' => $mahasiswa,
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
        PeminjamanModel::create($validated);

        Alert::success('Ditambahkan', 'Data peminjaman berhasil di tambahkan');
        // } catch (\Throwable $th) {
        // return response()->json(['success' => false, 'message' => 'error'], 422);
        // return [
        //     "data" => $bar,
        //     "success" => true,
        // ];
        // }
        return redirect('/peminjaman')->with('success', 'Data peminjaman berhasil disimpan');
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


        // PeminjamanModel::create([
        //     'username' => $request->username,
        //     'nama' => $request->nama,
        //     'password' => bcrypt($request->password),
        //     'level_id' => $request->level_id
        // ]);

    }

    public function show(string $id)
    {
        $peminjaman = PeminjamanModel::find($id)->with('barang')->with('user')->with('mahasiswa');

        $breadcumb = (object)[
            'title' => 'Detail peminjaman',
            'list' => ['Home', 'peminjaman', 'Detail']
        ];

        $page = (object)[
            'title' => 'Detail peminjaman'
        ];

        $activeMenu = 'peminjaman'; // set menu yang aktif

        return view('peminjaman.show', [
            'breadcumb' => $breadcumb,
            'page' => $page,
            'peminjaman' => $peminjaman,
            'activeMenu' => $activeMenu
        ]);
    }
    public function edit(string $id)
    {
        $peminjaman = PeminjamanModel::find($id);
        $barang = BarangModel::all();
        $user = UserModel::all();
        $mahasiswa = MahasiswaModel::all();

        $breadcumb = (object)[
            'title' => 'Edit peminjaman',
            'list' => ['Home', 'peminjaman', 'Edit']
        ];

        $page = (object)[
            'title' => 'Edit peminjaman'
        ];

        $activeMenu = 'peminjaman';

        return view('peminjaman.edit', [
            'breadcumb' => $breadcumb,
            'page' => $page,
            'peminjaman' => $peminjaman,
            'barang' => $barang,
            'user' => $user,
            'mahasiswa' => $mahasiswa,
            'activeMenu' => $activeMenu
        ]);
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            // 'username' => 'required|unique:m_user,username,' . $id . ',id_user',
            // // 'nama_user' => 'required|unique:m_user,nama_user , ' . $id . ',id_user',
            // 'id_level' => 'required',
            'id_barang' => 'required',
            'id_user' => 'required',
            'id_mahasiswa' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_tenggat' => 'required',
            'jumlah' => 'required',
            // 'password' => 'nullable|min:5',
        ]);

        // $validated['password'] = $request->password ? bcrypt($request->password) : PeminjamanModel::find($id)->password;

        PeminjamanModel::find($id)->update($validated);

        Alert::success('Terubah', 'Data berhasil di ubah');

        // PeminjamanModel::find($id)->update([
        //     'username' => $request->username,
        //     'nama' => $request->nama,
        //     'password' => $request->password ? bcrypt($request->password) : PeminjamanModel::find($id)->password,
        //     'level_id' => $request->level_id
        // ]);

        return redirect('/peminjaman')->with('success', 'Data berhasil diubah');
    }
    public function destroy(string $id)
    {
        // dd($id);
        // $title = 'Delete peminjaman!';
        // $text = "Are you sure you want to delete?";
        // confirmDelete($title, $text);
        $check = PeminjamanModel::find($id);
        if (!$check) {
            Alert::error('Error', 'Data peminjaman tidak ditemukan');
            return redirect('/peminjaman')->with('error', 'Data peminjaman tidak ditemukan');
        }
        try {
            PeminjamanModel::destroy($id);

            Alert::success('Terhapus', 'Data peminjaman berhasil di hapus');

            return redirect('/peminjaman')->with('success', 'Data peminjaman berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {

            Alert::error('Error', 'Data peminjaman gagal dihapus karena terdapat tabel lain yang terkait dengan data ini');
            return redirect('/peminjaman')->with('error', 'Data peminjaman gagal dihapus karena terdapat tabel lain yang terkait dengan data ini');
        }
    }
}