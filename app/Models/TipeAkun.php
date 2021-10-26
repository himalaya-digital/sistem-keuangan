<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeAkun extends Model
{
    use HasFactory;

    protected $table = 'tipe_akuns';
    protected $fillable = [
        'tipe_akun'
    ];

    public function dataakun()
    {
        return $this->hasMany(DataAkun::class);
    }

    public function pengeluaran()
    {
        return $this->hasMany(PengeluaranKas::class);
    }
}
