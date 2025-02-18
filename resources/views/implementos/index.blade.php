<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Gestión de Implementos') }}
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

                    <div class="mb-4">
                        <a href="{{ route('implementos.create') }}" 
                           class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">
                            Nuevo Implemento
                        </a>
                    </div>

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Nombre
                                </th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Descripción
                                </th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Cantidad
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
                            @foreach ($implementos as $implemento)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $implemento->nombre_implemento }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ Str::limit($implemento->descripcion, 50) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $implemento->cantidad }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            {{ $implemento->estado === 'operativo' ? 'bg-green-100 text-green-800' : 
                                               ($implemento->estado === 'en_reparacion' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                            {{ $implemento->estado_formateado }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('implementos.edit', $implemento) }}" 
                                               class="px-3 py-1 text-white bg-yellow-500 rounded hover:bg-yellow-600">
                                                Editar
                                            </a>

                                            <form action="{{ route('implementos.destroy', $implemento) }}" 
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
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $implementos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 