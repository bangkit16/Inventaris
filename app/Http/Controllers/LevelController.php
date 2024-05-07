<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class LevelController extends Controller
{
    //
    public function index()
    {
        $breadcumb = (object) [
            'title' => 'Daftar level',
            'list' => ['Home', 'level']
        ];
        $page = (object) [
            'title' => 'Daftar level yang terdaftar dalam sistem'
        ];
        // $level = LevelModel::all();

        $activeMenu = 'level';
        // Alert::alert('Title', 'Message', 'Type');
        // Alert::success('Toast Message', 'Toast Type');


        // dd(LevelModel::select('user_id', 'user_kode', 'user_nama', 'harga_jual', 'harga_beli', 'kategori_id')->with('kategori')->where('kategori_id', 2));
        // dd(LevelModel::all()->toArray());
        // dd($kategori);

        return view('level.index', ['breadcumb' => $breadcumb, 'page' => $page,  'activeMenu' => $activeMenu]);
    }
    public function list(Request $request)
    {
        // $levels = LevelModel::all();
        $levels = LevelModel::select(
            'id_level',
            'level_kode',
            'level_nama',
        );
        // dd(LevelModel::all()->toJson());
        // if ($request->id_level) {
        //     $levels->where('id_level', $request->id_level);
        // }

        return DataTables::of($levels)
            ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addColumn('aksi', function ($level) { // menambahkan kolom aksi

                $btn = '<a href="' . url('/level/' . $level->id_level) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/level/' . $level->id_level . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' .
                    url('/level/' . $level->id_level) . '" id="deleteData">'
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
            'title' => 'Tambah level',
            'list' => ['Home', 'level', 'Tambah']
        ];
        $page = (object) [
            'title' => 'Tambah level baru'
        ];

        // $level = LevelModel::all();

        $activeMenu = 'level';

        return view('level.create', ['breadcumb' => $breadcumb, 'page' => $page,   'activeMenu' => $activeMenu]);
    }

    public function store(Request $request)
    {
        // try {
        $validated = $request->validate([
            //username harus diisi, berupa string, minimal 3 karakter dan bernilai unik di table m_user kolom username
            // '' => 'required|unique:m_user,username',
            // 'id_level' => 'required',
            'nama' => 'required|string',
            'niM' => 'required|numeric',
            // 'password' => 'required|min:5',
        ]);
        // $validated['password'] = bcrypt($validated['password']);
        LevelModel::create($validated);

        Alert::success('Ditambahkan', 'Data level berhasil di tambahkan');
        // } catch (\Throwable $th) {
        // return response()->json(['success' => false, 'message' => 'error'], 422);
        // return [
        //     "data" => $bar,
        //     "success" => true,
        // ];
        // }
        return redirect('/level')->with('success', 'Data level berhasil disimpan');
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


        // LevelModel::create([
        //     'username' => $request->username,
        //     'nama' => $request->nama,
        //     'password' => bcrypt($request->password),
        //     'level_id' => $request->level_id
        // ]);

    }

    public function show(string $id)
    {
        $level = LevelModel::find($id);

        $breadcumb = (object)[
            'title' => 'Detail level',
            'list' => ['Home', 'level', 'Detail']
        ];

        $page = (object)[
            'title' => 'Detail level'
        ];

        $activeMenu = 'level'; // set menu yang aktif

        return view('level.show', [
            'breadcumb' => $breadcumb,
            'page' => $page,
            'level' => $level,
            'activeMenu' => $activeMenu
        ]);
    }
    public function edit(string $id)
    {
        $level = LevelModel::find($id);
        // $level = LevelModel::all();

        $breadcumb = (object)[
            'title' => 'Edit level',
            'list' => ['Home', 'level', 'Edit']
        ];

        $page = (object)[
            'title' => 'Edit level'
        ];

        $activeMenu = 'level';

        return view('level.edit', [
            'breadcumb' => $breadcumb,
            'page' => $page,
            'level' => $level,
            // 'level' => $level,
            // 'kategori' => $kategori,
            'activeMenu' => $activeMenu
        ]);
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            // 'username' => 'required|unique:m_user,username,' . $id . ',id_user',
            // // 'nama_user' => 'required|unique:m_user,nama_user , ' . $id . ',id_user',
            // 'id_level' => 'required',
            'nama' => 'required|string',
            'nim' => 'required|numeric',
            // 'password' => 'nullable|min:5',
        ]);

        // $validated['password'] = $request->password ? bcrypt($request->password) : LevelModel::find($id)->password;

        LevelModel::find($id)->update($validated);

        Alert::success('Terubah', 'Data berhasil di ubah');

        // LevelModel::find($id)->update([
        //     'username' => $request->username,
        //     'nama' => $request->nama,
        //     'password' => $request->password ? bcrypt($request->password) : LevelModel::find($id)->password,
        //     'level_id' => $request->level_id
        // ]);

        return redirect('/level')->with('success', 'Data berhasil diubah');
    }
    public function destroy(string $id)
    {
        // dd($id);
        // $title = 'Delete level!';
        // $text = "Are you sure you want to delete?";
        // confirmDelete($title, $text);
        $check = LevelModel::find($id);
        if (!$check) {
            Alert::error('Error', 'Data level tidak ditemukan');
            return redirect('/level')->with('error', 'Data level tidak ditemukan');
        }
        try {
            LevelModel::destroy($id);

            Alert::success('Terhapus', 'Data level berhasil di hapus');

            return redirect('/level')->with('success', 'Data level berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {

            Alert::error('Error', 'Data level gagal dihapus karena terdapat tabel lain yang terkait dengan data ini');
            return redirect('/level')->with('error', 'Data level gagal dihapus karena terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
