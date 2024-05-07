<?php

namespace App\Http\Controllers;

use App\Models\MahasiswaModel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class MahasiswaController extends Controller
{
    //
    public function index()
    {
        $breadcumb = (object) [
            'title' => 'Daftar mahasiswa',
            'list' => ['Home', 'mahasiswa']
        ];
        $page = (object) [
            'title' => 'Daftar mahasiswa yang terdaftar dalam sistem'
        ];
        // $level = LevelModel::all();

        $activeMenu = 'mahasiswa';
        // Alert::alert('Title', 'Message', 'Type');
        // Alert::success('Toast Message', 'Toast Type');


        // dd(MahasiswaModel::select('user_id', 'user_kode', 'user_nama', 'harga_jual', 'harga_beli', 'kategori_id')->with('kategori')->where('kategori_id', 2));
        // dd(MahasiswaModel::all()->toArray());
        // dd($kategori);

        return view('mahasiswa.index', ['breadcumb' => $breadcumb, 'page' => $page,  'activeMenu' => $activeMenu]);
    }
    public function list(Request $request)
    {
        // $mahasiswas = MahasiswaModel::all();
        $mahasiswas = MahasiswaModel::select(
            'id_mahasiswa',
            'nama',
            'nim',
        );
        // dd(MahasiswaModel::all()->toJson());
        // if ($request->id_level) {
        //     $mahasiswas->where('id_level', $request->id_level);
        // }

        return DataTables::of($mahasiswas)
            ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addColumn('aksi', function ($mahasiswa) { // menambahkan kolom aksi

                $btn = '<a href="' . url('/mahasiswa/' . $mahasiswa->id_mahasiswa) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/mahasiswa/' . $mahasiswa->id_mahasiswa . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' .
                    url('/mahasiswa/' . $mahasiswa->id_mahasiswa) . '" id="deleteData">'
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
            'title' => 'Tambah mahasiswa',
            'list' => ['Home', 'Mahasiswa', 'Tambah']
        ];
        $page = (object) [
            'title' => 'Tambah mahasiswa baru'
        ];

        // $level = LevelModel::all();

        $activeMenu = 'mahasiswa';

        return view('mahasiswa.create', ['breadcumb' => $breadcumb, 'page' => $page,   'activeMenu' => $activeMenu]);
    }

    public function store(Request $request)
    {
        // try {
        $validated = $request->validate([
            //username harus diisi, berupa string, minimal 3 karakter dan bernilai unik di table m_user kolom username
            // '' => 'required|unique:m_user,username',
            // 'id_level' => 'required',
            'nama' => 'required|string',
            'nim' => 'required|numeric',
            // 'password' => 'required|min:5',
        ]);
        // $validated['password'] = bcrypt($validated['password']);
        MahasiswaModel::create($validated);

        Alert::success('Ditambahkan', 'Data mahasiswa berhasil di tambahkan');
        // } catch (\Throwable $th) {
        // return response()->json(['success' => false, 'message' => 'error'], 422);
        // return [
        //     "data" => $bar,
        //     "success" => true,
        // ];
        // }
        return redirect('/mahasiswa')->with('success', 'Data mahasiswa berhasil disimpan');
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


        // MahasiswaModel::create([
        //     'username' => $request->username,
        //     'nama' => $request->nama,
        //     'password' => bcrypt($request->password),
        //     'level_id' => $request->level_id
        // ]);

    }

    public function show(string $id)
    {
        $mahasiswa = MahasiswaModel::find($id);

        $breadcumb = (object)[
            'title' => 'Detail mahasiswa',
            'list' => ['Home', 'mahasiswa', 'Detail']
        ];

        $page = (object)[
            'title' => 'Detail mahasiswa'
        ];

        $activeMenu = 'mahasiswa'; // set menu yang aktif

        return view('mahasiswa.show', [
            'breadcumb' => $breadcumb,
            'page' => $page,
            'mahasiswa' => $mahasiswa,
            'activeMenu' => $activeMenu
        ]);
    }
    public function edit(string $id)
    {
        $mahasiswa = MahasiswaModel::find($id);
        // $level = LevelModel::all();

        $breadcumb = (object)[
            'title' => 'Edit mahasiswa',
            'list' => ['Home', 'mahasiswa', 'Edit']
        ];

        $page = (object)[
            'title' => 'Edit mahasiswa'
        ];

        $activeMenu = 'mahasiswa';

        return view('mahasiswa.edit', [
            'breadcumb' => $breadcumb,
            'page' => $page,
            'mahasiswa' => $mahasiswa,
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

        // $validated['password'] = $request->password ? bcrypt($request->password) : MahasiswaModel::find($id)->password;

        MahasiswaModel::find($id)->update($validated);

        Alert::success('Terubah', 'Data berhasil di ubah');

        // MahasiswaModel::find($id)->update([
        //     'username' => $request->username,
        //     'nama' => $request->nama,
        //     'password' => $request->password ? bcrypt($request->password) : MahasiswaModel::find($id)->password,
        //     'level_id' => $request->level_id
        // ]);

        return redirect('/mahasiswa')->with('success', 'Data berhasil diubah');
    }
    public function destroy(string $id)
    {
        // dd($id);
        // $title = 'Delete mahasiswa!';
        // $text = "Are you sure you want to delete?";
        // confirmDelete($title, $text);
        $check = MahasiswaModel::find($id);
        if (!$check) {
            Alert::error('Error', 'Data mahasiswa tidak ditemukan');
            return redirect('/mahasiswa')->with('error', 'Data mahasiswa tidak ditemukan');
        }
        try {
            MahasiswaModel::destroy($id);

            Alert::success('Terhapus', 'Data mahasiswa berhasil di hapus');

            return redirect('/mahasiswa')->with('success', 'Data mahasiswa berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {

            Alert::error('Error', 'Data mahasiswa gagal dihapus karena terdapat tabel lain yang terkait dengan data ini');
            return redirect('/mahasiswa')->with('error', 'Data mahasiswa gagal dihapus karena terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
