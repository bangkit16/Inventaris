<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    //
    public function index()
    {
        $breadcumb = (object) [
            'title' => 'Daftar User',
            'list' => ['Home', 'User']
        ];
        $page = (object) [
            'title' => 'Daftar user yang terdaftar dalam sistem'
        ];
        $level = LevelModel::all();

        $activeMenu = 'user';
        // Alert::alert('Title', 'Message', 'Type');
        // Alert::success('Toast Message', 'Toast Type');


        // dd(UserModel::select('user_id', 'user_kode', 'user_nama', 'harga_jual', 'harga_beli', 'kategori_id')->with('kategori')->where('kategori_id', 2));
        // dd(UserModel::all()->toArray());
        // dd($kategori);

        return view('user.index', ['breadcumb' => $breadcumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
    }
    public function list(Request $request)
    {
        // $users = UserModel::all();
        $users = UserModel::select(
            'nama',
            'id_level',
            'id_user',
            'username',
            'password',
            'nip',
        )->with('level');
        // dd(UserModel::all()->toJson());
        if ($request->id_level) {
            $users->where('id_level', $request->id_level);
        }

        return DataTables::of($users)
            ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addColumn('aksi', function ($user) { // menambahkan kolom aksi

                $btn = '<a href="' . url('/user/' . $user->id_user) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/user/' . $user->id_user . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' .
                    url('/user/' . $user->id_user) . '" id="deleteData">'
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
            'title' => 'Tambah user',
            'list' => ['Home', 'user', 'Tambah']
        ];
        $page = (object) [
            'title' => 'Tambah user baru'
        ];

        $level = LevelModel::all();

        $activeMenu = 'user';

        return view('user.create', ['breadcumb' => $breadcumb, 'page' => $page, 'level' => $level,  'activeMenu' => $activeMenu]);
    }

    public function store(Request $request)
    {
        // try {
        $validated = $request->validate([
            //username harus diisi, berupa string, minimal 3 karakter dan bernilai unik di table m_user kolom username
            'username' => 'required|unique:m_user,username',
            'id_level' => 'required',
            'nama' => 'required|string',
            'nip' => 'required|numeric',
            'password' => 'required|min:5',
        ]);
        $validated['password'] = bcrypt($validated['password']);
        UserModel::create($validated);

        Alert::success('Ditambahkan', 'Data user berhasil di tambahkan');
        // } catch (\Throwable $th) {
        // return response()->json(['success' => false, 'message' => 'error'], 422);
        // return [
        //     "data" => $bar,
        //     "success" => true,
        // ];
        // }
        return redirect('/user')->with('success', 'Data user berhasil disimpan');
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


        // UserModel::create([
        //     'username' => $request->username,
        //     'nama' => $request->nama,
        //     'password' => bcrypt($request->password),
        //     'level_id' => $request->level_id
        // ]);

    }

    public function show(string $id)
    {
        $user = UserModel::with('level')->find($id);

        $breadcumb = (object)[
            'title' => 'Detail user',
            'list' => ['Home', 'user', 'Detail']
        ];

        $page = (object)[
            'title' => 'Detail user'
        ];

        $activeMenu = 'user'; // set menu yang aktif

        return view('user.show', [
            'breadcumb' => $breadcumb,
            'page' => $page,
            'user' => $user,
            'activeMenu' => $activeMenu
        ]);
    }
    public function edit(string $id)
    {
        $user = UserModel::find($id);
        $level = LevelModel::all();

        $breadcumb = (object)[
            'title' => 'Edit user',
            'list' => ['Home', 'user', 'Edit']
        ];

        $page = (object)[
            'title' => 'Edit user'
        ];

        $activeMenu = 'user';

        return view('user.edit', [
            'breadcumb' => $breadcumb,
            'page' => $page,
            'user' => $user,
            'level' => $level,
            // 'kategori' => $kategori,
            'activeMenu' => $activeMenu
        ]);
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'username' => 'required|unique:m_user,username,' . $id . ',id_user',
            // 'nama_user' => 'required|unique:m_user,nama_user , ' . $id . ',id_user',
            'id_level' => 'required',
            'nama' => 'required|string',
            'nip' => 'required|numeric',
            'password' => 'nullable|min:5',
        ]);

        $validated['password'] = $request->password ? bcrypt($request->password) : UserModel::find($id)->password;

        UserModel::find($id)->update($validated);

        Alert::success('Terubah', 'Data berhasil di ubah');

        // UserModel::find($id)->update([
        //     'username' => $request->username,
        //     'nama' => $request->nama,
        //     'password' => $request->password ? bcrypt($request->password) : UserModel::find($id)->password,
        //     'level_id' => $request->level_id
        // ]);

        return redirect('/user')->with('success', 'Data berhasil diubah');
    }
    public function destroy(string $id)
    {
        // dd($id);
        // $title = 'Delete User!';
        // $text = "Are you sure you want to delete?";
        // confirmDelete($title, $text);
        $check = UserModel::find($id);
        if (!$check) {
            Alert::error('Error', 'Data user tidak ditemukan');
            return redirect('/user')->with('error', 'Data user tidak ditemukan');
        }
        try {
            UserModel::destroy($id);

            Alert::success('Terhapus', 'Data user berhasil di hapus');

            return redirect('/user')->with('success', 'Data user berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {

            Alert::error('Error', 'Data user gagal dihapus karena terdapat tabel lain yang terkait dengan data ini');
            return redirect('/user')->with('error', 'Data user gagal dihapus karena terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
