<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Control de Asistencias') }}
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

                    <div class="mb-4 flex justify-between items-center">
                        <div>
                            <a href="{{ route('asistencias.create') }}" 
                               class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">
                                Nuevo Registro
                            </a>
                        </div>
                        
                        <!-- Formulario de Registro Rápido -->
                        <form action="{{ route('asistencias.entrada') }}" method="POST" class="flex gap-2">
                            @csrf
                            <select name="id_usuario" 
                                    class="rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="">Seleccionar cliente</option>
                                @foreach(App\Models\User::where('rol', 'cliente')->get() as $usuario)
                                    <option value="{{ $usuario->id_usuario }}">{{ $usuario->name }}</option>
                                @endforeach
                            </select>
                            <button type="submit" 
                                    class="px-4 py-2 text-white bg-green-500 rounded hover:bg-green-600">
                                Registrar Entrada
                            </button>
                        </form>
                    </div>

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Cliente
                                </th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Fecha
                                </th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Entrada
                                </th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Salida
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
                            @foreach ($asistencias as $asistencia)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $asistencia->usuario->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $asistencia->fecha_asistencia->format('d/m/Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ \Carbon\Carbon::parse($asistencia->hora_ingreso)->format('H:i') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $asistencia->hora_salida ? \Carbon\Carbon::parse($asistencia->hora_salida)->format('H:i') : 'No registrada' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            {{ $asistencia->estado === 'presente' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ ucfirst($asistencia->estado) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex space-x-2">
                                            @if(!$asistencia->hora_salida)
                                                <form action="{{ route('asistencias.salida', $asistencia) }}" 
                                                      method="POST" 
                                                      class="inline">
                                                    @csrf
                                                    <button type="submit" 
                                                            class="px-3 py-1 text-white bg-green-500 rounded hover:bg-green-600">
                                                        Registrar Salida
                                                    </button>
                                                </form>
                                            @endif

                                            <form action="{{ route('asistencias.destroy', $asistencia) }}" 
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
                        {{ $asistencias->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 