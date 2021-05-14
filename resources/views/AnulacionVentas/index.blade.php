<x-app-layout>
    <div class=" container p-2" id="app">

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
    </div>
</x-app-layout>
