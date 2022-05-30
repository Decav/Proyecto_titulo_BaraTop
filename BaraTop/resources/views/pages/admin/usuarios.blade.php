<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel de Usuarios') }}
        </h2>
    </x-slot>

    <x-slot name="slot">

        <div class="w-auto m-4 pr-8 flex flex-col lg:flex-row lg:pr-0 ">
         
            <div class="bg-white m-4 p-8 rounded shadow w-full">
                <span class="text-2xl font-semibold">Usuarios</span>
                <table class="mt-4 p-2 table-fixed rounded-md min-w-full divide-y divide-gray-200 shadow-lg">
                    <thead class="bg-gray-50">
                        <tr>
                            <td class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Rut</td>
                            <td class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nombre</td>
                            <td class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Email</td>
                            <td class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Rol</td>
                            <td class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Acciones</td>
                        </tr>
                    </thead>
                    <tbody id="tbody-usuarios" class="divide-y divide-gray-200">
                    </tbody>
                </table>
            </div>

        </div>
       

    </x-slot>

    <x-slot name="scripts">
        <script src="{{asset('js/service/usuariosService.js')}}"></script>
        <script src="{{asset('js/usuarios.js')}}"></script>
    </x-slot>

</x-app-layout>