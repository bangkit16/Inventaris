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
        return TransaksiModel::all();
    }
    public function headings(): array
    {
        $columns = Schema::getColumnListing('t_transaksi');
        return $columns;
        // Tambahkan string lainnya untuk header kolom lainnya;
    }
}
