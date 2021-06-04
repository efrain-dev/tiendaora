<x-app-layout>
    <div class="container p-2 my-5 bg-white shadow-lg rounded-lg">
        <div style="text-align: center"><h3  class="display-4">Historial Anulaciones Compra</h3></div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Código de Anulación</th>
                <th scope="col">Fecha de Compra</th>
                <th scope="col">No. de Factura</th>
            </tr>
            </thead>
            <tbody>
            @foreach($anulacioncompras as $anulacioncompra)
                <tr>
                    <th scope="row">{{$anulacioncompra->id_compra_anulada}}</th>
                    <td>{{$anulacioncompra->fecha_compra}}</td>
                    <td>{{$anulacioncompra->factura_compra}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center align-content-center my-2">
            {{$anulacioncompras->links()}}
        </div>
    </div>
</x-app-layout>
