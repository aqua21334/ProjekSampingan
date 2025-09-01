<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sop extends Model
{
    use HasFactory;

    protected $primaryKey = 'kode_sop';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'kode_sop',
        'nama_sop',
        'deskripsi_sop',
    ];
}
