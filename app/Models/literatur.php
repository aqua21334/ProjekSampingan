<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Literatur extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_literatur';

    protected $fillable = [
        'judul',
        'penulis',
        'tahun',
        'penerbit',
        'sni_number',
        'link',
    ];
}
