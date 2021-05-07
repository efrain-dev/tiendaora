<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $guarded = ['id_proveedor'];
    protected $table = 'proveedor';
    protected $primaryKey = 'id_proveedor';

    public $timestamps = false;
}
