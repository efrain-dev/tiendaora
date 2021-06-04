<x-app-layout>

    <div class="py-5 mx-5">
        <div class="row my-4">
            <div class="col-sm mx-5">
                <div class="card shadow-lg rounded bg-success text-white border-gray-200">
                    <div class="card-body">
                        <h5 class="card-title">Facturacion Ventas</h5>
                        <p class="card-text">Vista encarga en la facturacion de ventas.</p>
                        <div style="text-align: center"><a href="{{route('facturacion-ventas')}}"><i
                                    class="fas fa-file-invoice text-white fa-2x"></i></a></div>
                    </div>
                </div>
            </div>
            <div class="col-sm mx-5">
                <div class="card shadow-lg rounded bg-warning text-white border-gray-200">
                    <div class="card-body">
                        <h5 class="card-title">Historial Ventas</h5>
                        <p class="card-text">Vista encarga en mostrar el historial de ventas.</p>
                        <div style="text-align: center"><a href="{{route('mostrar-ventas')}}"><i
                                    class="fas fa-eye text-white fa-2x"></i></a></div>
                    </div>
                </div>
            </div>
            <div class="col-sm mx-5">
                <div class="card shadow-lg rounded bg-primary text-white border-gray-200">
                    <div class="card-body">
                        <h5 class="card-title">Anulacion Ventas</h5>
                        <p class="card-text">Visualizacion de las ventas anuladas.</p>
                        <div style="text-align: center"><a href="{{route('anulacion-ventas')}}"><i
                                    class="fas fa-minus-circle text-white fa-2x"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-4">
            <div class="col-sm mx-5">
                <div class="card shadow-lg rounded bg-secondary text-white border-gray-200">
                    <div class="card-body">
                        <h5 class="card-title">Facturacion Compras</h5>
                        <p class="card-text">Vista encarga en la facturacion de compras.</p>
                        <div style="text-align: center"><a href="{{route('facturacion-compras')}}"><i
                                    class="fas fa-file-invoice text-white fa-2x"></i></a></div>
                    </div>
                </div>
            </div>
            <div class="col-sm mx-5">
                <div class="card shadow-lg rounded bg-danger text-white border-gray-200">
                    <div class="card-body">
                        <h5 class="card-title">Historial Compras</h5>
                        <p class="card-text">Vista encarga en mostrar el historial de compras.</p>
                        <div style="text-align: center"><a href="{{route('mostrar-compras')}}"><i
                                    class="fas fa-eye text-white fa-2x"></i></a></div>
                    </div>
                </div>
            </div>
            <div class="col-sm mx-5">
                <div class="card shadow-lg rounded bg-white text-dark border-gray-200">
                    <div class="card-body">
                        <h5 class="card-title">Anulacion Compras</h5>
                        <p class="card-text">Visualizacion de las compras anuladas.</p>
                        <div style="text-align: center"><a href="{{route('anulacion-compras')}}"><i
                                    class="fas fa-minus-circle text-dark fa-2x"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-4">
            <div class="col-sm mx-5">
                <div class="card shadow-lg rounded bg-warning text-white border-gray-200">
                    <div class="card-body">
                        <h5 class="card-title">Productos</h5>
                        <p class="card-text">Seccion encarga en la gestion de productos.</p>
                        <div style="text-align: center"><a href="{{route('productos.index')}}"><i
                                    class="fab fa-product-hunt text-white fa-2x"></i></a></div>
                    </div>
                </div>
            </div>
            <div class="col-sm mx-5">
                <div class="card shadow-lg rounded bg-success text-white border-gray-200">
                    <div class="card-body">
                        <h5 class="card-title">Proveedores</h5>
                        <p class="card-text">Seccion encargada en la gestion de proveedores.</p>
                        <div style="text-align: center"><a href="{{route('proveedors.index')}}"><i
                                    class="fas fa-truck-moving fa-2x text-white"></i></a></div>
                    </div>
                </div>
            </div>
            <div class="col-sm mx-5">
                <div class="card shadow-lg rounded bg-secondary text-white border-gray-200">
                    <div class="card-body">
                        <h5 class="card-title">Categorias</h5>
                        <p class="card-text">Seccion encargada en la gestion de categorias.</p>
                        <div style="text-align: center"><a href="{{route('categorias.index')}}"><i
                                    class="fas fa-tags text-white fa-2x"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-4">
            <div class="col-sm mx-5">
                <div class="card shadow-lg rounded bg-primary text-white border-gray-200">
                    <div class="card-body">
                        <h5 class="card-title">Clientes</h5>
                        <p class="card-text">Seccion encargada en la gestion de clientes.</p>
                        <div style="text-align: center"><a href="{{route('clientes.index')}}"><i
                                    class="fas fa-users text-white fa-2x"></i></a></div>
                    </div>
                </div>
            </div>
            <div class="col-sm mx-5">
                <div class="card shadow-lg rounded bg-white text-dark border-gray-200">
                    <div class="card-body">
                        <h5 class="card-title">Impuestos Venta</h5>
                        <p class="card-text">Visualizacion de impuestos Ventas.</p>
                        <div style="text-align: center"><a href="{{route('impuesto-ventas')}}"><i
                                    class="fas fa-money-bill text-dark fa-2x"></i></a></div>
                    </div>
                </div>
            </div>
            <div class="col-sm mx-5">
                <div class="card shadow-lg rounded bg-danger text-white border-gray-200">
                    <div class="card-body">
                        <h5 class="card-title">Impuesto Compras</h5>
                        <p class="card-text">Visualizacion de impuestos compras.</p>
                        <div style="text-align: center"><a href="{{route('impuesto-compras')}}"><i
                                    class="fas fa-money-bill text-white fa-2x"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

