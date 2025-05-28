<?php

namespace App\Http\Controllers;

use App\Models\Computador;
use Illuminate\Http\Request;

class ComputadorController extends Controller
{
    // Mostrar todos los computadores
    public function index()
    {
        $computadores = Computador::all();
        return view('computador.index', compact('computadores'));
    }

    // Mostrar formulario para crear nuevo computador
    public function create()
    {
        return view('computador.create');
    }

    // Guardar nuevo computador
    public function store(Request $request)
    {
        $request->validate([
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'fecha_compra' => 'required|date',
            'en_uso' => 'required|boolean',
        ]);

        Computador::create($request->all());

        return redirect()->route('computador.index')->with('success', 'Computador creado correctamente');
    }

    // Mostrar un computador
    public function show(Computador $computador)
    {
        return view('computador.show', compact('computador'));
    }

    // Mostrar formulario para editar un computador
    public function edit(Computador $computador)
    {
        return view('computador.edit', compact('computador'));
    }

    // Actualizar computador
    public function update(Request $request, Computador $computador)
    {
        $request->validate([
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'fecha_compra' => 'required|date',
            'en_uso' => 'required|boolean',
        ]);

        $computador->update($request->all());

        return redirect()->route('computador.index')->with('success', 'Computador actualizado correctamente');
    }

    // Eliminar computador
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
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'fecha_compra' => 'required|date',
            'en_uso' => 'required|boolean',
        ]);

        $computador = Computador::findOrFail($id);
        $computador->update($request->all());

        return redirect()->route('computador.buscar')->with('success', 'Computador actualizado correctamente');
    }
}
