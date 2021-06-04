<x-app-layout>

    <form class="container p-5  my-5 bg-white shadow-lg rounded-lg" action="{{route('clientes.store')}}" method="POST">
        <div class="d-flex align-items-center justify-content-center"><h3  class="display-4 inline-block">Crear Cliente</h3></div>
        <hr>
        <ul class="text-danger p-3">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        @csrf

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nit del Cliente</label>
            <input type="text" class="form-control" name="nit_cliente" value="{{old('nit_cliente')}}">
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre_cliente" value="{{old('nombre_cliente')}}">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Direccion</label>
            <input type="text" class="form-control" name="direccion_cliente" value="{{old('direccion_cliente')}}">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Telefono</label>
            <input type="text" class="form-control" name="telefono" value="{{old('telefono')}}">
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</x-app-layout>
