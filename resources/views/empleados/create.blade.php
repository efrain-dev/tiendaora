<x-app-layout>

    <form class="container g-5" action="{{route('empleados.store')}}" method="POST">
        <ul class="text-danger p-3">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        @csrf

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nit del Empleado</label>
            <input type="text" class="form-control" name="nit_empleado">
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre_empleado">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Direccion</label>
            <input type="text" class="form-control" name="direccion">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Telefono</label>
            <input type="text" class="form-control" name="telefono">
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</x-app-layout>
