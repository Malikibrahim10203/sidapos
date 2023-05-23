<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balita extends Model
{
    use HasFactory;

    protected $table = 'balita';
    protected $primaryKey = 'idbalita';
    protected $fillable = [
        'namalengkap',
        'alamat',
        'tanggal_lahir',
        'imunisasi_bcg',
        'imunisasi_campak',
        'imunisasi_dpt_hb_hib',
        'imunisasi_hepatitis_b',
        'imunisasi_polio'
    ];
}
