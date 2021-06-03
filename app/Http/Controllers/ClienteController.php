<?php

namespace App\Http\Controllers;

use App\Http\Requests\clientePostRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index',compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(ClientePostRequest $request)
    {
        $data = $request->validated();
        $cliente = new cliente;
        $cliente->nit_cliente = $data['nit_cliente'];
        $cliente->nombre_cliente = $data['nombre_cliente'];
        $cliente->direccion_cliente = $data['direccion_cliente'];
        $cliente->telefono = $data['telefono'];
        $cliente->save();
        return redirect()->route('clientes.index')->with('status','success')->with('statusT', 'Se ha ingresado con exito');
    }


    public function edit($id)
    {
        $cliente = Cliente::find($id);
        return view('clientes.edit',compact('cliente'));
    }

    public function update(ClientePostRequest $request, Cliente $cliente)
    {
        $data = $request->validated();
        $cliente->nit_cliente = $data['nit_cliente'];
        $cliente->nombre_cliente = $data['nombre_cliente'];
        $cliente->direccion_cliente = $data['direccion_cliente'];
        $cliente->telefono = $data['telefono'];
        $cliente->save();
        return redirect()->route('clientes.index')->with('status','success')->with('statusT', 'Se ha actualizado con exito');

    }


    public function destroy(Request $request, $id)
    {
        try {
            $cliente= Cliente::find($id);
            $cliente->delete();
            return redirect()->route('clientes.index')->with('status','success')->with('statusT', 'Se ha eliminado con exito');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('productos.index')->with('status', 'error')->with('statusT', 'No se ha podido eliminar con exito');
        }

    }
}
