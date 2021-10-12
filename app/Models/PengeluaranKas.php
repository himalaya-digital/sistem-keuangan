<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengeluaranKas extends Model
{
    use HasFactory;

    protected $table = 'pengeluaran_kas';
    protected $fillable = [
        'id_user',
        'id_proyek',
        'id_kategori',
        'id_akun',
        'jumlah',
        'keterangan_pengeluaran',
        'tanggal_pengeluaran',
        'jenis_pengeluaran'
    ];

    // relasi
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function proyek()
    {
        return $this->belongsTo(DataProyek::class, 'id_proyek');
    }

    public function kategori()
    {
        return $this->belongsTo(DataKategori::class, 'id_kategori');
    }

    public function dataakun()
    {
        return $this->belongsTo(DataAkun::class, 'id_akun');
    }
}
