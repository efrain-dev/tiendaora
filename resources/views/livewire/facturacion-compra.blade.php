<div>

    <div class="container shadow-lg rounded p-5 mt-5">
        <div style="text-align: center"><h3 class="my-3 display-5">Facturacion Compras</h3></div>

        <h3 class="my-3 display-5">Datos de proveedor</h3>
        <hr>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="form-label">Nit</label>
                <input class="form-control @error('nit_proveedor') is-invalid @enderror" type="text" name="nit_proveedor"
                       maxlength="9" wire:model="nit_proveedor"
                       wire:keydown.tab="buscarProveedor()">
                @error('nit_proveedor') <span class="text-red-500">{{ $message }}</span>@enderror

            </div>
            <div class="form-group col-md-6">
                <label class="form-label">Nombre</label>
                <input class="form-control @error('nombre_proveedor') is-invalid @enderror" type="text"
                       name="nombre_proveedor" maxlength="150" autocomplete="off"
                       wire:model="nombre_proveedor">
                @error('nombre_proveedor') <span class="text-red-500">{{ $message }}</span>@enderror

            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label class="form-label">Direccion</label>
                <input class="form-control @error('direccion_proveedor') is-invalid @enderror" type="text"
                       name="direccion_proveedor" autocomplete="off" maxlength="150"
                       wire:model="direccion_proveedor">
                @error('direccion_proveedor') <span class="text-red-500">{{ $message }}</span>@enderror

            </div>
        </div>

        <h3 class="my-3 display-5">Detalle de factura</h3>
        <hr>
        <div class="form-row">
            <div class="form-group col-md-12 my-2">
                <div class="form-group">
                    <label for="buscar">
                        <strong>Buscar</strong>
                        @if($picked)
                            <span class="badge badge-success">Picked</span>
                        @else
                            <span class="badge badge-danger">Picked</span>
                        @endif
                    </label>
                    <input wire:model="buscar"
                           wire:keydown.enter="asignarPrimero()" type="text" class="form-control" id="buscar">
                    @error("buscar")
                    <small class="form-text text-danger">{{$message}}</small>
                    @else
                        @if($productos)
                            @if(!$picked)
                                <div class="shadow rounded px-3 pt-3 pb-0">
                                    @foreach($productos as $producto)
                                        <div style="cursor: pointer;">
                                            <option wire:click="asignarProducto('{{ $producto->id_producto}}')">
                                                {{ $producto->nombre_producto }}-Existencia- {{ $producto->existencia }}
                                            </option>
                                        </div>
                                        <hr>
                                    @endforeach
                                </div>
                            @endif
                        @else
                            <small class="form-text text-muted">Comienza a teclear para que aparezcan los
                                resultados</small>
                        @endif
                        @enderror
                </div>

            </div>
            <div class="form-group col-md-5 my-2">
                <input class="form-control String  @error('cantidad_compra') is-invalid @enderror" placeholder="Cant."
                       onkeypress="return checkNum(event)" title="Cantidad" type="text" name="cantidad_compra"
                       wire:model="cantidad_compra"
                       autocomplete="off"
                       maxlength="9">
                @error('cantidad_compra') <span class="text-red-500">{{ $message }}</span>@enderror
            </div>

            <div class="form-group col-md-6 my-2">
                <input class="form-control String @error('precio_compra') is-invalid @enderror" placeholder="Precio"
                       wire:model="precio_compra"
                       disabled
                       onkeypress="return check_digit(event,this,8,5);" autocomplete="off" type="text"
                       name="precio_compra">
                @error('precio_compra') <span class="text-red-500">{{ $message }}</span>@enderror

            </div>
            <div class="form-group col-md-1 my-2 mx-auto">
                <button class="btn btn-success" id="btnSetProduct" type="button" wire:click="setProducto">
                    <i class="fas fa-save text-white"></i>
                </button>
            </div>
        </div>

        <div class="form-row">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th class="m-auto p-0">Nombre</th>
                    <th class="m-auto p-0">Precio</th>
                    <th class="m-auto p-0">Existencia</th>
                    <th class="m-auto p-0">Cant.</th>
                    <th class="m-auto p-0"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($detalle_compra  as $key => $detalle)
                    <tr>
                        <td class="m-auto p-0">{{$detalle['nombre_producto']}}</td>
                        <td class="m-auto p-0">{{$detalle['precio_compra']}}</td>
                        <td class="m-auto p-0">{{$detalle['existencia']}}</td>
                        <td class="m-auto p-0"
                            onclick="editDetalle({{$key}},{{$detalle['cantidad']}})">{{$detalle['cantidad']}}</td>
                        <td class="m-auto p-0"><i style="color: #ff0000; cursor: pointer;"
                                                  wire:click="deleteDetalle({{$key}})" class="far fa-trash-alt"></i>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

        </div>
        <hr>

        <div class="d-flex justify-content-between">
            <h4>Cantidad:{{$cantidad}}</h4>
            <h4>ISR:{{$isr_total}}</h4>
            <h4>IVA:{{$iva_total}}</h4>
            <h4>Total:{{$total}}</h4>
            <button class="btn btn-success" id="btnSetProduct" type="button" wire:click="insertFactura()">
                Generar <i class="fas fa-save text-white"></i>
            </button>

        </div>
    </div>


</div>
@push('scripts')
    <script>
        function cambiodeid() {
            let id = document.getElementById('id_producto').value

        @this.call('buscarProducto', id)
        }

        document.addEventListener('DOMContentLoaded', () => {
            this.livewire.on('focus-input-cantidad', () => {
                document.getElementById('cantidad').focus()
            })
            this.livewire.on('focus-input-product', () => {
                document.getElementById('buscar').focus()
            })
            this.livewire.on('focus-btn-product', () => {
                document.getElementById('btnSetProduct').focus()
            })

        })


        function editDetalle(index, cantidad) {
            Swal.fire({
                title: "Nueva cantidad",
                input: "number",
                inputValue: cantidad,
                showCancelButton: true,
                confirmButtonText: "Guardar",
                cancelButtonText: "Cancelar",
                confirmButtonColor: 'green',
            })
                .then(resultado => {
                    let datos = [index, cantidad, parseInt(resultado.value)]
                    if (resultado.isConfirmed) {
                    @this.call('editDetalle', datos)
                    } else {
                        SwalAlert('question', 'No se modifico nada',3000)

                    }
                });
        }

    </script>
@endpush
