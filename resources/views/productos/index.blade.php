<x-app-layout>
    <div class="p-5 m-5 bg-white shadow-lg rounded-lg">
        <div style="text-align: center"><h3 class="display-4">Productos</h3></div>
        <div class="d-flex justify-content-around align-items-center my-3">

            <form class="col-lg-10" method="GET" action="{{route('productos.index')}}">
                <div class="input-group col-10">
                    <input type="text" class="form-control " placeholder="...." name="data">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i
                                class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <div>
                <a class="btn btn-success  d-flex justify-content-around align-items-center"
                   href="{{route('productos.create')}}"><i class="fas fa-plus text-white"></i> &nbsp;Nuevo
                </a>
            </div>
        </div>
        <div class="table-responsive">
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
                        <td class="d-flex justify-content-around">
                            <a class="btn btn-success"
                               href="{{route('productos.edit',['producto'=>$producto->id_producto])}}">Editar</a>

                            <a class="btn btn-danger" href="javascript:void(0)"
                               onclick="eliminarproducto({{$producto->id_producto}})">Eliminar</a>
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
        </div>
        <div class="d-flex justify-content-center align-content-center my-0 py-0">
            {{$productos->appends(['data' => $data])->links()}}
        </div>
    </div>

    @push('scripts')
        <script>
            function eliminarproducto(id) {
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
                        document.getElementById('delete-productos-' + id).submit();
                    }
                })
            }


        </script>
    @endpush
</x-app-layout>
