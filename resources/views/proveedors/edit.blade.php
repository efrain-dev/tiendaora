<x-app-layout>
    <form class="container p-5"
          action="{{route('proveedors.update',['proveedor'=>$proveedor->id_proveedor])}}" method="POST">
        <ul class="text-danger p-3">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="nombre_proveedor" class="form-label">Nombre Proveedor</label>
            <input type="text" class="form-control" name="nombre_proveedor"
                   value="{{$proveedor->nombre_proveedor}}">
        </div>
        <div class="mb-3">
            <label for="nit_proveedor" class="form-label">Nit del Proveedor</label>
            <input type="number" class="form-control" name="nit_proveedor"
                   value="{{$proveedor->nit_proveedor}}">
        </div>
        <div class="mb-3">
            <label for="direccion_proveedor" class="form-label">Direccion Proveedor</label>
            <input type="text" class="form-control" name="direccion_proveedor"
                   value="{{$proveedor->direccion_proveedor}}">
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="number" class="form-control" name="telefono" value="{{$proveedor->telefono}}">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</x-app-layout>
