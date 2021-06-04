<x-app-layout>

    <form class="container p-5  my-5 bg-white shadow-lg rounded-lg" action="{{route('productos.store')}}" method="POST">
        <div class="d-flex align-items-center justify-content-center"><h3  class="display-4 inline-block">Crear Producto</h3></div>
        <hr>
        <ul class="text-danger p-3">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        @csrf

        <div class="mb-3">
            <label for="nombre_producto" class="form-label">Nombre Producto</label>
            <input type="text" class="form-control" name="nombre_producto" value="{{old('nombre_producto')}}">
        </div>
        <div class="mb-3">
            <label for="descripcion_producto" class="form-label">Descripcion Producto</label>
            <input type="text" class="form-control" name="descripcion_producto" value="{{old('descripcion_producto')}}">
        </div>
        <div class="mb-3">
            <label for="existencia" class="form-label">Existencia</label>
            <input type="number" class="form-control" name="existencia" value="{{old('existencia')}}">
        </div>
        <div class="mb-3">
            <label for="precio_compra" class="form-label">Precio de Compra</label>
            <input type="number" class="form-control" name="precio_compra" value="{{old('precio_compra')}}">
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
