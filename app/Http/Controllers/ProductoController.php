<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProductoPostRequest;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{

    public function index()
    {
        $productos = Producto::all();
        return view('productos.index',compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }


    public function store(ProductoPostRequest $request )
    {
        $data = $request->validated();
        $producto = new Producto;
        $producto->nombre_producto = $data['nombre_producto'];
        $producto->descripcion_producto = $data['descripcion_producto'];
        $producto->cantidad = $data['cantidad'];
        $producto->precio_compra = $data['precio_compra'];
        $producto->categoria_id_categoria = $data['categoria_id_categoria'];
        $producto->save();
        return redirect()->route('productos.index')->with('status','success')->with('statusT', 'Se ha ingresado con exito');
    }





    public function edit($id)
    {
        $producto = Producto::find($id);
        return view('productos.edit',compact('producto'));

    }


    public function update(ProductoPostRequest $request, Producto $producto)
    {
        $data = $request->validated();
        $producto->nombre_producto = $data['nombre_producto'];
        $producto->descripcion_producto = $data['descripcion_producto'];
        $producto->cantidad = $data['cantidad'];
        $producto->precio_compra = $data['precio_compra'];
        $producto->categoria_id_categoria = $data['categoria_id_categoria'];
        $producto->save();
        return redirect()->route('productos.index')->with('status','success')->with('statusT', 'Se ha actualizado con exito');

    }


    public function destroy(Request $request, $id)
    {
        $producto= Producto::find($id);
        $producto->delete();
        return redirect()->route('productos.index')->with('status','success')->with('statusT', 'Se ha eliminado con exito');

    }
}