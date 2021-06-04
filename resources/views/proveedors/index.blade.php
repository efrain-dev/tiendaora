<x-app-layout>
    <div class="container p-5 my-5 bg-white shadow-lg rounded-lg">
        <div class="d-flex align-items-center justify-content-around"><h3  class="display-4 inline-block">Proveedores</h3> <a class="btn btn-success" href="{{route('proveedors.create')}}">Crear</a> </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Codigo</th>
                <th scope="col">Nombre</th>
                <th scope="col">Nit del Proveedor</th>
                <th scope="col">Dirección</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Opciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($proveedors as $proveedor)
                <tr>
                    <th scope="row">{{$proveedor->id_proveedor}}</th>
                    <td>{{$proveedor->nombre_proveedor}}</td>
                    <td>{{$proveedor->nit_proveedor}}</td>
                    <td>{{$proveedor->direccion_proveedor}}</td>
                    <td>{{$proveedor->telefono}}</td>
                    <td class="d-flex justify-content-around">
                        <a class="btn btn-success"
                           href="{{route('proveedors.edit',['proveedor'=>$proveedor->id_proveedor])}}">Editar</a>

                        <a class="btn btn-danger" href="javascript:void(0)" onclick="eliminarproveedor({{$proveedor->id_proveedor}})">Eliminar</a>
                    </td>

                    <form id="delete-proveedors-{{$proveedor->id_proveedor}}"
                          action="{{route('proveedors.destroy',['proveedor'=>$proveedor->id_proveedor])}}" method="POST"
                          style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>

                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center align-content-center my-2">
            {{$proveedors->links()}}
        </div>
    </div>
    @push('scripts')
        <script>
            function eliminarproveedor(id){
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
                        document.getElementById('delete-proveedors-'+id).submit();
                    }
                })
            }


        </script>
    @endpush
</x-app-layout>
