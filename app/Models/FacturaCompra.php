<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacturaCompra extends Model
{
    use HasFactory;
    protected $guarded = ['id_compra'];
    protected $table = 'factura_compra';
    protected $primaryKey = 'id_compra';

    public $timestamps = false;
}
