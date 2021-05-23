<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImpuestoCompra extends Model
{
    use HasFactory;

    protected $guarded = ['factura_id_compra'];
    protected $table = 'impuesto_compra';
    protected $primaryKey = 'id_impuesto_compra';

    public $timestamps = false;
}
