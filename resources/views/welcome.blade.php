@extends('layouts.template')

@section('content')
    {{-- <div class="card">
    <div class="card-header">
        <h3 class="card-title">Dashboard</h3>
        <div class="card-tools"></div>
    </div>
    <div class="card-body">
        
        
    </div>
</div> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <div class="container-fluid">


        <style>
        </style>
        <div class="alert text-center rounded text-white"
            style="font-weight: 600;font-size: 20px;border-radius: 10%;background-color: #E26D00" role="alert">
            Selamat Datang di Sistem Informasi Inventaris !
        </div>
        @if (auth()->user()->id_user != 1)
            <div class="d-flex flex-row bd-highlight mb-3 justify-content-end ">
                <a style="font-weight: 600" href="{{ url('/peminjaman/create') }}" type="a"
                    class="btn btn-primary mr-auto">Pinjam Barang</a>
                {{-- <a style="font-weight: 600" href="{{ url('/barang/cetak') }}" type="a"
                class="btn btn-warning ml-auto">Cetak Excel</a> --}}
                <button style="font-weight: 600" type="button" class="btn btn-success mr-2" data-bs-toggle="modal"
                    data-bs-target="#modalBarangMasuk">Barang Masuk</button>
                <button style="font-weight: 600" type="button" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#modalBarangKeluar">Barang Keluar</button>
            </div>
        @endif

        <!-- Button trigger modal -->
        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalBarangMasuk">
            Launch demo modal
        </button> --}}

        <!-- Modal -->
        <div class="modal fade " id="modalBarangMasuk" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Barang Masuk</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form method="post" action="" class="form-horizontal" id="barangMasuk">
                            @csrf
                            {!! method_field('PUT') !!}
                            <div class="form-group row">

                                <label class="col-sm-2 control-label col-form-label">Nama Barang</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="id_barang_masuk" name="id_barang" required>
                                        <option value="">- Pilih Barang -</option>
                                        @foreach ($barang as $item)
                                            <option value="{{ $item->id_barang }}">
                                                {{ $item->nama_barang }}</option>
                                            {{-- <input type="hidden" value="{{ $item->harga }}" name="harga"> --}}
                                        @endforeach
                                    </select>
                                    @error('id_barang')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <!-- tambahkan baris ini untuk proses edit yang butuh method PUT -->
                            <input type="hidden" value="masuk" name="tipe">
                            {{-- <input type="hidden" value="masuk" name="tipe" id="harg"> --}}

                            <div class="form-group row">
                                <label for="stok" class="col-sm-2 col-form-label">Jumlah</label>
                                <div class="col-sm-10">
                                    <input type="text" name="stok"
                                        class="form-control @error('stok')
                                                  is-invalid
                                              @enderror"
                                        id="stokMasuk" placeholder="Jumlah" value="{{ old('stok') }}">
                                    @error('stok')
                                        <div class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade " id="modalBarangKeluar" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Barang Keluar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form method="post" action="" class="form-horizontal" id="barangKeluar">
                            @csrf
                            {!! method_field('PUT') !!}
                            <div class="form-group row">

                                <label class="col-sm-2 control-label col-form-label">Nama Barang</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="id_barang_keluar" name="id_barang" required>
                                        <option value="">- Pilih Barang -</option>
                                        @foreach ($barang as $item)
                                            <option value="{{ $item->id_barang }}">
                                                {{ $item->nama_barang }}</option>
                                            {{-- <input type="hidden" value="{{ $item->harga }}" name="harga"> --}}
                                        @endforeach
                                    </select>
                                    @error('id_barang')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <!-- tambahkan baris ini untuk proses edit yang butuh method PUT -->
                            <input type="hidden" value="keluar" name="tipe">
                            {{-- <input type="hidden" value="masuk" name="tipe" id="harg"> --}}

                            <div class="form-group row">
                                <label for="stok" class="col-sm-2 col-form-label">Jumlah</label>
                                <div class="col-sm-10">
                                    <input type="text" name="stok"
                                        class="form-control @error('stok')
                                                  is-invalid
                                              @enderror"
                                        id="stokKeluar" placeholder="Jumlah" value="{{ old('stok') }}">
                                    @error('stok')
                                        <div class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-7">

                <h4>Barang dengan stok sedikit</h4><br>
                <table class="table table-hover shadow " style="border: 2px solid black" id="table_denda">
                    {{-- <th class=" " style="border: 1px solid black !important"> --}}
                    <thead>

                        <tr class="" style="background-color: #D9D9D9;border: 2px solid black">
                            <th scope="col">ID</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Stok</th>
                            {{-- <th scope="col">Aksi</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangTeratas as $b)
                            <tr style="border: 1px solid black">
                                <th class="align-middle" scope="row">{{ $b->id_barang }}</th>
                                <td class="align-middle">{{ $b->nama_barang }}</td>
                                <td class="align-middle">{{ $b->stok }}</td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="col-5">
                <h4>Barang terbaru</h4><br>
                <table class="table table-hover shadow " style="border: 2px solid black" id="table_denda">
                    {{-- <th class=" " style="border: 1px solid black !important"> --}}
                    <thead>

                        <tr class="" style="background-color: #D9D9D9;border: 2px solid black">
                            <th scope="col">ID</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Jumlah</th>
                            {{-- <th scope="col">Aksi</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangTerbaru as $t)
                            <tr style="border: 1px solid black">
                                <th class="align-middle" scope="row">{{ $t->id_barang }}</th>
                                <td class="align-middle">{{ $t->nama_barang }}</td>
                                <td class="align-middle">{{ $t->stok }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col">

                <h4>Peminjaman saat ini</h4><br>
                <table class="table table-hover shadow " style="border: 2px solid black" id="table_denda">
                    {{-- <th class=" " style="border: 1px solid black !important"> --}}
                    <thead>

                        <tr class="" style="background-color: #D9D9D9;border: 2px solid black">
                            <th scope="col">ID</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Peminjam</th>
                            <th scope="col">Tanggal Tenggat</th>
                            {{-- <th scope="col">Aksi</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($peminjaman as $p)
                            <tr style="border: 1px solid black">
                                <th class="align-middle" scope="row">{{ $p->id_peminjaman }}</th>
                                <td class="align-middle">{{ $p->barang->nama_barang }}</td>
                                <td class="align-middle">{{ $p->mahasiswa->nama }}</td>
                                <td class="align-middle">{{ $p->tgl_tenggat }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#id_barang_masuk').change(function() {
                var id_barang = $(this).val();
                $('#barangMasuk').attr('action', '/barang/' + id_barang);
                // $('#harg').attr('value' , )
            });
            $('#id_barang_keluar').change(function() {
                var id_barang = $(this).val();
                // $('#harg').attr('value' , )
                $('#barangKeluar').attr('action', '/barang/' + id_barang);
            });
        });
    </script>
@endsection
