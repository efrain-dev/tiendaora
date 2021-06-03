<?php

use App\Http\Controllers\TransaccionesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('categorias',\App\Http\Controllers\CategoriaController::class);
Route::resource('productos',\App\Http\Controllers\ProductoController::class);
Route::resource('clientes',\App\Http\Controllers\ClienteController::class);
Route::resource('proveedors',\App\Http\Controllers\ProveedorController::class);
Route::get('/impuesto-ventas',[TransaccionesController::class,'impuestoVentasIndex'])->name('impuesto-ventas');
Route::get('/impuesto-compras',[TransaccionesController::class,'impuestoComprasIndex'])->name('impuesto-compras');
Route::get('/anulacion-ventas',[TransaccionesController::class,'anulacionVentasIndex'])->name('anulacion-ventas');
Route::get('/anulacion-compras',[TransaccionesController::class,'anulacionComprasIndex'])->name('anulacion-compras');
Route::get('/facturacion-ventas', \App\Http\Livewire\FacturacionVenta::class)->name('facturacion-ventas');
Route::get('/facturacion-compras', \App\Http\Livewire\FacturacionCompra::class)->name('facturacion-compras');
Route::get('/mostrar-ventas', \App\Http\Livewire\MostrarVentas::class)->name('mostrar-ventas');
Route::get('/mostrar-compras', \App\Http\Livewire\MostrarCompras::class)->name('mostrar-compras');
Route::get('/descargar-pdf/{id}', [\App\Http\Controllers\PDFController::class,'downloadPDF'])->name('pdf-factura');
