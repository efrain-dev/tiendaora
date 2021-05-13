<?php

namespace App\Http\Controllers;

use App\Models\ImpuestoVenta;
use Illuminate\Http\Request;

class ImpuestoVentaController extends Controller
{

    public function index()
    {
        $impuestoventas = ImpuestoVenta::all();
        return view('impuestoventas.index',compact('impuestoventas'));

    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
