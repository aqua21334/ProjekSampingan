<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peralatan extends Model
{
    use HasFactory;

    protected $primaryKey = 'kode_bmn';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'kode_bmn',
        'nama_peralatan',
        'tanggal_kalibrasi',
        'status_kalibrasi',
    ];
}