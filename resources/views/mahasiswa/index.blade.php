@extends('layouts.template')
@section('content')
    <div class="container-fluid">
        {{-- <div class="d-flex"> --}}
        <h4>Daftar peminjam yang terdaftar dalam sistem</h4><br>
        {{-- <a class="btn btn-large btn-primary mt-1 float-right fw-bold fs-5"
            href="{{ url('mahasiswa/create') }}"><strong>Tambah</strong></a> --}}


        <a href="{{ url('mahasiswa/create') }}" class="btn  btn-large btn-primary mt-1 float-right fw-bold fs-5">
            <strong>Tambah Data</strong>
        </a>
        {{-- <div class="row">
            <label class="col-1 control-label col-form-label">Filter:</label>
            <div class="col-3">
                <select class="form-control" id="id_level" name="id_level" required>
                    <option value="">- Semua -</option>
                    @foreach ($level as $item)
                        <option value="{{ $item->id_level }}">{{ $item->level_nama }}</option>
                    @endforeach
                </select>
                <small class="form-text text-muted">Level</small>
            </div>
        </div> --}}


        {{-- </div> --}}

        <br><br>
        <table class="table table-hover shadow " style="border: 1px solid black" id="table_mahasiswa">
            {{-- <th class=" " style="border: 1px solid black !important"> --}}
            <thead>

                <tr class="" style="background-color: #D9D9D9;border: 2px solid black">
                    <th scope="col">ID</th>
                    <th scope="col">Nama</th>
                    <th scope="col">NIM</th>
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
        // function deleteD() {


        function deleteData() {
            event.preventDefault();
            // var form = document.forms["#deleteData"];
            // var form = document.forms[
            //     "#deleteData"
            // ];
            var form = event.target.form;
            console.log(form);
            const deleteD = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success ml-2",
                    cancelButton: "btn btn-danger"
                },
                buttonsStyling: false
            });
            deleteD.fire({
                title: "Apakah anda yakin menghapus data?",
                text: "anda tidak dapat mengembalikan data ini!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya",
                cancelButtonText: "No",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                    // deleteD.fire({
                    //     title: "Terhapus!",
                    //     text: "Data anda berhasil di hapus.",
                    //     icon: "success"
                    // });
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    deleteD.fire({
                        title: "Dibatalkan",
                        text: "File anda masih aman",
                        icon: "error"
                    });
                }
            });
        };
        // };
        // import Swal from 'sweetalert2';
        $(document).ready(function() {
            var dataBarang = $('#table_mahasiswa').DataTable({
                serverSide: true, // serverSide: true, jika ingin menggunakan server side processing
                ajax: {
                    "url": "{{ url('mahasiswa/list') }}",
                    "dataType": "json",
                    "type": "POST",
                    //"data": function(d) {
                     //   d.id_level = $('#id_level').val();
                      //  // d.id_user = $('#id_user').val();
                    //}
                },
                columns: [{
                    data: "DT_RowIndex", // nomor urut dari laravel datatable addIndexColumn()
                    className: "text-center",
                    orderable: false,
                    searchable: false
                }, {
                    
                    data: "nama",
                    className: "",
                    orderable: true, // orderable: true, jika ingin kolom ini bisa diurutkan
                    searchable: true // searchable: true, jika ingin kolom ini bisa dicari
                }, {
                    data: "nim",
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
            // $('#id_level').on('change', function() {
            //     dataBarang.ajax.reload();
            // });

            // or via CommonJS
            // const Swal = require('sweetalert2')


            // $('#modal-xl').modal('show');
            // $('#tambahBarang').on('submit', function(e) {
            //     e.preventDefault();
            //     $.ajax({
            //         url: "{{ url('mahasiswa/') }}", // Ganti dengan URL tujuan Anda
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
