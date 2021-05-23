<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImpuestoVenta extends Model
{
    use HasFactory;

    protected $guarded = ['factura_id_venta'];
    protected $table = 'impuesto_venta';
    protected $primaryKey = 'id_impuesto_venta';

    public $timestamps = false;
}
