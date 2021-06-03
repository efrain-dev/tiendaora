<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
    <link href="{{asset('css/pdfFacturas.css')}}" rel="stylesheet">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
<style>

    body {
        background-image: url("{{asset('img/marcadeagua.jpg')}}");
        /*background-position: center; !* Center the image *!*/
        background-repeat: no-repeat; /* Do not repeat the image */
        background-size: cover
    }
</style>
<main>
    <div class="d-row" id="mainInfo">
        <div id="logo">
            <img src="{{asset('img/logo.png')}}" alt="placeholder">
            <h6>DOCUMENTO TRIBUTARIO</h6>
        </div>
        <div class="text-center" id="commerceInfo">
            <h3 id="commerceName">Comercio</h3>
            <p><span>{{strtoupper('El Comercio Rapido')}}</span>
                <br/>
                <span>NIT: 555499463</span>
                <br/>
                <span>{{strtoupper('Puerto Barrios, Izabal')}}</span></p>
            <br/>
        </div>
        <div id="invoiceInfo">
            <h4 id="invoice-title">FACTURA </h4>
            <p class="small"><span class="strong">SERIE.</span> A</p>
            <p class="small"><span class="strong">NO.</span> {{$invoice->no_factura}}</p>
            <p id="dateInvoice" class="small" style="font-size: 0.70rem"><span
                    class="strong">FECHA.</span> {{Carbon\Carbon::parse($invoice->fecha_venta)->format('d-m-Y  H:i:s')}}</p>
        </div>
    </div>
    <div id="separator">

    </div>
    <div class="d-row" id="clientInfo" style="margin-top: 700px !important">
        <div id="name_nit">
            <p style="position: relative"><strong>Nombre:</strong> @if($invoice->emisor == "CF")
                    CONSUMIDOR FINAL
                @else
                    {{strtoupper($invoice->emisor)}}
                @endif
                <span style="position: absolute;left: 35.9rem">
                    <strong>Nit:</strong> {{$invoice->emisor}}
                </span></p>
            <p><strong>Direccion:</strong> {{strtoupper($invoice->direccion_cliente)}}</p>
        </div>
        <div>

        </div>
    </div>
    <div id="itemsTable">
        <table>
            <thead>
            <tr>
                <th>CANTIDAD</th>
                <th>NOMBRE</th>
                <th>DESCRIPCION</th>
                <th>PRECIO UNITARIO</th>
                <th>TOTAL</th>
            </tr>
            </thead>
            <tbody>
            @foreach($detalles as $detalle)
                <tr>
                    <td style="width: 3%">{{$detalle->cantidad}}</td>
                    <td>{{$detalle->nombre_producto}}</td>
                    <td>{{$detalle->descripcion_producto}}</td>
                    <td style="width: 10%">{{number_format($detalle->precio_venta,2)}}</td>
                    <td style="width: 10%">{{number_format($detalle->total,2)}}</td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div>
        <p style="font-size: 0.6rem;position: relative;margin-left: 2rem; ">
            <span style="max-width: 30rem"><strong>TOTAL EN LETRAS:</strong>{{$total_letras}} </span>
            <span id="totalN">
                <strong>TOTAL:</strong> Q{{number_format($total ,2)}}
            </span></p>
    </div>
    <div class="altSeparator">
        COMPLEMENTOS
    </div>
    <div class="text-center" id="isrLeyend">
        SUJETO A PAGOS TRIMESTRALES ISR
    </div>


</main>
</body>
</html>
