<x-app-layout>

    <form class="container p-5  my-5 bg-white shadow-lg rounded-lg" action="{{route('categorias.update',['categoria'=>$categoria->id_categoria])}}" method="POST">
        <div class="d-flex align-items-center justify-content-center"><h3  class="display-4 inline-block">Editar Categoria</h3></div>
        <hr>
        <ul class="text-danger p-3">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nombre Categoria</label>
            <input type="text" class="form-control" name="nombre_categoria" value="{{$categoria->nombre_categoria}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Descripcion Categoria</label>
            <input type="text" class="form-control" name="descripcion_categoria" value="{{$categoria->descripcion_categoria}}">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</x-app-layout>
