<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_dokumen';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_dokumen',
        'jenis_dokumen',
        'judul',
        'file_url',
    ];
}
