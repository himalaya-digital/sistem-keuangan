<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemasukanKas extends Model
{
    use HasFactory;

    protected $table = 'pemasukan_kas';
    protected $fillable = [
        'id_user',
        'id_proyek',
        'id_akun',
        'keterangan_pemasukan',
        'tanggal_pemasukan'
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
