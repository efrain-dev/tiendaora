<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProductoPostRequest;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{

    public function index(Request $request)
    {
        $data = $request->data;
        $productos =   DB::select('begin
        index_productos(\''.$data.'\');
        end;');
        $productos = $this->arrayPaginator($productos, $request);
        return view('productos.index',['productos'=>$productos,'data'=>$data]);
    }

    public function create()
    {
        return view('productos.create');
    }


    public function store(ProductoPostRequest $request)
    {

        $data = $request->validated();
        $producto = new Producto;
        $producto->nombre_producto = $data['nombre_producto'];
        $producto->descripcion_producto = $data['descripcion_producto'];
        $producto->existencia = $data['existencia'];
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
        $producto->existencia = $data['existencia'];
        $producto->precio_compra = $data['precio_compra'];
        $producto->categoria_id_categoria = $data['categoria_id_categoria'];
        $producto->save();
        $procedureName = 'update_precio_venta';
        $bindings = [
            'id_producto'  => $producto->id_producto,
        ];
        $result = DB::executeProcedure($procedureName, $bindings);
        return redirect()->route('productos.index')->with('status','success')->with('statusT', 'Se ha actualizado con exito');

    }


    public function destroy(Request $request, $id)
    {
        $producto= Producto::find($id);
        $producto->delete();
        return redirect()->route('productos.index')->with('status','success')->with('statusT', 'Se ha eliminado con exito');

    }
    private function arrayPaginator($array, $request)
    {
        $total = count($array);
        $page = $request->page ?? 1;
        $perPage = 10;
        $offset = ($page - 1) * $perPage;
        $items = array_slice($array, $offset, $perPage);
        return new LengthAwarePaginator($items, $total, $perPage, $page, ['path' => $request->url(), 'query' => $request->query()]);
    }
    public function getProductos(Request $request)
    {
        $query = DB::select('begin
        select_productos;
        end;');
        return response()->json($query);
    }
}
