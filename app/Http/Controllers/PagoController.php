<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Membresia;
use App\Models\MetodoPago;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function index()
    {
        $pagos = Pago::with(['membresia', 'usuario', 'metodoPago'])->paginate(10);
        return view('pagos.index', compact('pagos'));
    }

    public function create()
    {
        $membresias = Membresia::all();
        $metodosPago = MetodoPago::where('activo', true)->get();
        return view('pagos.create', compact('membresias', 'metodosPago'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_membresia' => 'required|exists:membresias,id_membresia',
            'monto' => 'required|numeric|min:0',
            'fecha_pago' => 'required|date',
            'estado_pago' => 'required|in:pagado,pendiente,parcial',
            'id_metodo_pago' => 'required|exists:metodos_pago,id_metodo_pago'
        ]);

        $validated['id_usuario'] = auth()->id();
        
        Pago::create($validated);

        return redirect()->route('pagos.index')
            ->with('success', 'Pago registrado exitosamente');
    }

    public function edit(Pago $pago)
    {
        $membresias = Membresia::all();
        $metodosPago = MetodoPago::where('activo', true)->get();
        return view('pagos.edit', compact('pago', 'membresias', 'metodosPago'));
    }

    public function update(Request $request, Pago $pago)
    {
        $validated = $request->validate([
            'id_membresia' => 'required|exists:membresias,id_membresia',
            'monto' => 'required|numeric|min:0',
            'fecha_pago' => 'required|date',
            'estado_pago' => 'required|in:pagado,pendiente,parcial',
            'id_metodo_pago' => 'required|exists:metodos_pago,id_metodo_pago'
        ]);

        $pago->update($validated);

        return redirect()->route('pagos.index')
            ->with('success', 'Pago actualizado exitosamente');
    }

    public function destroy(Pago $pago)
    {
        $pago->delete();

        return redirect()->route('pagos.index')
            ->with('success', 'Pago eliminado exitosamente');
    }
} 