<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    use HasFactory;
    protected $guarded = ['id_det_compra'];
    protected $table = 'detalle_compra';
    protected $primaryKey = 'id_det_compra';

    public $timestamps = false;
}
