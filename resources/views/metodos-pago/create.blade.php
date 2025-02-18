<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Nuevo Método de Pago') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('metodos-pago.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700">
                                Nombre del Método
                            </label>
                            <select name="nombre_metodo" 
                                    class="w-full px-3 py-2 border rounded-lg @error('nombre_metodo') border-red-500 @enderror">
                                <option value="">Seleccione un método de pago</option>
                                <option value="tarjeta_credito" {{ old('nombre_metodo') == 'tarjeta_credito' ? 'selected' : '' }}>
                                    Tarjeta de Crédito
                                </option>
                                <option value="efectivo" {{ old('nombre_metodo') == 'efectivo' ? 'selected' : '' }}>
                                    Efectivo
                                </option>
                                <option value="transferencia_bancaria" {{ old('nombre_metodo') == 'transferencia_bancaria' ? 'selected' : '' }}>
                                    Transferencia Bancaria
                                </option>
                            </select>
                            @error('nombre_metodo')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700">
                                Descripción
                            </label>
                            <textarea name="descripcion" 
                                      class="w-full px-3 py-2 border rounded-lg @error('descripcion') border-red-500 @enderror"
                                      rows="3">{{ old('descripcion') }}</textarea>
                            @error('descripcion')
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
                                <span class="ml-2 text-sm text-gray-600">Activo</span>
                            </label>
                        </div>

                        <div class="flex justify-end gap-4">
                            <a href="{{ route('metodos-pago.index') }}" 
                               class="px-4 py-2 text-gray-700 bg-gray-200 rounded hover:bg-gray-300">
                                Cancelar
                            </a>
                            <button type="submit" 
                                    class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">
                                Crear Método de Pago
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 