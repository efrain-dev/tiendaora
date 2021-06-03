<?php

namespace App\Http\Controllers;

use App\Models\AnulacionCompra;
use App\Models\AnulacionVenta;
use App\Models\ImpuestoCompra;
use App\Models\ImpuestoVenta;
use Illuminate\Http\Request;

class TransaccionesController extends Controller
{
    public function anulacionVentasIndex()
    {
        $anulacionventas = AnulacionVenta::all();
        return view('transacciones.anulacion-ventas',compact('anulacionventas'));
    }
    public function anulacionComprasIndex()
    {
        $anulacioncompras = AnulacionCompra::all();
        return view('transacciones.anulacion-compras',compact('anulacioncompras'));
    }
    public function impuestoComprasIndex()
    {
        $impuestocompras = ImpuestoCompra::all();
        return view('transacciones.impuesto-compras',compact('impuestocompras'));
    }
    public function impuestoVentasIndex()
    {
        $impuestoventas = ImpuestoVenta::all();
        return view('transacciones.impuesto-ventas',compact('impuestoventas'));

    }
}
