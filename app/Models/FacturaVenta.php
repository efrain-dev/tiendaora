<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacturaVenta extends Model
{
    use HasFactory;
    protected $guarded = ['id_venta'];
    protected $table = 'factura_venta';
    protected $primaryKey = 'id_venta';

    public $timestamps = false;
}
