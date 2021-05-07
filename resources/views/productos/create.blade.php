<x-app-layout>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <form class="container p-5" action="{{route('productos.store')}}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nombre_producto" class="form-label">Nombre Producto</label>
            <input type="text" class="form-control" name="nombre_producto">
        </div>
        <div class="mb-3">
            <label for="descripcion_producto" class="form-label">Descripcion Producto</label>
            <input type="text" class="form-control" name="descripcion_producto">
        </div>
        <div class="mb-3">
            <label for="existencia" class="form-label">Existencia</label>
            <input type="number" class="form-control" name="existencia">
        </div>
        <div class="mb-3">
            <label for="precio_compra" class="form-label">Precio de Compra</label>
            <input type="number" class="form-control" name="precio_compra">
        </div>
        <div class="mb-3">
            <label for="categoria_id_categoria" class="form-label">Categoria</label>
            <select name="categoria_id_categoria" class="form-control" >
                @foreach((\App\Models\Categoria::all() ?? [] ) as $categoria)
                    <option value="{{$categoria->id_categoria}}">{{$categoria->nombre_categoria}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</x-app-layout>
