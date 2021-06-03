<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriaPostRequest;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{

    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index',compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }


    public function store(CategoriaPostRequest $request )
    {
        $data = $request->validated();
        $categoria = new Categoria;
        $categoria->nombre_categoria = $data['nombre_categoria'];
        $categoria->descripcion_categoria = $data['descripcion_categoria'];
        $categoria->save();
        return redirect()->route('categorias.index')->with('status','success')->with('statusT', 'Se ha ingresado con exito');
    }





    public function edit($id)
    {
        $categoria = Categoria::find($id);
        return view('categorias.edit',compact('categoria'));

    }


    public function update(CategoriaPostRequest $request, Categoria $categoria)
    {
        $data = $request->validated();
        $categoria->nombre_categoria = $data['nombre_categoria'];
        $categoria->descripcion_categoria = $data['descripcion_categoria'];
        $categoria->save();
        return redirect()->route('categorias.index')->with('status','success')->with('statusT', 'Se ha actualizado con exito');

    }


    public function destroy(Request $request, $id)
    {

        try {
            $categoria= Categoria::find($id);
            $categoria->delete();
            return redirect()->route('categorias.index')->with('status','success')->with('statusT', 'Se ha eliminado con exito');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('productos.index')->with('status', 'error')->with('statusT', 'No se ha podido eliminar con exito');
        }

    }
}
