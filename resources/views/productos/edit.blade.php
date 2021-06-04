<x-app-layout>

    <form class="container p-5  my-5 bg-white shadow-lg rounded-lg" action="{{route('productos.update',['producto'=>$producto->id_producto])}}"
          method="POST">
        <div class="d-flex align-items-center justify-content-center"><h3  class="display-4 inline-block">Editar Producto</h3></div>
        <hr>
        <ul class="text-danger p-3">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="palabra1" class="form-label">Nombre Producto</label>
            <input type="text" class="form-control" name="nombre_producto" value="{{$producto->nombre_producto}}">
        </div>
        <div class="mb-3">
            <label for="palabra2" class="form-label">Descripcion Producto</label>
            <input type="text" class="form-control" name="descripcion_producto"
                   value="{{$producto->descripcion_producto}}">
        </div>
        <div class="mb-3">
            <label for="palabra3" class="form-label">Existencia</label>
            <input type="number" class="form-control" name="existencia" value="{{$producto->existencia}}">
        </div>
        <div class="mb-3">
            <label for="palabra4" class="form-label">Precio de Compra</label>
            <input type="number" class="form-control" name="precio_compra" value="{{$producto->precio_compra}}">
        </div>
        <div class="mb-3">
            <label for="categoria_id_categoria" class="form-label">Categoria</label>
            <select name="categoria_id_categoria" class="form-control">
                @foreach((\App\Models\Categoria::all() ?? [] ) as $categoria)
                    @if($producto->id_categoria == $categoria->id_categoria)
                        <option selected value="{{$categoria->id_categoria}}">{{$categoria->nombre_categoria}}</option>
                    @else
                        <option value="{{$categoria->id_categoria}}">{{$categoria->nombre_categoria}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</x-app-layout>
