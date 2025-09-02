<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Permintaan extends Model
{
    use HasFactory;

    protected $primaryKey = 'no';

    protected $fillable = [
        'id_permintaan',
        'pemohon',
        'jenis_permintaan',
        'status',
        'keterangan',
        'created_at',
        'updated_at',
    ];
}
