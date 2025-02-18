<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Accesos Rápidos</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <a href="{{ route('membresias.index') }}" 
                           class="block p-6 bg-blue-50 hover:bg-blue-100 rounded-lg">
                            <h4 class="font-bold text-blue-700">Gestión de Membresías</h4>
                            <p class="text-blue-600">Administrar membresías de clientes</p>
                        </a>

                        <a href="{{ route('pagos.index') }}" 
                           class="block p-6 bg-green-50 hover:bg-green-100 rounded-lg">
                            <h4 class="font-bold text-green-700">Gestión de Pagos</h4>
                            <p class="text-green-600">Administrar pagos de membresías</p>
                        </a>

                        <a href="{{ route('metodos-pago.index') }}" 
                           class="block p-6 bg-purple-50 hover:bg-purple-100 rounded-lg">
                            <h4 class="font-bold text-purple-700">Métodos de Pago</h4>
                            <p class="text-purple-600">Gestionar métodos de pago disponibles</p>
                        </a>

                        <a href="{{ route('rutinas-predefinidas.index') }}" 
                           class="block p-6 bg-orange-50 hover:bg-orange-100 rounded-lg">
                            <h4 class="font-bold text-orange-700">Rutinas Predefinidas</h4>
                            <p class="text-orange-600">Gestionar rutinas de entrenamiento</p>
                        </a>

                        <a href="{{ route('asignacion-rutinas.index') }}" 
                           class="block p-6 bg-pink-50 hover:bg-pink-100 rounded-lg">
                            <h4 class="font-bold text-pink-700">Asignación de Rutinas</h4>
                            <p class="text-pink-600">Asignar rutinas a clientes</p>
                        </a>

                        <a href="{{ route('asistencias.index') }}" 
                           class="block p-6 bg-indigo-50 hover:bg-indigo-100 rounded-lg">
                            <h4 class="font-bold text-indigo-700">Control de Asistencias</h4>
                            <p class="text-indigo-600">Registrar entradas y salidas de clientes</p>
                        </a>

                        <a href="{{ route('nutricion.index') }}" 
                           class="block p-6 bg-yellow-50 hover:bg-yellow-100 rounded-lg">
                            <h4 class="font-bold text-yellow-700">Información Nutricional</h4>
                            <p class="text-yellow-600">Gestionar información y planes de dieta</p>
                        </a>

                        <a href="{{ route('implementos.index') }}" 
                           class="block p-6 bg-teal-50 hover:bg-teal-100 rounded-lg">
                            <h4 class="font-bold text-teal-700">Gestión de Implementos</h4>
                            <p class="text-teal-600">Administrar equipos y materiales</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
