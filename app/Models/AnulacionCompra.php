<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnulacionCompra extends Model
{
    use HasFactory;
    protected $guarded = ['factura_compra'];
    protected $table = 'compra_anulada';
    protected $primaryKey = 'id_compra_anulada';

    public $timestamps = false;
}
