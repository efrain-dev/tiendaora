<x-app-layout>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Codigo</th>
            <th scope="col">NIT del Empleado</th>
            <th scope="col">Nombre</th>
            <th scope="col">Direccion</th>
            <th scope="col">Telefono</th>
            <th scope="col">Opciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($empleados as $empleado)
            <tr>
                <th scope="row">{{$empleado->id_empleado}}</th>
                <td>{{$empleado->nit_empleado}}</td>
                <td>{{$empleado->nombre_empleado}}</td>
                <td>{{$empleado->direccion}}</td>
                <td>{{$empleado->telefono}}</td>
                <td><a class="btn btn-success"
                       href="{{route('empleados.edit',['empleado'=>$empleado->id_empleado])}}">Editar</a>

                    <a class="btn btn-danger" href="javascript:void(0)" onclick="eliminarempleado({{$empleado->id_empleado}})">Eliminar</a>
                </td>

                <form id="delete-empleados-{{$empleado->id_empleado}}"
                      action="{{route('empleados.destroy',['empleado'=>$empleado])}}" method="POST"
                      style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>

            </tr>
        @endforeach
        </tbody>
    </table>
    @push('scripts')
        <script>
            function eliminarempleado(id){
                Swal.fire({
                    title: 'Estas seguro?',
                    text: "Ya no podras restaurar esta informacion!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminalo!',
                    cancelButtonText: 'No, Pls!'

                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-empleados-'+id).submit();
                    }
                })
            }


        </script>
    @endpush
</x-app-layout>
