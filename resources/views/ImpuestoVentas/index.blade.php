<x-app-layout>
    <div class=" container p-2" id="app">

        <table class="table">
            <thead>
            <tr>
                <th scope="col">Código</th>
                <th scope="col">No. Factura Venta</th>
                <th scope="col">ISR para Venta</th>
                <th scope="col">IVA para Venta</th>
            </tr>
            </thead>
            <tbody>
            @foreach($impuestoventas as $impuestoventa)
                <tr>
                    <th scope="row">{{$impuestoventa->id_impuesto_venta}}</th>
                    <td>{{$impuestoventa->factura_id_venta}}</td>
                    <td>{{$impuestoventa->isr_venta}}</td>
                    <td>{{$impuestoventa->iva_venta}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
