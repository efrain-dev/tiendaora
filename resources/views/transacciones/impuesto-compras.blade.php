<x-app-layout>
    <div class="container p-2 my-5 bg-white shadow-lg rounded-lg">
        <div style="text-align: center"><h3 class="display-4">Historial Impuestos Compra</h3></div>
        <div class="table-responsive">

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">No. Factura Compra</th>
                    <th scope="col">ISR para Compra</th>
                    <th scope="col">IVA para Compra</th>
                </tr>
                </thead>
                <tbody>
                @foreach($impuestocompras as $impuestocompra)
                    <tr>
                        <th scope="row">{{$impuestocompra->id_impuesto_compra}}</th>
                        <td>{{$impuestocompra->factura_id_compra}}</td>
                        <td>{{$impuestocompra->isr_compra}}</td>
                        <td>{{$impuestocompra->iva_compra}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center align-content-center my-2">
            {{$impuestocompras->links()}}
        </div>
    </div>
</x-app-layout>
