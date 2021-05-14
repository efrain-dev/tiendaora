<?php

namespace App\Http\Controllers;

use App\Models\ImpuestoCompra;
use Illuminate\Http\Request;

class ImpuestoCompraController extends Controller
{

    public function index()
    {
        $impuestocompras = ImpuestoCompra::all();
        return view('impuestocompras.index',compact('impuestocompras'));
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
