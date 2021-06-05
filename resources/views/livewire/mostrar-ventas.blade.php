<div class="container p-2 my-5 bg-white shadow-lg rounded-lg">
    <div style="text-align: center"><h3 class="display-4">Historial Ventas</h3></div>
    <hr>

    <form class="form-row my-3 col-12">

        <div class="m-auto">
            <div class="d-inline-flex m-lg-auto my-4">
                <h5 class="m-auto" for="from">Desde</h5>
                <input oninput="cambiarFecha()" type="date" class="form-control" name="from" id="nom_buscar_d1"
                       wire:model="from">
            </div>
            <div class="d-inline-flex m-lg-auto my-4">
                <h5 class="m-auto" for="to">Hasta</h5>
                <input oninput="cambiarFecha2()" type="date" class="form-control" name="to" id="nom_buscar_d2"
                       wire:model="to">
            </div>
        </div>
        <div>
            <a class="btn btn-success  d-flex justify-content-around align-items-center"
               href="{{route('facturacion-ventas')}}"><i class="fas fa-plus text-white"></i> &nbsp;Nuevo
            </a>
        </div>
    </form>

    <div class="table-responsive">

        <table class="table">
            <thead>
            <tr>
                <th scope="col">Fecha</th>
                <th scope="col">Cliente</th>
                <th scope="col">Empleado</th>
                <th scope="col">Factura</th>
                <th scope="col">Total</th>
            </tr>
            </thead>
            <tbody>
            @foreach($ventas as $venta)
                <tr>
                    <th scope="row">{{$venta->fecha}}</th>
                    <th scope="row">{{$venta->cliente}}</th>
                    <th scope="row">{{$venta->empleado}}</th>
                    <th scope="row">{{$venta->factura}}</th>
                    <th scope="row">{{$venta->total}}</th>
                    <td class="d-flex justify-content-around">
                        <a class="btn btn-danger " href="javascript:void(0)"
                           onclick="eliminar({{$venta->id_venta}})">Anular</a>
                        <a class="btn btn-success " href="{{route('pdf-factura',$venta->id_venta)}}"
                           target="_blank">PDF</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center align-content-center my-0 py-0">
        {{ $ventas->links('pagination',['is_livewire' => true]) }}
    </div>
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
                @this.call('destroy', id)
                }
            })
        }

        function cambiarFecha() {
            var fecharInicial = document.getElementById('nom_buscar_d1').value
            document.getElementById('nom_buscar_d2').setAttribute('min', fecharInicial)
            if (fecharInicial > document.getElementById('nom_buscar_d2').value) {
                document.getElementById('nom_buscar_d2').value = fecharInicial
            }
        }

        function cambiarFecha2() {
            var fecharFinal = document.getElementById('nom_buscar_d2').value
            document.getElementById('nom_buscar_d1').setAttribute('max', fecharFinal)
            if (fecharFinal < document.getElementById('nom_buscar_d1').value) {
                document.getElementById('nom_buscar_d1').value = fecharFinal
            }
        }

    </script>
@endpush
