<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsetAktif extends Model
{
    use HasFactory;

    protected $table = 'aset_aktifs';
    protected $fillable = [
        'nama_aset',
        'id_akun',
        'biaya_akuisisi',
        'nilai_residu',
        'masa_manfaat',
        'penyusutan',
        'tanggal_akuisisi',
    ];

    // relations
    public function dataakun()
    {
        return $this->belongsTo(DataAkun::class, 'id_akun');
    }
}
