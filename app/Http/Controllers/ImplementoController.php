<?php

namespace App\Http\Controllers;

use App\Models\Implemento;
use Illuminate\Http\Request;

class ImplementoController extends Controller
{
    public function index()
    {
        $implementos = Implemento::orderBy('nombre_implemento')
            ->paginate(10);
        return view('implementos.index', compact('implementos'));
    }

    public function create()
    {
        return view('implementos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre_implemento' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'cantidad' => 'required|integer|min:0',
            'estado' => 'required|in:operativo,en_reparacion,fuera_servicio'
        ]);

        Implemento::create($validated);

        return redirect()->route('implementos.index')
            ->with('success', 'Implemento registrado exitosamente');
    }

    public function edit(Implemento $implemento)
    {
        return view('implementos.edit', compact('implemento'));
    }

    public function update(Request $request, Implemento $implemento)
    {
        $validated = $request->validate([
            'nombre_implemento' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'cantidad' => 'required|integer|min:0',
            'estado' => 'required|in:operativo,en_reparacion,fuera_servicio'
        ]);

        $implemento->update($validated);

        return redirect()->route('implementos.index')
            ->with('success', 'Implemento actualizado exitosamente');
    }

    public function destroy(Implemento $implemento)
    {
        $implemento->delete();
        return redirect()->route('implementos.index')
            ->with('success', 'Implemento eliminado exitosamente');
    }
} 