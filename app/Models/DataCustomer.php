<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataCustomer extends Model
{
    use HasFactory;

    protected $table = 'data_customers';
    protected $fillable = [
        'id_customer',
        'nama_customer',
        'no_telpon',
        'alamat',
    ];
}
