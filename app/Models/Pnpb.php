<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pnpb extends Model
{
    protected $table = 'pnpbs';
    protected $primaryKey = 'kode_billing';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'kode_billing',
        'pelanggan',
        'rupiah',
    ];
}
