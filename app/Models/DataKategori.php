<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKategori extends Model
{
    use HasFactory;

    protected $table = 'data_kategoris';
    protected $fillable = [
        'id_kategori',
        'nama_kategori',
    ];

    public function dataproyek()
    {
        return $this->hasMany(DataProyek::class);
    }
}
