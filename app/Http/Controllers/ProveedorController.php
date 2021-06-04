<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProveedorPostRequest;
use App\Models\Proveedor;
use Illuminate\Http\Request;


class ProveedorController extends Controller
{


    public function index()
    {
        $proveedors = Proveedor::paginate(10);
        return view('proveedors.index', compact('proveedors'));
    }

    public function create()
    {
        return view('proveedors.create');
    }


    public function store(ProveedorPostRequest $request)
    {

        $data = $request->validated();
        $proveedor = new Proveedor;
        $proveedor->nombre_proveedor = $data['nombre_proveedor'];
        $proveedor->nit_proveedor = $data['nit_proveedor'];
        $proveedor->direccion_proveedor = $data['direccion_proveedor'];
        $proveedor->telefono = $data['telefono'];
        $proveedor->save();
        return redirect()->route('proveedors.index')->with('status', 'success')->with('statusT', 'Se ha ingresado con exito');
    }


    public function edit($id)
    {
        $proveedor = Proveedor::find($id);
        return view('proveedors.edit', compact('proveedor'));

    }


    public function update(ProveedorPostRequest $request, Proveedor $proveedor)
    {
        $data = $request->validated();
        $proveedor->nombre_proveedor = $data['nombre_proveedor'];
        $proveedor->nit_proveedor = $data['nit_proveedor'];
        $proveedor->direccion_proveedor = $data['direccion_proveedor'];
        $proveedor->telefono = $data['telefono'];
        $proveedor->save();
        return redirect()->route('proveedors.index')->with('status', 'success')->with('statusT', 'Se ha ingresado con exito');
    }


    public function destroy(Request $request, $id)
    {
        try {
            $proveedor = Proveedor::find($id);
            $proveedor->delete();
            return redirect()->route('proveedors.index')->with('status', 'success')->with('statusT', 'Se ha eliminado con exito');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('proveedors.index')->with('status', 'error')->with('statusT', 'No se ha podido eliminar con exito');
        }


    }
}
