<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PeminjamanModel extends Model
{
    use HasFactory;
    protected $table = 't_peminjaman';
    protected $primaryKey = 'id_peminjaman';

    protected $fillable = ['id_barang', 'id_user', 'id_mahasiswa', 'tgl_pinjam', 'tgl_tenggat', 'jumlah'];
    // protected $guarded = ['id_transaksi'];

    public function barang(): BelongsTo
    {
        return $this->belongsTo(BarangModel::class, 'barang_id', 'barang_id');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(UserModel::class, 'user_id', 'user_id');
    }
    public function mahasiswa(): BelongsTo
    {
        return $this->belongsTo(MahasiswaModel::class, 'id_mahasiswa', 'id_mahasiswa');
    }
}
