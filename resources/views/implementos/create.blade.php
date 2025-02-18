<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Registrar Implemento') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('implementos.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700">
                                Nombre del Implemento
                            </label>
                            <input type="text" 
                                   name="nombre_implemento" 
                                   class="w-full px-3 py-2 border rounded-lg @error('nombre_implemento') border-red-500 @enderror"
                                   value="{{ old('nombre_implemento') }}">
                            @error('nombre_implemento')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700">
                                Descripción
                            </label>
                            <textarea name="descripcion" 
                                      rows="3"
                                      class="w-full px-3 py-2 border rounded-lg @error('descripcion') border-red-500 @enderror">{{ old('descripcion') }}</textarea>
                            @error('descripcion')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700">
                                Cantidad
                            </label>
                            <input type="number" 
                                   name="cantidad" 
                                   min="0"
                                   class="w-full px-3 py-2 border rounded-lg @error('cantidad') border-red-500 @enderror"
                                   value="{{ old('cantidad', 1) }}">
                            @error('cantidad')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700">
                                Estado
                            </label>
                            <select name="estado" 
                                    class="w-full px-3 py-2 border rounded-lg @error('estado') border-red-500 @enderror">
                                <option value="operativo" {{ old('estado') == 'operativo' ? 'selected' : '' }}>Operativo</option>
                                <option value="en_reparacion" {{ old('estado') == 'en_reparacion' ? 'selected' : '' }}>En Reparación</option>
                                <option value="fuera_servicio" {{ old('estado') == 'fuera_servicio' ? 'selected' : '' }}>Fuera de Servicio</option>
                            </select>
                            @error('estado')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end gap-4">
                            <a href="{{ route('implementos.index') }}" 
                               class="px-4 py-2 text-gray-700 bg-gray-200 rounded hover:bg-gray-300">
                                Cancelar
                            </a>
                            <button type="submit" 
                                    class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">
                                Guardar Implemento
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 