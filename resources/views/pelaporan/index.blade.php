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

        <h4>Selamat Datang dalam menu pelaporan</h4><br>
        <div class="card outline-primary">
            <h5 class="card-header">Pelaporan</h5>
            <div class="card-body">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Data</th>
                            <th scope="col">Jenis Laporan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Data Barang</th>
                            <td>
                                <div class="d-flex flex-row bd-highlight mb-3 ">
                                    <a style="font-weight: 600" href="{{ url('/pelaporan/barangCsv') }}" type="a"
                                        class="btn btn-primary mr-2">CSV</a>
                                    <a style="font-weight: 600" href="{{ url('/pelaporan/barangPdf') }}" type="a"
                                        class="btn btn-secondary  mr-2">PDF</a>
                                    <a style="font-weight: 600" href="{{ url('/pelaporan/barangExcel') }}" type="a"
                                        class="btn btn-info ">Excel</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>Data Transaksi Barang</th>
                            <td>
                                <div class="d-flex flex-row bd-highlight mb-3 ">
                                    <a style="font-weight: 600" href="{{ url('/pelaporan/transaksiCsv') }}" type="a"
                                        class="btn btn-primary mr-2">CSV</a>
                                    <a style="font-weight: 600" href="{{ url('/pelaporan/transaksiPdf') }}" type="a"
                                        class="btn btn-secondary  mr-2">PDF</a>
                                    <a style="font-weight: 600" href="{{ url('/pelaporan/transaksiExcel') }}" type="a"
                                        class="btn btn-info ">Excel</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>Data Peminjaman</th>
                            <td>
                                <div class="d-flex flex-row bd-highlight mb-3 ">
                                    <a style="font-weight: 600" href="{{ url('/pelaporan/peminjamanCsv') }}" type="a"
                                        class="btn btn-primary mr-2">CSV</a>
                                    <a style="font-weight: 600" href="{{ url('/pelaporan/peminjamanPdf') }}" type="a"
                                        class="btn btn-secondary  mr-2">PDF</a>
                                    <a style="font-weight: 600" href="{{ url('/pelaporan/peminjamanExcel') }}" type="a"
                                        class="btn btn-info ">Excel</a>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <style>
        </style>


        <!-- Button trigger modal -->
        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalBarangMasuk">
            Launch demo modal
        </button> --}}

        <!-- Modal -->

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
