<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\MahasiswaModel;
use App\Models\DendaModel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class DendaController extends Controller
{
    //
    public function index()
    {
        $breadcumb = (object) [
            'title' => 'Daftar Transaksi Denda',
            'list' => ['Home', 'denda']
        ];
        $page = (object) [
            'title' => 'Daftar denda yang terdaftar dalam sistem'
        ];
        // $barang = BarangModel::all();
        // $user = UserModel::all();
        // $mahasiswa = MahasiswaModel::all();

        $activeMenu = 'denda';
        // Alert::alert('Title', 'Message', 'Type');
        // Alert::success('Toast Message', 'Toast Type');


        // dd(DendaModel::select('user_id', 'user_kode', 'user_nama', 'harga_jual', 'harga_beli', 'kategori_id')->with('kategori')->where('kategori_id', 2));
        // dd(DendaModel::all()->toArray());
        // dd($kategori);

        return view('denda.index', [
            'breadcumb' => $breadcumb,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }
    public function list(Request $request)
    {
        // $dendas = DendaModel::all();
        $dendas = DendaModel::select(
            'id_denda',
            'id_pengembalian',
            'keterangan',
        )->with('pengembalian.peminjaman.mahasiswa');
        // dd(DendaModel::all()->toJson());
        // if ($request->id_barang) {
        //     $dendas->where('id_barang', $request->id_barang);
        // }
        // if ($request->id_user) {
        //     $dendas->where('id_user', $request->id_user);
        // }
        // if ($request->id_mahasiswa) {
        //     $dendas->where('id_mahasiswa', $request->id_mahasiswa);
        // }

        return DataTables::of($dendas)
            ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addColumn('aksi', function ($denda) { // menambahkan kolom aksi

                $btn = '<a href="' . url('/denda/' . $denda->id_denda) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/denda/' . $denda->id_denda . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                // $btn .= '<form class="d-inline-block" method="POST" action="' .
                //     url('/denda/' . $denda->id_denda) . '" id="deleteData">'
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
            'title' => 'Tambah denda',
            'list' => ['Home', 'denda', 'Tambah']
        ];
        $page = (object) [
            'title' => 'Tambah denda baru'
        ];
        // $barang = BarangModel::all();
        // $user = UserModel::all();
        // $mahasiswa = MahasiswaModel::all();
        // $denda = DendaModel::all();

        $activeMenu = 'denda';

        return view('denda.create', [
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
        DendaModel::create($validated);

        Alert::success('Ditambahkan', 'Data denda berhasil di tambahkan');
        // } catch (\Throwable $th) {
        // return response()->json(['success' => false, 'message' => 'error'], 422);
        // return [
        //     "data" => $bar,
        //     "success" => true,
        // ];
        // }
        return redirect('/denda')->with('success', 'Data denda berhasil disimpan');
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


        // DendaModel::create([
        //     'username' => $request->username,
        //     'nama' => $request->nama,
        //     'password' => bcrypt($request->password),
        //     'level_id' => $request->level_id
        // ]);

    }

    public function show(string $id)
    {
        $denda = DendaModel::find($id);
        // ->with('barang');
        // ->with('user')->with('mahasiswa');

        // ddd($denda);

        $breadcumb = (object)[
            'title' => 'Detail denda',
            'list' => ['Home', 'denda', 'Detail']
        ];

        $page = (object)[
            'title' => 'Detail denda'
        ];

        $activeMenu = 'denda'; // set menu yang aktif

        return view('denda.show', [
            'breadcumb' => $breadcumb,
            'page' => $page,
            'denda' => $denda,
            'activeMenu' => $activeMenu
        ]);
    }
    public function edit(string $id)
    {
        $denda = DendaModel::find($id);
        // $mahasiswa = MahasiswaModel::all();

        $breadcumb = (object)[
            'title' => 'Edit denda',
            'list' => ['Home', 'denda', 'Edit']
        ];

        $page = (object)[
            'title' => 'Edit denda'
        ];

        $activeMenu = 'denda';

        return view('denda.edit', [
            'breadcumb' => $breadcumb,
            'page' => $page,
            'denda' => $denda,
            // 'barang' => $barang,
            // 'user' => $user,
            // 'mahasiswa' => $mahasiswa,
            'activeMenu' => $activeMenu
        ]);
    }

    public function update(Request $request, string $id)
    {
        // dd("jdklsjf");
        $validated = $request->validate([
            'keterangan' => 'required|string',
            // 'password' => 'nullable|min:5',
        ]);

        // $validated['password'] = $request->password ? bcrypt($request->password) : DendaModel::find($id)->password;

        DendaModel::find($id)->update($validated);

        Alert::success('Terubah', 'Data berhasil di ubah');


        return redirect('/denda')->with('success', 'Data berhasil diubah');
    }
    public function destroy(string $id)
    {
        // dd($id);
        // $title = 'Delete denda!';
        // $text = "Are you sure you want to delete?";
        // confirmDelete($title, $text);
        $check = DendaModel::find($id);
        if (!$check) {
            Alert::error('Error', 'Data denda tidak ditemukan');
            return redirect('/denda')->with('error', 'Data denda tidak ditemukan');
        }
        try {
            DendaModel::destroy($id);

            Alert::success('Terhapus', 'Data denda berhasil di hapus');

            return redirect('/denda')->with('success', 'Data denda berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {

            Alert::error('Error', 'Data denda gagal dihapus karena terdapat tabel lain yang terkait dengan data ini');
            return redirect('/denda')->with('error', 'Data denda gagal dihapus karena terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
