<?php

namespace App\Http\Controllers;

use App\Models\AnulacionVenta;
use Illuminate\Http\Request;

class AnulacionVentaController extends Controller
{

    public function index()
    {
        $anulacionventas = AnulacionVenta::all();
        return view('anulacionventas.index',compact('anulacionventas'));
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
