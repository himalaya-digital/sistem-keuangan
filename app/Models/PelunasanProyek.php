<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelunasanProyek extends Model
{
    use HasFactory;

    protected $table = 'data_pelunasan_proyeks';
    protected $fillable = [
        'id_pelunasan_proyek',
        'id_proyek',
        'tanggal_pembayaran',
        'jumlah_bayar',
        'sisa_piutang',
    ];

    public function proyek()
    {
        return $this->belongsTo(DataProyek::class, 'id_proyek');
    }
}
