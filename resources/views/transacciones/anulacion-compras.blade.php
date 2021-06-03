<x-app-layout>
    <div class=" container p-2" id="app">

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
    </div>
</x-app-layout>
