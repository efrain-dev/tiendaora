<x-app-layout>

    <form class="container p-5" action="{{route('productos.store')}}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="palabra1" class="form-label">Nombre Producto</label>
            <input type="text" class="form-control" name="nombre_producto">
        </div>
        <div class="mb-3">
            <label for="palabra2" class="form-label">Descripcion Producto</label>
            <input type="text" class="form-control" name="descripcion_producto">
        </div>
        <div class="mb-3">
            <label for="palabra3" class="form-label">Existencia</label>
            <input type="number" class="form-control" name="existencia">
        </div>
        <div class="mb-3">
            <label for="palabra4" class="form-label">Precio de Compra</label>
            <input type="number" class="form-control" name="precio_compra">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</x-app-layout>
