<x-app-layout>
    <div class="container p-2 my-5 bg-white shadow-lg rounded-lg">
        <div style="text-align: center"><h3  class="display-4">Historial Impuestos Venta</h3></div>

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
        <div class="d-flex justify-content-center align-content-center my-2">
            {{$impuestoventas->links()}}
        </div>
    </div>
</x-app-layout>
