<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataProyek extends Model
{
    use HasFactory;

    protected $table = 'data_proyeks';
    protected $fillable = [
        'id_proyek',
        'id_customer',
        'nama_proyek',
        'total_bayar',
        'bayar',
        'sisa_bayar',
        'tanggal_mulai',
        'tanggal_selesai',
        'tanggal_bayar',
        'status',
        'keterangan_bayar',
        'harga_total_bahan',
        'harga_jasa',
    ];

    public function customer()
    {
        return $this->belongsTo(DataCustomer::class);
    }
}
