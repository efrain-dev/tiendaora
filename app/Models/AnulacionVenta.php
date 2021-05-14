<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnulacionVenta extends Model
{
    use HasFactory;

    protected $guarded = ['factura_venta'];
    protected $table = 'venta_anulada';
    protected $primaryKey = 'id_venta_anulada';

    public $timestamps = false;
}
