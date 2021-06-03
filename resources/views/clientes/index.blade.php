<x-app-layout>
    <div class="container p-2">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Codigo</th>
                <th scope="col">Nit del Cliente</th>
                <th scope="col">Nombre</th>
                <th scope="col">Direccion</th>
                <th scope="col">Telefono</th>
                <th scope="col">Opciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clientes as $cliente)
                <tr>
                    <th scope="row">{{$cliente->id_cliente}}</th>
                    <td>{{$cliente->nit_cliente}}</td>
                    <td>{{$cliente->nombre_cliente}}</td>
                    <td>{{$cliente->direccion_cliente}}</td>
                    <td>{{$cliente->telefono}}</td>
                    <td class="d-flex justify-content-around">
                        <a class="btn btn-success"
                           href="{{route('clientes.edit',['cliente'=>$cliente->id_cliente])}}">Editar</a>

                        <a class="btn btn-danger" href="javascript:void(0)"
                           onclick="eliminar({{$cliente->id_cliente}})">Eliminar</a>
                    </td>

                    <form id="delete-{{$cliente->id_cliente}}"
                          action="{{route('clientes.destroy',['cliente'=>$cliente])}}" method="POST"
                          style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @push('scripts')
        <script>
            function eliminar(id) {
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
                        document.getElementById('delete-' + id).submit();
                    }
                })
            }


        </script>
    @endpush
</x-app-layout>
