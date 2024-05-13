{{-- <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css" /> --}}
<style>
    /* {{-- You can add AdminLTE customizations here --}} */
    .active {
        background-color: #50C4ED !important;
        color: white;

    }

    .nav-item p {
        color: black;
        font-weight: 600;
        font-size: 18px;
    }

    .nav-item i {
        color: black;
        font-weight: 600;
        font-size: 18px;
    }

    .active p {
        /* background-color: #50C4ED; */
        /* font-size: 15px; */
        color: white;
    }

    .active i {
        /* background-color: #50C4ED; */
        /* font-size: 15px; */
        color: white;
    }

    .nav .nav-header {
        color: black;
        font-weight: 600;
        font-size: 16px;
    }
</style>


<div class="sidebar">
    <hr class="bg-white border-white " style="height: 1px" />
    <!-- Sidebar Menu -->
    <nav class="">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-header">Menu</li>
            <li class="nav-item">
                <a href="{{ url('/') }}" class="nav-link  {{ $activeMenu == 'dashboard' ? 'active' : '' }} ">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-header">Data Pengguna</li>

            {{-- <li class="nav-item">
                <a href="{{ url('/level') }}" class="nav-link {{ $activeMenu == 'level' ? 'active' : '' }} ">
                    <i class="nav-icon fas fa-layer-group"></i>
                    <p>Level User</p>
                </a>
            </li> --}}
            <li class="nav-item">
                <a href="{{ url('/user') }}" class="nav-link {{ $activeMenu == 'user' ? 'active' : '' }}">
                    <i class="nav-icon far fa-user"></i>
                    <p>Data User</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/mahasiswa') }}" class="nav-link {{ $activeMenu == 'mahasiswa' ? 'active' : '' }}">
                    <i class="nav-icon far fa-users"></i>
                    <p>Data Peminjam</p>
                </a>
            </li>
            <li class="nav-header">Data Barang</li>
            <li class="nav-item">
                <a href="{{ url('/barang') }}" class="nav-link {{ $activeMenu == 'barang' ? 'active' : '' }} ">
                    <i class="nav-icon far fa-list-alt"></i>
                    <p>Data Barang</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/barang_masuk') }}"
                    class="nav-link {{ $activeMenu == 'barang_masuk' ? 'active' : '' }} ">
                    <i class="nav-icon far fa-box"></i>
                    <p>Barang Masuk</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/barang_keluar') }}"
                    class="nav-link {{ $activeMenu == 'barang_keluar' ? 'active' : '' }} ">
                    <i class="nav-icon far fa-box-open"></i>
                    <p>Barang Keluar</p>
                </a>
            </li>
            <li class="nav-header">Data Transaksi</li>
            <li class="nav-item">
                <a href="{{ url('/peminjaman') }}"
                    class="nav-link {{ $activeMenu == 'peminjaman' ? 'active' : '' }} ">
                    <i class="nav-icon fas fa-exchange-alt"></i>
                    <p>Peminjaman</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/pengembalian') }}"
                    class="nav-link {{ $activeMenu == 'pengembalian' ? 'active' : '' }} ">
                    <i class="nav-icon fas fa-undo"></i>
                    <p>Pengembalian</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/denda') }}" class="nav-link {{ $activeMenu == 'denda' ? 'active' : '' }} ">
                    <i class="nav-icon fas fa-hand-holding-usd"></i>
                    <p>Transaksi Denda</p>
                </a>
            </li>
            <hr class="bg-white border-white " style="height: 1px" />
            <li class="nav-item d-flex justify-content-end">
                <a href="{{ url('/logout') }}" class="nav-link ">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>Logout</p>
                </a>
            </li>

        </ul>
    </nav>
</div>
