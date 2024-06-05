<?php

namespace App\Exports;

use App\Models\BarangModel;
use App\Models\TransaksiModel;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TransaksiExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // return TransaksiModel::with('user', 'barang')->select('id_transaksi',  'user.nama', 'barang.nama_barang', 'barang_masuk', 'barang_keluar', 'tgl_transaksi', 'status', 'created_at', 'update_at')->get();
        return TransaksiModel::join('m_user', 't_transaksi.id_user', '=', 'm_user.id_user')
            ->join('m_barang', 't_transaksi.id_barang', '=', 'm_barang.id_barang')
            ->select(
                'id_transaksi',
                'm_user.nama as user_nama',
                'm_barang.nama_barang as nama_barang',
                'barang_masuk',
                'barang_keluar',
                'tgl_transaksi',
                'status',
                't_transaksi.created_at',
                't_transaksi.updated_at'
            )
            ->with(['user', 'barang'])
            ->get();
    }
    public function headings(): array
    {
        $columns = Schema::getColumnListing('t_transaksi');
        return $columns;
        // Tambahkan string lainnya untuk header kolom lainnya;
    }
}
