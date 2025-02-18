<?php

namespace App\Http\Controllers;

use App\Models\AsignacionRutina;
use App\Models\RutinaPredefinida;
use App\Models\User;
use Illuminate\Http\Request;

class AsignacionRutinaController extends Controller
{
    public function index()
    {
        $asignaciones = AsignacionRutina::with(['rutina', 'usuario'])
            ->paginate(10);
        return view('asignacion-rutinas.index', compact('asignaciones'));
    }

    public function create()
    {
        $rutinas = RutinaPredefinida::where('activo', true)->get();
        $usuarios = User::where('rol', 'cliente')->get();
        return view('asignacion-rutinas.create', compact('rutinas', 'usuarios'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_rutina' => 'required|exists:rutinas_predefinidas,id_rutina',
            'id_usuario' => 'required|exists:users,id_usuario',
            'fecha_asignacion' => 'required|date',
            'dia_semana' => 'nullable|in:Lunes,Martes,Miércoles,Jueves,Viernes,Sábado,Domingo'
        ]);

        AsignacionRutina::create($validated);

        return redirect()->route('asignacion-rutinas.index')
            ->with('success', 'Rutina asignada exitosamente');
    }

    public function edit(AsignacionRutina $asignacionRutina)
    {
        $rutinas = RutinaPredefinida::where('activo', true)->get();
        $usuarios = User::where('rol', 'cliente')->get();
        return view('asignacion-rutinas.edit', compact('asignacionRutina', 'rutinas', 'usuarios'));
    }

    public function update(Request $request, AsignacionRutina $asignacionRutina)
    {
        $validated = $request->validate([
            'id_rutina' => 'required|exists:rutinas_predefinidas,id_rutina',
            'id_usuario' => 'required|exists:users,id_usuario',
            'fecha_asignacion' => 'required|date',
            'dia_semana' => 'nullable|in:Lunes,Martes,Miércoles,Jueves,Viernes,Sábado,Domingo'
        ]);

        $asignacionRutina->update($validated);

        return redirect()->route('asignacion-rutinas.index')
            ->with('success', 'Asignación actualizada exitosamente');
    }

    public function destroy(AsignacionRutina $asignacionRutina)
    {
        try {
            $asignacionRutina->delete();
            return redirect()->route('asignacion-rutinas.index')
                ->with('success', 'Asignación eliminada exitosamente');
        } catch (\Exception $e) {
            return redirect()->route('asignacion-rutinas.index')
                ->with('error', 'No se puede eliminar esta asignación porque está siendo utilizada');
        }
    }
} 