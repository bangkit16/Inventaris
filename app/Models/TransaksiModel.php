<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransaksiModel extends Model
{
    use HasFactory;

    protected $table = 't_transaksi';
    protected $primaryKey = 'id_transaksi';

    protected $fillable = ['id_barang', 'id_user', 'barang_masuk', 'barang_keluar', 'tgl_transaksi', 'status'];
    // protected $guarded = ['id_transaksi'];

    public function barang(): BelongsTo
    {
        return $this->belongsTo(BarangModel::class, 'id_barang', 'id_barang');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(UserModel::class, 'id_user', 'id_user');
    }
}
