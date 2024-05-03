<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DendaModel extends Model
{
    use HasFactory;

    protected $table = 't_denda';
    protected $primaryKey = 'id_denda';

    protected $fillable = ['id_pengembalian', 'keterangan'];
    // protected $guarded = ['id_transaksi'];

    public function peminjaman(): BelongsTo
    {
        return $this->belongsTo(PengembalianModel::class, 'id_pengembalian', 'id_pengembalian');
    }
}
