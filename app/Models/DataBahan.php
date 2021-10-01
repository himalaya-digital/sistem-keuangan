<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBahan extends Model
{
    use HasFactory;

    protected $table = 'data_bahans';
    protected $fillable = [
        'id_proyek',
        'jumlah',
        'harga_satuan',
        'total',
    ];

    public function proyek()
    {
        return $this->belongsTo(DataProyek::class, 'id_proyek');
    }
}
