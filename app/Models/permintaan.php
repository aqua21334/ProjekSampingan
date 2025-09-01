<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_permintaan';

    protected $fillable = [
        'pemohon',
        'jenis_permintaan',
        'status',
        'keterangan',
    ];
}
