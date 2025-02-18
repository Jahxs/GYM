<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Nuevo Pago') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('pagos.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700">
                                Membresía
                            </label>
                            <select name="id_membresia" class="w-full px-3 py-2 border rounded-lg @error('id_membresia') border-red-500 @enderror">
                                <option value="">Seleccione una membresía</option>
                                @foreach($membresias as $membresia)
                                    <option value="{{ $membresia->id_membresia }}">
                                        {{ $membresia->usuario->name }} - {{ ucfirst($membresia->tipo_membresia) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_membresia')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700">
                                Monto
                            </label>
                            <input type="number" 
                                   name="monto" 
                                   step="0.01" 
                                   class="w-full px-3 py-2 border rounded-lg @error('monto') border-red-500 @enderror" 
                                   value="{{ old('monto') }}">
                            @error('monto')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700">
                                Fecha de Pago
                            </label>
                            <input type="date" 
                                   name="fecha_pago" 
                                   class="w-full px-3 py-2 border rounded-lg @error('fecha_pago') border-red-500 @enderror"
                                   value="{{ old('fecha_pago', date('Y-m-d')) }}">
                            @error('fecha_pago')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700">
                                Estado del Pago
                            </label>
                            <select name="estado_pago" class="w-full px-3 py-2 border rounded-lg @error('estado_pago') border-red-500 @enderror">
                                <option value="pagado">Pagado</option>
                                <option value="pendiente">Pendiente</option>
                                <option value="parcial">Parcial</option>
                            </select>
                            @error('estado_pago')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700">
                                Método de Pago
                            </label>
                            <select name="id_metodo_pago" class="w-full px-3 py-2 border rounded-lg @error('id_metodo_pago') border-red-500 @enderror">
                                <option value="">Seleccione un método de pago</option>
                                @foreach($metodosPago as $metodo)
                                    <option value="{{ $metodo->id_metodo_pago }}" {{ old('id_metodo_pago') == $metodo->id_metodo_pago ? 'selected' : '' }}>
                                        @switch($metodo->nombre_metodo)
                                            @case('tarjeta_credito')
                                                Tarjeta de Crédito
                                                @break
                                            @case('efectivo')
                                                Efectivo
                                                @break
                                            @case('transferencia_bancaria')
                                                Transferencia Bancaria
                                                @break
                                            @default
                                                {{ $metodo->nombre_metodo }}
                                        @endswitch
                                    </option>
                                @endforeach
                            </select>
                            @error('id_metodo_pago')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end gap-4">
                            <a href="{{ route('pagos.index') }}" 
                               class="px-4 py-2 text-gray-700 bg-gray-200 rounded hover:bg-gray-300">
                                Cancelar
                            </a>
                            <button type="submit" 
                                    class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">
                                Registrar Pago
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 