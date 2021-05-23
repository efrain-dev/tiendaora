<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    use HasFactory;
    protected $guarded = ['id_det_venta'];
    protected $table = 'detalle_venta';
    protected $primaryKey = 'id_det_venta';

    public $timestamps = false;
}
