<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\FacturaVenta;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Carbon;
use App\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use PDO;

class MostrarVentas extends Component
{
    use WithPagination;

    public $data, $to, $from;


    public function render()
    {

        $this->searchesRequest();
        $to = $this->to;
        $from = $this->from;
        $query =   DB::select('begin
        mostrar_ventas(\''.Carbon::parse(strftime($from))->format('Y-m-d h:m:s').'\',\''.Carbon::parse(strftime($to))->addDay()->format('Y-m-d h:m:s').'\');
        end;');
        $ventas = (new Collection($query))->paginate(10);

        return view('livewire.mostrar-ventas',compact('ventas'));
    }
    public function searchesRequest()
    {
        $this->from = $this->from == '' ? now()->startOfMonth()->format('Y-m-d') : Carbon::parse(strftime($this->from))->format('Y-m-d');
        $this->to = $this->to == '' ? now()->format('Y-m-d') : Carbon::parse(strftime($this->to))->format('Y-m-d');
    }
    public function destroy($id)
    {

        try {
            $factura= FacturaVenta::find($id);
            $factura->delete();
            $this->emit('swal:alert', [
                'icon' => 'success',
                'title' => 'Se ha eliminado con exito',
                'timeout' => 3000
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            $this->emit('swal:alert', [
                'icon' => 'error',
                'title' => 'No se ha podido eliminar con exito',
                'timeout' => 3000
            ]);
        }
    }
}
