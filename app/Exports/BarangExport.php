<?php

namespace App\Exports;

use App\Models\BarangModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BarangExport implements FromCollection, WithHeadings , ShouldAutoSize
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return BarangModel::all();
    }
    public function headings(): array
    {
        return [
            'id_barang',
            'nama_barang',
            'harga',
            'stok',
            'created_at',
            'updated_at',
            // Tambahkan string lainnya untuk header kolom lainnya
        ];
    }
}
