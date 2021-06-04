<?php

namespace App\Http\Livewire;

use App\Models\DetalleCompra;
use App\Models\FacturaCompra;
use App\Models\Producto;
use App\Models\Proveedor;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class FacturacionCompra extends Component
{
    public $nit_proveedor, $id_proveedor, $nombre_proveedor,$no_compra, $direccion_proveedor, $cantidad, $total, $isr_total, $iva_total, $subtotal;
    public $id_producto, $precio_compra, $existencia, $nombre_producto, $cantidad_compra;
    public $detalle_compra = [];
    public $buscar;
    public $productos;
    public $picked;

    public function render()
    {

        return view('livewire.facturacion-compra');
    }


    public function buscarProveedor()
    {
        $this->resetValidation();
        $proveedor = Proveedor::where('nit_proveedor', $this->nit_proveedor)->first();
        if ($proveedor) {
            $this->nombre_proveedor = $proveedor->nombre_proveedor;
            $this->id_proveedor = $proveedor->id_proveedor;
            $this->direccion_proveedor = $proveedor->direccion_proveedor;
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
        foreach ($this->detalle_compra as $detalle) {
            $this->cantidad += $detalle['cantidad'];
            $this->total += ($detalle['precio_compra'] * $detalle['cantidad']);
            $this->isr_total += ($detalle['precio_compra'] * $detalle['cantidad']) * 0.05;
            $this->iva_total += ($detalle['precio_compra'] * $detalle['cantidad']) * 0.12;
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
        $this->precio_compra = $producto->precio_compra;
        $this->cantidad_compra = 1;
        $this->picked = true;

    }

    private function vereficarExistencia()
    {
        if ($this->existencia > 0 && $this->cantidad_compra <= $this->existencia) {
            return true;
        } else {
            return false;
        }
    }

    public function setProducto()
    {

        $this->validate(['cantidad_compra' => 'required|numeric|min:1', 'precio_compra' => 'required|numeric']);
        $this->resetAndInsert();
        $this->emit('focus-input-product');

    }

    private function resetSelectProduct()
    {
        $this->id_producto = null;
        $this->nombre_producto = null;
        $this->existencia = null;
        $this->precio_compra = null;
        $this->cantidad_compra = 0;
        $this->buscar = "";
        $this->productos = [];
        $this->picked = false;
        $this->resetValidation();

    }

    private function resetFactura()
    {
        $this->detalle_compra = [];
        $this->nit_proveedor = null;
        $this->direccion_proveedor = null;
        $this->nombre_proveedor = null;
        $this->cantidad = null;
        $this->total = null;
        $this->isr_total = null;
        $this->iva_total = null;
        $this->subtotal = null;
        $this->no_compra = null;

    }

    private function resetAndInsert()
    {
        $this->resetValidation();
        $this->storeDetalle();
        $this->resetSelectProduct();
        $this->calcTotal();
    }

    private function updateInsertProveedor()
    {
        $proveedor = Proveedor::where('nit_proveedor', $this->nit_proveedor)->first();
        if ($proveedor) {
            $proveedor->nit_proveedor = $this->nit_proveedor;
            $proveedor->nombre_proveedor= $this->nombre_proveedor;
            $proveedor->direccion_proveedor = $this->direccion_proveedor;
            $proveedor->save();
        } else {
            $proveedor = new Proveedor();
            $proveedor->nit_proveedor = $this->nit_proveedor;
            $proveedor->nombre_proveedor = $this->nombre_proveedor;
            $proveedor->direccion_proveedor = $this->direccion_proveedor;
            $proveedor->save();
            $this->id_proveedor = Proveedor::where('nit_proveedor', $this->nit_proveedor)->first()->id_proveedor;
        }
    }

    public function insertFactura()
    {
        $this->resetSelectProduct();
        if (!$this->detalle_compra) {
            $this->emit('swal:alert', [
                'icon' => 'error',
                'title' => 'No hay ningun detalle ingresado',
                'timeout' => 3000
            ]);
        } else {
            $this->validate(['nombre_proveedor' => 'required', 'nit_proveedor' => 'required', 'no_compra' => 'required']);
            $this->updateInsertProveedor();
            $factura = new FacturaCompra();
            $factura->proveedor_id_proveedor = $this->id_proveedor;
            $factura->users_id = Auth::user()->id;
            $factura->no_compra = $this->no_compra;
            $factura->save();

            foreach ($this->detalle_compra as $detalle) {
                $detalleCompra = new DetalleCompra();
                $detalleCompra->precio_producto = $detalle["precio_compra"];
                $detalleCompra->cantidad = $detalle["cantidad"];
                $detalleCompra->producto_id_producto = $detalle["producto_id_producto"];
                $detalleCompra->factura_compras_id_compra = $factura->id_compra;
                $detalleCompra->save();
            }
            $procedureName = 'IMPUESTO_COMPRAS';
            $bindings = [
                'ID_FACTURA' => $factura->id_compra,
            ];
            $result = DB::executeProcedure($procedureName, $bindings);
            $this->resetFactura();
            $this->emit('swal:alert', [
                'icon' => 'success',
                'title' => 'Factura generada con exito',
                'timeout' => 3000
            ]);
        }
    }

    public function deleteDetalle($key)
    {
        unset($this->detalle_compra[$key]);
    }

    public function editDetalle($product)
    {
            if (!$product[2] == 0) {
                $this->detalle_compra[$product[0]]['cantidad'] = $product[2];
            } else {
                $this->deleteDetalle($product[0]);
            }
            $this->emit('swal:alert', [
                'icon' => 'success',
                'title' => 'Cantidad Modificada con exito',
                'timeout' => 3000
            ]);
        $this->calcTotal();

    }

    public function storeDetalle()
    {
        $indice = array_search($this->id_producto, array_column($this->detalle_compra, 'producto_id_producto'));
        if (false !== $indice) {
                $this->detalle_compra[$indice]['cantidad'] += $this->cantidad_compra;
        } else {
            $data = ['producto_id_producto' => $this->id_producto, 'nombre_producto' => $this->nombre_producto, 'cantidad' => $this->cantidad_compra,
                'precio_compra' => $this->precio_compra, 'existencia' => $this->existencia];
            array_push($this->detalle_compra, $data);
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
            $this->precio_compra = $productoF->precio_compra;
            $this->cantidad_compra = 1;
            $this->emit('focus-input-cantidad');
            $this->picked = true;

        } else {
            $this->picked = false;
        }

    }


}
