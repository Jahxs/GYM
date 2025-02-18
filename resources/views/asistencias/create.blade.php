<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Registrar Asistencia') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('asistencias.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700">
                                Cliente
                            </label>
                            <select name="id_usuario" 
                                    class="w-full px-3 py-2 border rounded-lg @error('id_usuario') border-red-500 @enderror">
                                <option value="">Seleccione un cliente</option>
                                @foreach($usuarios as $usuario)
                                    <option value="{{ $usuario->id_usuario }}" 
                                            {{ old('id_usuario') == $usuario->id_usuario ? 'selected' : '' }}>
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
                                Fecha de Asistencia
                            </label>
                            <input type="date" 
                                   name="fecha_asistencia" 
                                   class="w-full px-3 py-2 border rounded-lg @error('fecha_asistencia') border-red-500 @enderror"
                                   value="{{ old('fecha_asistencia', now()->format('Y-m-d')) }}">
                            @error('fecha_asistencia')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700">
                                Hora de Ingreso
                            </label>
                            <input type="time" 
                                   name="hora_ingreso" 
                                   class="w-full px-3 py-2 border rounded-lg @error('hora_ingreso') border-red-500 @enderror"
                                   value="{{ old('hora_ingreso', now()->format('H:i')) }}">
                            @error('hora_ingreso')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700">
                                Hora de Salida (Opcional)
                            </label>
                            <input type="time" 
                                   name="hora_salida" 
                                   class="w-full px-3 py-2 border rounded-lg @error('hora_salida') border-red-500 @enderror"
                                   value="{{ old('hora_salida') }}">
                            @error('hora_salida')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700">
                                Estado
                            </label>
                            <select name="estado" 
                                    class="w-full px-3 py-2 border rounded-lg @error('estado') border-red-500 @enderror">
                                <option value="presente" {{ old('estado') == 'presente' ? 'selected' : '' }}>Presente</option>
                                <option value="ausente" {{ old('estado') == 'ausente' ? 'selected' : '' }}>Ausente</option>
                            </select>
                            @error('estado')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end gap-4">
                            <a href="{{ route('asistencias.index') }}" 
                               class="px-4 py-2 text-gray-700 bg-gray-200 rounded hover:bg-gray-300">
                                Cancelar
                            </a>
                            <button type="submit" 
                                    class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">
                                Registrar Asistencia
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 