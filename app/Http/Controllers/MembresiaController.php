<?php

namespace App\Http\Controllers;

use App\Models\Membresia;
use App\Models\User;
use Illuminate\Http\Request;

class MembresiaController extends Controller
{
    public function index()
    {
        $membresias = Membresia::with('usuario')->paginate(10);
        return view('membresias.index', compact('membresias'));
    }

    public function create()
    {
        $usuarios = User::all();
        return view('membresias.create', compact('usuarios'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_usuario' => 'required|exists:users,id',
            'tipo_membresia' => 'required|in:anual,mensual,por_visitas',
            'fecha_compra' => 'required|date',
            'fecha_vencimiento' => 'required|date|after:fecha_compra',
            'visitas_permitidas' => 'required_if:tipo_membresia,por_visitas|nullable|integer',
            'renovacion' => 'boolean'
        ]);

        if ($validated['tipo_membresia'] === 'por_visitas') {
            $validated['visitas_restantes'] = $validated['visitas_permitidas'];
        }

        Membresia::create($validated);

        return redirect()->route('membresias.index')
            ->with('success', 'Membresía creada exitosamente');
    }

    public function edit(Membresia $membresia)
    {
        $usuarios = User::all();
        return view('membresias.edit', compact('membresia', 'usuarios'));
    }

    public function update(Request $request, Membresia $membresia)
    {
        $validated = $request->validate([
            'id_usuario' => 'required|exists:users,id',
            'tipo_membresia' => 'required|in:anual,mensual,por_visitas',
            'fecha_compra' => 'required|date',
            'fecha_vencimiento' => 'required|date|after:fecha_compra',
            'visitas_permitidas' => 'required_if:tipo_membresia,por_visitas|nullable|integer',
            'renovacion' => 'boolean'
        ]);

        $membresia->update($validated);

        return redirect()->route('membresias.index')
            ->with('success', 'Membresía actualizada exitosamente');
    }

    public function destroy(Membresia $membresia)
    {
        $membresia->delete();

        return redirect()->route('membresias.index')
            ->with('success', 'Membresía eliminada exitosamente');
    }

    public function registrarVisita(Membresia $membresia)
    {
        $membresia->registrarVisita();
        
        return redirect()->back()
            ->with('success', 'Visita registrada exitosamente');
    }
} 