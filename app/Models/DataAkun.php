<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAkun extends Model
{
    use HasFactory;

    protected $table = 'data_akuns';
    protected $fillable = [
        'id_user',
        'nama_akun',
        'kode_akun',
        'tipe_akun',
    ];

    // relation
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function pemasukankas()
    {
        return $this->hasMany(PemasukanKas::class);
    }

    public function pengeluarankas()
    {
        return $this->hasMany(PengeluaranKas::class);
    }

    public function asetaktif()
    {
        return $this->hasMany(AsetAktif::class);
    }
}
