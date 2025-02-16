<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Nueva Membresía') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('membresias.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700">
                                Cliente
                            </label>
                            <select name="id_usuario" class="w-full px-3 py-2 border rounded-lg">
                                @foreach($usuarios as $usuario)
                                    <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700">
                                Tipo de Membresía
                            </label>
                            <select name="tipo_membresia" id="tipo_membresia" class="w-full px-3 py-2 border rounded-lg">
                                <option value="mensual">Mensual</option>
                                <option value="anual">Anual</option>
                                <option value="por_visitas">Por Visitas</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700">
                                Fecha de Compra
                            </label>
                            <input type="date" name="fecha_compra" 
                                   value="{{ date('Y-m-d') }}"
                                   class="w-full px-3 py-2 border rounded-lg">
                        </div>

                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700">
                                Fecha de Vencimiento
                            </label>
                            <input type="date" name="fecha_vencimiento" 
                                   class="w-full px-3 py-2 border rounded-lg">
                        </div>

                        <div class="mb-4 visitas-fields" style="display: none;">
                            <label class="block mb-2 text-sm font-bold text-gray-700">
                                Número de Visitas
                            </label>
                            <input type="number" name="visitas_permitidas" 
                                   class="w-full px-3 py-2 border rounded-lg">
                        </div>

                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700">
                                ¿Es Renovable?
                            </label>
                            <input type="checkbox" name="renovacion" value="1">
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" 
                                    class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">
                                Crear Membresía
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('tipo_membresia').addEventListener('change', function() {
            const visitasFields = document.querySelector('.visitas-fields');
            visitasFields.style.display = this.value === 'por_visitas' ? 'block' : 'none';
        });
    </script>
</x-app-layout> 