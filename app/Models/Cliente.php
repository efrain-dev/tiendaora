<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $guarded = ['id_cliente'];
    protected $table = 'cliente';
    protected $primaryKey = 'id_cliente';

    public $timestamps = false;
}
