<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use NumberFormatter;

class PDFController extends Controller
{
    public function downloadPDF($id)
    {
        $invoice = DB::table('factura_venta')
            ->leftJoin('cliente', 'factura_venta.cliente_id_cliente', '=', 'cliente.id_cliente')
            ->leftJoin('users', 'factura_venta.users_id', '=', 'users.id')
            ->select('factura_venta.*', 'cliente.nombre_cliente','cliente.nit_cliente as emisor',
                'cliente.direccion_cliente', 'users.name as nombre_usuario')
            ->where('factura_venta.id_venta', $id)
            ->first();
        $detalles = DB::table('detalle_venta')
            ->where('detalle_venta.factura_venta_id_venta', $invoice->id_venta)
            ->leftJoin('producto', 'producto.id_producto', '=', 'detalle_venta.producto_id_producto')
            ->select('detalle_venta.*', 'producto.nombre_producto', 'producto.descripcion_producto')
            ->get();
        $total =0;
        foreach ($detalles as $detalle){
            $total =+$detalle->total;
        }
        $formatterES = new NumberFormatter("es", NumberFormatter::SPELLOUT);
        $decimales = explode(".", number_format($total, 2, ".", ""));
        $total_letras = strtoupper($formatterES->format($decimales[0])) . ' QUETZALES ' . $decimales[1] . '/100';

        PDF::setOptions(['isHtml5ParserEnabled' => true,'defaultPaperSize' => 'a4']);
        $pdf = PDF::loadView('invoicePDF',compact('invoice', 'detalles','total','total_letras'));
        return $pdf->stream('invoice.pdf');
    }

}
