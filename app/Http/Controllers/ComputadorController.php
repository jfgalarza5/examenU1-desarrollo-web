<?php

namespace App\Http\Controllers;

use App\Models\Computador;
use Illuminate\Http\Request;

class ComputadorController extends Controller
{
    public function index()
    {
        $computadores = Computador::all();
        return view('computador.index', compact('computadores'));
    }

    public function create()
    {
        return view('computador.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo_tienda' => 'required|string|max:255',
            'almacenamiento' => 'required|string|max:255',
            'ram' => 'required|string|max:255',
            'tarjeta_grafica' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|string|max:255',
            'procesador' => 'required|string|max:255',
        ]);

        Computador::create($request->all());

        return redirect()->route('computador.index')->with('success', 'Computador creado correctamente');
    }

    public function show(Computador $computador)
    {
        return view('computador.show', compact('computador'));
    }

    public function edit(Computador $computador)
    {
        return view('computador.edit', compact('computador'));
    }

    public function update(Request $request, Computador $computador)
    {
        $request->validate([
            'codigo_tienda' => 'required|string|max:255',
            'almacenamiento' => 'required|string|max:255',
            'ram' => 'required|string|max:255',
            'tarjeta_grafica' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|string|max:255',
            'procesador' => 'required|string|max:255',
        ]);

        $computador->update($request->all());

        return redirect()->route('computador.index')->with('success', 'Computador actualizado correctamente');
    }

    public function destroy(Computador $computador)
    {
        $computador->delete();

        return redirect()->route('computador.index')->with('success', 'Computador eliminado correctamente');
    }

    public function buscar(Request $request)
    {
        $id = $request->input('id');
        $computador = Computador::find($id);

        if (!$computador) {
            return redirect()->back()->with('error', 'No se encontró el computador con ID ' . $id);
        }

        return view('computador.busqueda', compact('computador'));
    }

    public function actualizar(Request $request, $id)
    {
        $request->validate([
            'codigo_tienda' => 'required|string|max:255',
            'almacenamiento' => 'required|string|max:255',
            'ram' => 'required|string|max:255',
            'tarjeta_grafica' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|string|max:255',
            'procesador' => 'required|string|max:255',
        ]);

        $computador = Computador::findOrFail($id);
        $computador->update($request->all());

        return redirect()->route('computador.buscar')->with('success', 'Computador actualizado correctamente');
    }

    
}
