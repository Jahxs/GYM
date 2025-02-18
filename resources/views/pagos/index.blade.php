<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Pagos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <a href="{{ route('pagos.create') }}" 
                           class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">
                            Nuevo Pago
                        </a>
                    </div>

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Cliente
                                </th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Membresía
                                </th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Monto
                                </th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Estado
                                </th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Método
                                </th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Fecha
                                </th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($pagos as $pago)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $pago->usuario->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $pago->membresia->tipo_membresia }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        ${{ number_format($pago->monto, 2) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            {{ $pago->estado_pago === 'pagado' ? 'bg-green-100 text-green-800' : 
                                               ($pago->estado_pago === 'pendiente' ? 'bg-red-100 text-red-800' : 
                                                'bg-yellow-100 text-yellow-800') }}">
                                            {{ ucfirst($pago->estado_pago) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $pago->metodoPago->nombre }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $pago->fecha_pago->format('d/m/Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('pagos.edit', $pago) }}" 
                                               class="px-3 py-1 text-white bg-yellow-500 rounded hover:bg-yellow-600">
                                                Editar
                                            </a>

                                            <form action="{{ route('pagos.destroy', $pago) }}" 
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
                        {{ $pagos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 