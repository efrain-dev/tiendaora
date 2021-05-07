<x-app-layout>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Codigo</th>
            <th scope="col">Producto</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Existencia</th>
            <th scope="col">Precio de compra</th>
            <th scope="col">Precio de Venta</th>
            <th scope="col">Categoría</th>
            <th scope="col">Opciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($productos as $producto)
            <tr>
                <th scope="row">{{$producto->id_producto}}</th>
                <td>{{$producto->nombre_producto}}</td>
                <td>{{$producto->descripcion_producto}}</td>
                <td>{{$producto->existencia}}</td>
                <td>{{$producto->precio_compra}}</td>
                <td>{{$producto->precio_venta}}</td>
                <td>{{$producto->categoria}}</td>
                <td><a class="btn btn-success"
                       href="{{route('productos.edit',['producto'=>$producto->id_producto])}}">Editar</a>

                    <a class="btn btn-danger" href="javascript:void(0)" onclick="eliminarproducto({{$producto->id_producto}})">Eliminar</a>
                </td>

                <form id="delete-productos-{{$producto->id_producto}}"
                      action="{{route('productos.destroy',['producto'=>$producto->id_producto])}}" method="POST"
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
            function eliminarproducto(id){
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
                        document.getElementById('delete-productos-'+id).submit();
                    }
                })
            }


        </script>
    @endpush
</x-app-layout>
