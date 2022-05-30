<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel de etiquetas') }}
        </h2>
    </x-slot>

    <x-slot name="slot">

        <div class="w-auto m-4 pr-8 flex flex-col lg:flex-row lg:pr-0 ">


            <div class="bg-white m-4 p-10 rounded shadow w-full">

                <span class="text-2xl font-semibold">Registrar Etiquetas</span>

                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form method="POST" action="{{ route('etiquetas.post') }}">
                    @csrf
                    <div class="mt-4">
                        <x-label for="nombre" :value="__('Nombre de la etiqueta')" />
                        <x-input id="nombre" class="block mt-1 w-full " type="text" name="nombre" :value="old('nombre')" required autofocus />

                    </div>
                    <div class="flex item-center justify-end mt-4">
                        <x-button class="ml-4 ">{{ __('Registrar etiqueta')}}</x-button>
                    </div>
                </form>
            </div>
            
            <div class="bg-white m-4 p-8 rounded shadow w-full">
                <span class="text-2xl font-semibold">Etiquetas</span>
                <table class="mt-4 p-2 table-fixed rounded-md min-w-full divide-y divide-gray-200 shadow-lg">
                    <thead class="bg-gray-50">
                        <tr>
                            <td class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">ID</td>
                            <td class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nombre</td>
                            <td class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Acciones</td>
                        </tr>
                    </thead>
                    <tbody id="tbody-etiqueta" class="divide-y divide-gray-200">
                    </tbody>
                </table>
            </div>

        </div>
       

    </x-slot>

    <x-slot name="scripts">
        <script src="{{asset('js/service/etiquetasService.js')}}"></script>
        <script src="{{asset('js/etiquetas.js')}}"></script>
    </x-slot>

</x-app-layout>