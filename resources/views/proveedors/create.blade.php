<x-app-layout>
    <form class="container p-5  my-5 bg-white shadow-lg rounded-lg" action="{{route('proveedors.store')}}" method="POST">
        <div class="d-flex align-items-center justify-content-center"><h3  class="display-4 inline-block">Crear Proveedor</h3></div>
        <hr>
        <ul class="text-danger p-3">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        @csrf

        <div class="mb-3">
            <label for="nombre_proveedor" class="form-label">Nombre Proveedor</label>
            <input type="text" class="form-control" name="nombre_proveedor" value="{{old('nombre_proveedor')}}">
        </div>
        <div class="mb-3">
            <label for="nit_proveedor" class="form-label">Nit del Proveedor</label>
            <input type="number" class="form-control" name="nit_proveedor" value="{{old('nit_proveedor')}}">
        </div>
        <div class="mb-3">
            <label for="direccion_proveedor" class="form-label">Direccion Proveedor</label>
            <input type="text" class="form-control" name="direccion_proveedor" value="{{old('direccion_proveedor')}}">
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="number" class="form-control" name="telefono" value="{{old('telefono')}}">
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</x-app-layout>
