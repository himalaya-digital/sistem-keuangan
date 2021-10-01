<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengeluaranKas extends Model
{
    use HasFactory;

    protected $table = 'pengeluaran_kas';
    protected $fillable = [
        'id_pengeluaran_kas',
        'id_user',
        'id_proyek',
        'id_akun',
        'keterangan_pengeluaran',
        'tanggal_pengeluaran',
        'total_pengeluaran'
    ];

    // relasi
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function dataakun()
    {
        return $this->belongsTo(DataAkun::class, 'id_akun');
    }

    public function dataproyek()
    {
        return $this->belongsTo(DataProyek::class, 'id_proyek');
    }
}
