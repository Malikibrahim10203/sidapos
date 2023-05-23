<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ibuhamil extends Model
{
    use HasFactory;

    protected $table = 'ibuhamil';
    protected $primaryKey = 'idibuhamil';
    protected $fillable = [
        'namalengkap',
        'hpht',
        'alamat',
        'idposyandu'
    ];
}
