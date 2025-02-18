<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Rutinas Predefinidas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (session('success'))
                        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="mb-4">
                        @if(auth()->check() && in_array(auth()->user()->rol, ['admin', 'entrenador']))
                            <a href="{{ route('rutinas-predefinidas.create') }}" 
                               class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">
                                Nueva Rutina
                            </a>
                        @endif
                    </div>

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Nombre
                                </th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Entrenador
                                </th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Objetivo
                                </th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Fecha
                                </th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Estado
                                </th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($rutinas as $rutina)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $rutina->nombre_rutina }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $rutina->entrenador->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ ucfirst($rutina->objetivo) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $rutina->fecha_creacion->format('d/m/Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            {{ $rutina->activo ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ $rutina->activo ? 'Activa' : 'Inactiva' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex space-x-2">
                                            @if(auth()->user()->rol === 'admin' || auth()->id() === $rutina->id_usuario)
                                                <a href="{{ route('rutinas-predefinidas.edit', $rutina) }}" 
                                                   class="px-3 py-1 text-white bg-yellow-500 rounded hover:bg-yellow-600">
                                                    Editar
                                                </a>

                                                <form action="{{ route('rutinas-predefinidas.destroy', $rutina) }}" 
                                                      method="POST" 
                                                      onsubmit="return confirm('¿Estás seguro?')" 
                                                      class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="px-3 py-1 text-white bg-red-500 rounded hover:bg-red-600">
                                                        Eliminar
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $rutinas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 