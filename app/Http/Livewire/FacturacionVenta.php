<?php

namespace App\Http\Livewire;

use App\Http\Controllers\PDFController;
use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\DetalleVenta;
use App\Models\FacturaVenta;
use App\Models\Producto;
use Barryvdh\DomPDF\Facade as PDF;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class FacturacionVenta extends Component
{
    public $nit_cliente, $id_cliente, $nombre_cliente, $direccion_cliente, $cantidad, $total, $isr_total, $iva_total, $subtotal;
    public $id_producto, $precio_venta, $existencia, $nombre_producto, $cantidad_venta;
    public $detalle_venta = [];
    public $buscar;
    public $productos;
    public $picked;

    public function render()
    {

        return view('livewire.facturacion-venta');
    }


    public function buscarCliente()
    {
        $this->resetValidation();
        $cliente = Cliente::where('nit_cliente', $this->nit_cliente)->first();
        if ($cliente) {
            $this->nombre_cliente = $cliente->nombre_cliente;
            $this->id_cliente = $cliente->id_cliente;
            $this->direccion_cliente = $cliente->direccion_cliente;
            $this->emit('focus-input-product');

        } else {
            $this->emit('swal:alert', [
                'icon' => 'error',
                'title' => 'No hemos encontrado nada!',
                'timeout' => 3000
            ]);
        }

    }

    private function calcTotal()
    {
        $this->cantidad = 0;
        $this->subtotal = 0;
        $this->total = 0;
        $this->isr_total = 0;
        $this->iva_total = 0;
        foreach ($this->detalle_venta as $detalle) {
            $this->cantidad += $detalle['cantidad'];
            $this->total += ($detalle['precio_venta'] * $detalle['cantidad']);
            $this->isr_total += ($detalle['precio_venta'] * $detalle['cantidad']) * 0.05;
            $this->iva_total += ($detalle['precio_venta'] * $detalle['cantidad']) * 0.12;
        }
    }

    public function mount()
    {
        $this->buscar = "";
        $this->productos = [];
        $this->picked = false;
    }

    public function updatedBuscar()
    {
        $this->picked = false;
        $this->validate([
            "buscar" => "required|min:2"
        ]);
        $this->productos = DB::select('begin
        select_productos(\'' . trim($this->buscar) . '\');
        end;');

    }

    public function asignarProducto(Producto $producto)
    {
        $this->buscar = $producto->nombre_producto;
        $this->id_producto = $producto->id_producto;
        $this->nombre_producto = $producto->nombre_producto;
        $this->existencia = $producto->existencia;
        $this->precio_venta = $producto->precio_venta;
        $this->cantidad_venta = 1;
        $this->picked = true;

    }

    private function vereficarExistencia()
    {
        if ($this->existencia > 0 && $this->cantidad_venta <= $this->existencia) {
            return true;
        } else {
            return false;
        }
    }

    public function setProducto()
    {

        $this->validate(['cantidad_venta' => 'required|numeric|min:1', 'precio_venta' => 'required|numeric']);
        if ($this->vereficarExistencia()) {
            $this->resetAndInsert();
            $this->emit('focus-input-product');
        } else {
            $this->emit('swal:alert', [
                'icon' => 'error',
                'title' => 'Este producto no tiene existencias, cantidad actual:' . $this->existencia,
                'timeout' => 3000
            ]);
        }
    }

    private function resetSelectProduct()
    {
        $this->id_producto = null;
        $this->nombre_producto = null;
        $this->existencia = null;
        $this->precio_venta = null;
        $this->cantidad_venta = 0;
        $this->buscar = "";
        $this->productos = [];
        $this->picked = false;
        $this->resetValidation();

    }

    private function resetFactura()
    {
        $this->detalle_venta = [];
        $this->nit_cliente = null;
        $this->direccion_cliente = null;
        $this->nombre_cliente = null;
        $this->cantidad = null;
        $this->total = null;
        $this->isr_total = null;
        $this->iva_total = null;
        $this->subtotal = null;
    }

    private function resetAndInsert()
    {
        $this->resetValidation();
        $this->storeDetalle();
        $this->resetSelectProduct();
        $this->calcTotal();
    }

    private function updateInsertCliente()
    {
        $cliente = Cliente::where('nit_cliente', $this->nit_cliente)->first();
        if ($cliente) {
            $cliente->nit_cliente = $this->nit_cliente;
            $cliente->nombre_cliente = $this->nombre_cliente;
            $cliente->direccion_cliente = $this->direccion_cliente;
            $cliente->save();
        } else {
            $cliente = new Cliente();
            $cliente->nit_cliente = $this->nit_cliente;
            $cliente->nombre_cliente = $this->nombre_cliente;
            $cliente->direccion_cliente = $this->direccion_cliente;
            $cliente->save();
            $this->id_cliente = Cliente::where('nit_cliente', $this->nit_cliente)->first()->id_cliente;
        }
    }

    public function insertFactura()
    {
        $this->resetSelectProduct();
        if (!$this->detalle_venta) {
            $this->emit('swal:alert', [
                'icon' => 'error',
                'title' => 'No hay ningun detalle ingresado',
                'timeout' => 3000
            ]);
        } else {
            $this->validate(['nombre_cliente' => 'required', 'nit_cliente' => 'required']);
            $this->updateInsertCliente();
            $factura = new FacturaVenta();
            $factura->cliente_id_cliente = $this->id_cliente;
            $factura->users_id = Auth::user()->id;
            $factura->save();
            foreach ($this->detalle_venta as $detalle) {
                $detalle_venta = new DetalleVenta();
                $detalle_venta->precio_venta = $detalle["precio_venta"];
                $detalle_venta->cantidad = $detalle["cantidad"];
                $detalle_venta->producto_id_producto = $detalle["producto_id_producto"];
                $detalle_venta->factura_venta_id_venta = $factura->id_venta;
                $detalle_venta->save();
            }
            $procedureName = 'IMPUESTO_VENTAS';
            $bindings = [
                'ID_FACTURA' => $factura->id_venta,
            ];
            $result = DB::executeProcedure($procedureName, $bindings);
            $this->resetFactura();
            $this->emit('swal:alert', [
                'icon' => 'success',
                'title' => 'Factura generada con exito',
                'timeout' => 3000
            ]);
            $this->emit('descargar-pdf',[
                'id'=>$factura->id_venta
            ]);

        }
    }

    public function deleteDetalle($key)
    {
        unset($this->detalle_venta[$key]);
    }

    public function editDetalle($product)
    {
        if ($product[2] <= $this->detalle_venta[$product[0]]['existencia']) {
            if (!$product[2] == 0) {
                $this->detalle_venta[$product[0]]['cantidad'] = $product[2];
            } else {
                $this->deleteDetalle($product[0]);
            }
            $this->emit('swal:alert', [
                'icon' => 'success',
                'title' => 'Cantidad Modificada con exito',
                'timeout' => 3000
            ]);
        } else {
            $this->emit('swal:alert', [
                'icon' => 'error',
                'title' => 'Este producto no tiene existencias, cantidad actual:' . $this->detalle_venta[$product[0]]['existencia'],
                'timeout' => 3000
            ]);
        }
        $this->calcTotal();

    }

    public function storeDetalle()
    {

        $indice = array_search($this->id_producto, array_column($this->detalle_venta, 'producto_id_producto'));

        if (false !== $indice) {
            if (!(($this->detalle_venta[$indice]['cantidad'] + $this->cantidad_venta) >= $this->existencia)) {
                $this->detalle_venta[$indice]['cantidad'] += $this->cantidad_venta;
            } else {
                $this->emit('swal:alert', [
                    'icon' => 'error',
                    'title' => 'Existencia superada, cantidad actual:' . $this->existencia,
                    'timeout' => 3000
                ]);
            }
        } else {
            $data = ['producto_id_producto' => $this->id_producto, 'nombre_producto' => $this->nombre_producto, 'cantidad' => $this->cantidad_venta,
                'precio_venta' => $this->precio_venta, 'existencia' => $this->existencia];
            array_push($this->detalle_venta, $data);
        }

    }

    public function asignarPrimero()
    {
        $producto = current($this->productos);
        if ($producto) {
            $productoF = Producto::find($producto['id_producto']);
            $this->buscar = $productoF->nombre_producto;
            $this->id_producto = $productoF->id_producto;
            $this->nombre_producto = $productoF->nombre_producto;
            $this->existencia = $productoF->existencia;
            $this->precio_venta = $productoF->precio_venta;
            $this->cantidad_venta = 1;
            $this->emit('focus-input-cantidad');
            $this->picked = true;

        } else {
            $this->picked = false;
        }

    }


}
