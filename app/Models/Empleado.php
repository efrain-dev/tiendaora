<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $guarded = ['id_empleado'];
    protected $table = 'empleado';
    protected $primaryKey = 'id_empleado';

    public $timestamps = false;
}
