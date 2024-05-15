<?php

namespace App\Exports;

use App\Models\BarangModel;
use App\Models\PeminjamanModel;
use App\Models\TransaksiModel;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PeminjamanExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return PeminjamanModel::all();
    }
    public function headings(): array
    {
        $columns = Schema::getColumnListing('t_peminjaman');
        return $columns;
        // Tambahkan string lainnya untuk header kolom lainnya;
    }
}
