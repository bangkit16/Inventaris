<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PengembalianModel extends Model
{
    use HasFactory;

    protected $table = 't_pengembalian';
    protected $primaryKey = 'id_pengembalian';

    protected $fillable = ['id_peminjaman', 'tgl_kembali'];
    // protected $guarded = ['id_transaksi'];

    public function peminjaman(): BelongsTo
    {
        return $this->belongsTo(PeminjamanModel::class, 'id_peminjaman', 'id_peminjaman');
    }
    public function denda(): HasOne
    {
        return $this->hasOne(DendaModel::class, 'id_pengembalian', 'id_pengembalian');
    }
}
