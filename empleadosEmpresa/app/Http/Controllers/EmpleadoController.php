<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleado = Empleado::all();

        return view('empleado', ['empleados' => $empleado]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('formEmpleadoCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $empleado = new Empleado();
        $empleado->nombre = $request->nombre;
        $empleado->dni = $request->dni;
        $empleado->telefono = $request->telefono;
        $empleado->salario = $request->salario;
        $empleado->save();

        return redirect()->route('empleado.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        $empleadoCompleto = Empleado::where('id',$empleado->id)->first();
        return view('detalleEmpleado', [ 'titulo' => 'detalle del empleado', 'empleado' => $empleadoCompleto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empleado $empleado)
    {
        $empleadoCompleto = Empleado::where('id',$empleado->id)->first();
        return view('formEmpleadoEdit', ['empleado' => $empleadoCompleto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleado $empleado)
    {
        $empleadoCompleto = Empleado::where('id',$empleado->id)->first();
        $empleadoCompleto->nombre = $request->nombre;
        $empleadoCompleto->dni = $request->dni;
        $empleadoCompleto->telefono = $request->telefono;
        $empleadoCompleto->salario = $request->salario;
        $empleadoCompleto->save();

        return redirect()->route('empleado.index'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empleado $empleado)
    {
        Empleado::destroy($empleado);
        return redirect()->route('empleados.index');
    }
}
