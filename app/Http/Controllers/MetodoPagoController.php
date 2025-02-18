<?php

namespace App\Http\Controllers;

use App\Models\MetodoPago;
use Illuminate\Http\Request;

class MetodoPagoController extends Controller
{
    public function index()
    {
        $metodosPago = MetodoPago::paginate(10);
        return view('metodos-pago.index', compact('metodosPago'));
    }

    public function create()
    {
        return view('metodos-pago.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre_metodo' => 'required|in:tarjeta_credito,efectivo,transferencia_bancaria',
            'descripcion' => 'nullable|string',
            'activo' => 'boolean'
        ]);

        MetodoPago::create($validated);

        return redirect()->route('metodos-pago.index')
            ->with('success', 'Método de pago creado exitosamente');
    }

    public function edit(MetodoPago $metodoPago)
    {
        return view('metodos-pago.edit', compact('metodoPago'));
    }

    public function update(Request $request, MetodoPago $metodoPago)
    {
        $validated = $request->validate([
            'nombre_metodo' => 'required|in:tarjeta_credito,efectivo,transferencia_bancaria',
            'descripcion' => 'nullable|string',
            'activo' => 'boolean'
        ]);

        $metodoPago->update($validated);

        return redirect()->route('metodos-pago.index')
            ->with('success', 'Método de pago actualizado exitosamente');
    }

    public function destroy(MetodoPago $metodoPago)
    {
        \Log::info('Intentando eliminar método de pago: ' . $metodoPago->id_metodo_pago);
        
        if (!$metodoPago->puedeSerEliminado()) {
            \Log::info('No se puede eliminar - tiene pagos asociados');
            return redirect()->route('metodos-pago.index')
                ->with('error', 'No se puede eliminar este método de pago porque está siendo utilizado');
        }

        try {
            $metodoPago->delete();
            \Log::info('Método de pago eliminado exitosamente');
        } catch (\Exception $e) {
            \Log::error('Error al eliminar método de pago: ' . $e->getMessage());
            return redirect()->route('metodos-pago.index')
                ->with('error', 'Error al eliminar el método de pago');
        }

        return redirect()->route('metodos-pago.index')
            ->with('success', 'Método de pago eliminado exitosamente');
    }
} 