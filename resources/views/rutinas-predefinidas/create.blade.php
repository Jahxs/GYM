<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Nueva Rutina Predefinida') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('rutinas-predefinidas.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700">
                                Nombre de la Rutina
                            </label>
                            <input type="text" 
                                   name="nombre_rutina" 
                                   class="w-full px-3 py-2 border rounded-lg @error('nombre_rutina') border-red-500 @enderror" 
                                   value="{{ old('nombre_rutina') }}">
                            @error('nombre_rutina')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700">
                                Descripción
                            </label>
                            <textarea name="descripcion" 
                                      class="w-full px-3 py-2 border rounded-lg @error('descripcion') border-red-500 @enderror"
                                      rows="4">{{ old('descripcion') }}</textarea>
                            @error('descripcion')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700">
                                Objetivo
                            </label>
                            <select name="objetivo" class="w-full px-3 py-2 border rounded-lg @error('objetivo') border-red-500 @enderror">
                                <option value="">Seleccione un objetivo</option>
                                <option value="fuerza" {{ old('objetivo') == 'fuerza' ? 'selected' : '' }}>Fuerza</option>
                                <option value="resistencia" {{ old('objetivo') == 'resistencia' ? 'selected' : '' }}>Resistencia</option>
                                <option value="tonificacion" {{ old('objetivo') == 'tonificacion' ? 'selected' : '' }}>Tonificación</option>
                                <option value="perdida_peso" {{ old('objetivo') == 'perdida_peso' ? 'selected' : '' }}>Pérdida de Peso</option>
                                <option value="ganancia_muscular" {{ old('objetivo') == 'ganancia_muscular' ? 'selected' : '' }}>Ganancia Muscular</option>
                            </select>
                            @error('objetivo')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700">
                                Fecha de Creación
                            </label>
                            <input type="date" 
                                   name="fecha_creacion" 
                                   class="w-full px-3 py-2 border rounded-lg @error('fecha_creacion') border-red-500 @enderror"
                                   value="{{ old('fecha_creacion', date('Y-m-d')) }}">
                            @error('fecha_creacion')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="flex items-center">
                                <input type="checkbox" 
                                       name="activo" 
                                       value="1" 
                                       {{ old('activo', true) ? 'checked' : '' }}
                                       class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                <span class="ml-2 text-sm text-gray-600">Activa</span>
                            </label>
                        </div>

                        <div class="flex justify-end gap-4">
                            <a href="{{ route('rutinas-predefinidas.index') }}" 
                               class="px-4 py-2 text-gray-700 bg-gray-200 rounded hover:bg-gray-300">
                                Cancelar
                            </a>
                            <button type="submit" 
                                    class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">
                                Crear Rutina
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 