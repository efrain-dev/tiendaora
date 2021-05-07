<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpleadoPostRequest;
use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados = Empleado::all();
        return view('empleados.index',compact('empleados'));
    }

    public function create()
    {
        return view('empleados.create');
    }

    public function store(EmpleadoPostRequest $request)
    {
        $data = $request->validated();
        $empleado = new Empleado;
        $empleado->nit_empleado = $data['nit_empleado'];
        $empleado->nombre_empleado = $data['nombre_empleado'];
        $empleado->direccion = $data['direccion'];
        $empleado->telefono = $data['telefono'];
        $empleado->save();
        return redirect()->route('empleados.index')->with('status','success')->with('statusT', 'Se ha ingresado con exito');
    }


    public function edit($id)
    {
        $empleado = Empleado::find($id);
        return view('empleados.edit',compact('empleado'));
    }

    public function update(EmpleadoPostRequest $request, Empleado $empleado)
    {
        $data = $request->validated();
        $empleado->nit_empleado = $data['nit_empleado'];
        $empleado->nombre_empleado = $data['nombre_empleado'];
        $empleado->direccion = $data['direccion'];
        $empleado->telefono = $data['telefono'];
        $empleado->save();
        return redirect()->route('empleados.index')->with('status','success')->with('statusT', 'Se ha actualizado con exito');

    }


    public function destroy(Request $request, $id)
    {
        $empleado= Empleado::find($id);
        $empleado->delete();
        return redirect()->route('empleados.index')->with('status','success')->with('statusT', 'Se ha eliminado con exito');
    }
}
