<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenambahanModal extends Model
{
    use HasFactory;

    protected $table = 'penambahan_modals';
    protected $fillable = [
        'penambahan',
        'tanggal_penambahan'
    ];
}
