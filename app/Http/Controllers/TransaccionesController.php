<?php

namespace App\Http\Controllers;

use App\Models\AnulacionVenta;
use App\Models\ImpuestoCompra;
use App\Models\ImpuestoVenta;
use Illuminate\Http\Request;

class TransaccionesController extends Controller
{
    public function anulacionVentasIndex()
    {
        $anulacionventas = AnulacionVenta::all();
        return view('AnulacionVentas.index',compact('anulacionventas'));
    }
    public function anulacionComprasIndex()
    {
        $anulacionventas = AnulacionVenta::all();
        return view('AnulacionVentas.index',compact('anulacionventas'));
    }
    public function impuestoComprasIndex()
    {
        $impuestocompras = ImpuestoCompra::all();
        return view('impuestocompras.index',compact('impuestocompras'));
    }
    public function impuestoVentasIndex()
    {
        $impuestoventas = ImpuestoVenta::all();
        return view('impuestoventas.index',compact('impuestoventas'));

    }
}
