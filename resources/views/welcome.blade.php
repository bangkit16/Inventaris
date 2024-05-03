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
    <div class="container-fluid">


        <style>
        </style>
        <div class="alert text-center rounded text-white"
            style="font-weight: 600;font-size: 20px;border-radius: 10%;background-color: #E26D00" role="alert">
            Selamat Datang di Sistem Informasi Inventaris !
        </div>
        <div class="d-flex flex-row bd-highlight mb-3 justify-content-end ">
            <button style="font-weight: 600" type="button" class="btn btn-primary mr-auto">Pinjam Barang</button>
            <button style="font-weight: 600" type="button" class="btn btn-success mr-2">Barang Masuk</button>
            <button style="font-weight: 600" type="button" class="btn btn-danger">Barang Keluar</button>
        </div>
        <div class="row">
            <div class="col-7">

                <h4>Barang dengan stok sedikit</h4><br>
                <table class="table table-hover shadow " style="border: 2px solid black">
                    {{-- <th class=" " style="border: 1px solid black !important"> --}}
                    <tr class="" style="background-color: #D9D9D9;border: 2px solid black">
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Aksi</th>
                    </tr>
                    {{-- </th> --}}
                    <tbody>
                        <tr style="border: 1px solid black">
                            <th class="align-middle" scope="row">1</th>
                            <th class="align-middle">Mark</th>
                            <th class="align-middle">Otto</th>
                            <th class="align-middle">
                                <button type="button" class="btn btn-info">Detail</button>
                                <button type="button" class="btn btn-warning">Edit</button>
                                <button type="button" class="btn btn-danger">Hapus</button>
                            </th>
                        </tr>
                        <tr style="border: 1px solid black">
                            <th class="align-middle" scope="row">2</th>
                            <th class="align-middle">Jacob</th>
                            <th class="align-middle">Thornton</th>
                            <th class="align-middle">
                                <button type="button" class="btn btn-info">Detail</button>
                                <button type="button" class="btn btn-warning">Edit</button>
                                <button type="button" class="btn btn-danger">Hapus</button>
                            </th>
                        </tr>
                        <tr style="border: 1px solid black">
                            <th class="align-middle" scope="row">3</th>
                            <th class="align-middle">Larry</th>
                            <th class="align-middle">the Bird</th>
                            <th class="align-middle">
                                <button type="button" class="btn btn-info">Detail</button>
                                <button type="button" class="btn btn-warning">Edit</button>
                                <button type="button" class="btn btn-danger">Hapus</button>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-5">
                <h4>Barang terbaru</h4><br>
                <table class="table table-hover shadow " style="border: 1px solid black">
                    {{-- <th class=" " style="border: 1px solid black !important"> --}}
                    <tr class="bg-secondary">
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Aksi</th>
                    </tr>
                    {{-- </th> --}}
                    <tbody>
                        <tr style="border: 1px solid black">
                            <th class="align-middle" scope="row">1</th>
                            <th class="align-middle">Mark</th>
                            <th class="align-middle">Otto</th>
                            <th class="align-middle">
                                <button type="button" class="btn btn-info">Detail</button>
                                <button type="button" class="btn btn-warning">Edit</button>
                                <button type="button" class="btn btn-danger">Hapus</button>
                            </th>
                        </tr>
                        <tr style="border: 1px solid black">
                            <th class="align-middle" scope="row">2</th>
                            <th class="align-middle">Jacob</th>
                            <th class="align-middle">Thornton</th>
                            <th class="align-middle">
                                <button type="button" class="btn btn-info">Detail</button>
                                <button type="button" class="btn btn-warning">Edit</button>
                                <button type="button" class="btn btn-danger">Hapus</button>
                            </th>
                        </tr>
                        <tr style="border: 1px solid black">
                            <th class="align-middle" scope="row">3</th>
                            <th class="align-middle">Larry</th>
                            <th class="align-middle">the Bird</th>
                            <th class="align-middle">
                                <button type="button" class="btn btn-info">Detail</button>
                                <button type="button" class="btn btn-warning">Edit</button>
                                <button type="button" class="btn btn-danger">Hapus</button>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col">

                <h4>Barang terbaru</h4><br>
                <table class="table table-hover shadow " style="border: 1px solid black">
                    {{-- <th class=" " style="border: 1px solid black !important"> --}}
                    <tr class="bg-secondary">
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Aksi</th>
                    </tr>
                    {{-- </th> --}}
                    <tbody>
                        <tr style="border: 1px solid black">
                            <th class="align-middle" scope="row">1</th>
                            <th class="align-middle">Mark</th>
                            <th class="align-middle">Otto</th>
                            <th class="align-middle">
                                <button type="button" class="btn btn-info">Detail</button>
                                <button type="button" class="btn btn-warning">Edit</button>
                                <button type="button" class="btn btn-danger">Hapus</button>
                            </th>
                        </tr>
                        <tr style="border: 1px solid black">
                            <th class="align-middle" scope="row">2</th>
                            <th class="align-middle">Jacob</th>
                            <th class="align-middle">Thornton</th>
                            <th class="align-middle">
                                <button type="button" class="btn btn-info">Detail</button>
                                <button type="button" class="btn btn-warning">Edit</button>
                                <button type="button" class="btn btn-danger">Hapus</button>
                            </th>
                        </tr>
                        <tr style="border: 1px solid black">
                            <th class="align-middle" scope="row">3</th>
                            <th class="align-middle">Larry</th>
                            <th class="align-middle">the Bird</th>
                            <th class="align-middle">
                                <button type="button" class="btn btn-info">Detail</button>
                                <button type="button" class="btn btn-warning">Edit</button>
                                <button type="button" class="btn btn-danger">Hapus</button>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
