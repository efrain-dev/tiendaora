<x-app-layout>
    <div class="container p-2 my-5 bg-white shadow-lg rounded-lg">
        <div style="text-align: center"><h3  class="display-4">Historial Anulaciones Venta</h3></div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Código de Anulación</th>
                <th scope="col">Fecha de Venta</th>
                <th scope="col">No. de Factura</th>
            </tr>
            </thead>
            <tbody>
            @foreach($anulacionventas as $anulacionventa)
                <tr>
                    <th scope="row">{{$anulacionventa->id_venta_anulada}}</th>
                    <td>{{$anulacionventa->fecha_venta}}</td>
                    <td>{{$anulacionventa->factura_venta}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center align-content-center my-2">
            {{$anulacionventas->links()}}
        </div>
    </div>
</x-app-layout>
