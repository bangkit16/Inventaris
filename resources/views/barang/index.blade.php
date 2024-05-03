@extends('layouts.template')
@section('content')
    <div class="container-fluid">
        {{-- <div class="d-flex"> --}}
        <h4>Daftar Barang yang terdaftar dalam sistem</h4><br>
        {{-- <a class="btn btn-large btn-primary mt-1 float-right fw-bold fs-5"
            href="{{ url('barang/create') }}"><strong>Tambah</strong></a> --}}


        <a href="{{ url('barang/create') }}" class="btn  btn-large btn-primary mt-1 float-right fw-bold fs-5">
            <strong>Tambah Data</strong>
        </a>


        {{-- </div> --}}

        <br><br>
        <table class="table table-hover shadow " style="border: 1px solid black" id="table_barang">
            {{-- <th class=" " style="border: 1px solid black !important"> --}}
            <thead>

                <tr class="" style="background-color: #D9D9D9;border: 2px solid black">
                    <th scope="col">ID</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
@endsection
@push('css')
@endpush
@push('js')
    <script>
        // function deleteData() {

        const deleteData = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success ml-2",
                cancelButton: "btn btn-danger"
            },
            buttonsStyling: false
        });
        deleteData.fire({
            title: "Are you suree?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                deleteData.fire({
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    icon: "success"
                });
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                deleteData.fire({
                    title: "Cancelled",
                    text: "Your imaginary file is safe :)",
                    icon: "error"
                });
            }
        });
        // };
        // import Swal from 'sweetalert2';
        $(document).ready(function() {
            var dataBarang = $('#table_barang').DataTable({
                serverSide: true, // serverSide: true, jika ingin menggunakan server side processing
                ajax: {
                    "url": "{{ url('barang/list') }}",
                    "dataType": "json",
                    "type": "POST",

                },
                columns: [{
                    data: "DT_RowIndex", // nomor urut dari laravel datatable addIndexColumn()
                    className: "text-center",
                    orderable: false,
                    searchable: false
                }, {
                    data: "nama_barang",
                    className: "",
                    orderable: true, // orderable: true, jika ingin kolom ini bisa diurutkan
                    searchable: true // searchable: true, jika ingin kolom ini bisa dicari
                }, {
                    data: "harga",
                    className: "",
                    orderable: true, // orderable: true, jika ingin kolom ini bisa diurutkan
                    searchable: true // searchable: true, jika ingin kolom ini bisa dicari
                }, {
                    data: "stok",
                    className: "",
                    orderable: true, // orderable: true, jika ingin kolom ini bisa diurutkan
                    searchable: true // searchable: true, jika ingin kolom ini bisa dicari
                }, {
                    data: "aksi",
                    className: "",
                    orderable: false, // orderable: true, jika ingin kolom ini bisa diurutkan
                    searchable: false // searchable: true, jika ingin kolom ini bisa dicari
                }]
            });

            // or via CommonJS
            // const Swal = require('sweetalert2')


            // $('#modal-xl').modal('show');
            // $('#tambahBarang').on('submit', function(e) {
            //     e.preventDefault();
            //     $.ajax({
            //         url: "{{ url('barang/') }}", // Ganti dengan URL tujuan Anda
            //         method: 'post',
            //         data: $(this).serialize(),
            //         success: function(response) {
            //             // Tutup modal
            //             console.log(response);
            //             if (response.success == true) {
            //                 $('#table_barang').DataTable().ajax.reload();
            //                 alert("data di berhasil");
            //             } else {
            //                 alert("opo ngono");
            //             }
            //             // $('#modal-xl').modal('hide');
            //             // Tambahkan data baru ke tabel
            //         },
            //         // error: function(jqXHR, textStatus, errorThrown) {
            //         //     // Tampilkan modal dan pesan kesalahan jika validasi gagal
            //         //     $('#modal-xl').modal('show');
            //         //     alert('Terjadi kesalahan: ' + errorThrown);
            //         // }
            //     });
            // });
        });
    </script>
@endpush
