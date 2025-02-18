<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Editar Información Nutricional') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('nutricion.update', $nutricion) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700">
                                Cliente
                            </label>
                            <select name="id_usuario" 
                                    class="w-full px-3 py-2 border rounded-lg @error('id_usuario') border-red-500 @enderror">
                                <option value="">Seleccione un cliente</option>
                                @foreach($usuarios as $usuario)
                                    <option value="{{ $usuario->id_usuario }}" 
                                            {{ old('id_usuario', $nutricion->id_usuario) == $usuario->id_usuario ? 'selected' : '' }}>
                                        {{ $usuario->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_usuario')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700">
                                Información Nutricional
                            </label>
                            <textarea name="informacion" 
                                      rows="4"
                                      class="w-full px-3 py-2 border rounded-lg @error('informacion') border-red-500 @enderror"
                                      placeholder="Preferencias, alergias, etc.">{{ old('informacion', $nutricion->informacion) }}</textarea>
                            @error('informacion')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700">
                                Plan de Dieta (Opcional)
                            </label>
                            <textarea name="plan_dieta" 
                                      rows="4"
                                      class="w-full px-3 py-2 border rounded-lg @error('plan_dieta') border-red-500 @enderror"
                                      placeholder="Plan de dieta asignado">{{ old('plan_dieta', $nutricion->plan_dieta) }}</textarea>
                            @error('plan_dieta')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700">
                                Fecha de Asignación
                            </label>
                            <input type="date" 
                                   name="fecha_asignacion" 
                                   class="w-full px-3 py-2 border rounded-lg @error('fecha_asignacion') border-red-500 @enderror"
                                   value="{{ old('fecha_asignacion', $nutricion->fecha_asignacion->format('Y-m-d')) }}">
                            @error('fecha_asignacion')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end gap-4">
                            <a href="{{ route('nutricion.index') }}" 
                               class="px-4 py-2 text-gray-700 bg-gray-200 rounded hover:bg-gray-300">
                                Cancelar
                            </a>
                            <button type="submit" 
                                    class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">
                                Actualizar Información
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 