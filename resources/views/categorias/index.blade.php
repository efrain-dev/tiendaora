<x-app-layout>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">nombre_categoria</th>
            <th scope="col">descripcion_categoria</th>
            <th scope="col">Opciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categorias as $categoria)
            <tr>
                <th scope="row">1</th>
                <td>{{$categoria->nombre_categoria}}</td>
                <td>{{$categoria->descripcion_categoria}}</td>
                <td><a class="btn btn-success"
                       href="{{route('categorias.edit',['categoria'=>$categoria->id_categoria])}}">Editar</a>

                    <a class="btn btn-danger" href="javascript:void(0)" onclick="eliminarcategoria({{$categoria->id_categoria}})">Eliminar</a>
                </td>

                <form id="delete-categorias-{{$categoria->id_categoria}}"
                      action="{{route('categorias.destroy',['categoria'=>$categoria])}}" method="POST"
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
            function eliminarcategoria(id){
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
                        document.getElementById('delete-categorias-'+id).submit();
                    }
                })
            }


        </script>
    @endpush
</x-app-layout>
