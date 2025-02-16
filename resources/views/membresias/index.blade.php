<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Membresías') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <a href="{{ route('membresias.create') }}" 
                           class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">
                            Nueva Membresía
                        </a>
                    </div>

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Cliente
                                </th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Tipo
                                </th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Vencimiento
                                </th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Visitas
                                </th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($membresias as $membresia)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $membresia->usuario->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ ucfirst($membresia->tipo_membresia) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $membresia->fecha_vencimiento->format('d/m/Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($membresia->tipo_membresia === 'por_visitas')
                                            {{ $membresia->visitas_restantes }}/{{ $membresia->visitas_permitidas }}
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('membresias.edit', $membresia) }}" 
                                               class="px-3 py-1 text-white bg-yellow-500 rounded hover:bg-yellow-600">
                                                Editar
                                            </a>
                                            
                                            @if($membresia->tipo_membresia === 'por_visitas')
                                                <form action="{{ route('membresias.registrar-visita', $membresia) }}" 
                                                      method="POST" class="inline">
                                                    @csrf
                                                    <button type="submit" 
                                                            class="px-3 py-1 text-white bg-green-500 rounded hover:bg-green-600">
                                                        Registrar Visita
                                                    </button>
                                                </form>
                                            @endif

                                            <form action="{{ route('membresias.destroy', $membresia) }}" 
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
                        {{ $membresias->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 