<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reportes') }}
        </h2>
    </x-slot>

    <x-slot name="slot">

        
    <div class="w-auto m-4 pr-8 flex flex-col lg:flex-row lg:pr-0 ">


        <div class="bg-white m-4 p-10 rounded shadow w-full">

            <span class="text-2xl font-semibold">Enviar Reporte</span>

            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('reportes.post') }}">
                @csrf


                <div class="mt-4">
                    <x-label for="asunto" :value="__('Asunto')" />
                    <x-input id="asunto" class="block mt-1 w-full" type="text" name="asunto" :value="old('asunto')" required autofocus />
                </div>
                
                <div class="mt-4">
                    <x-label for="texto" :value="__('Comentario')" />
                    <x-textarea name="texto" id="text" class="block mt-1 w-full" ></x-textarea>
                </div>

                <div class="mt-4">
                    <x-label for="tipo" :value="__('Categoria')" />
                    <x-select id='tipo' name='tipo'>
                        <option value="0">Reclamo</option>
                        <option value="1">Sugerencia</option>
                        <option value="2">Error</option>
                    </x-select>
                </div>


                <div class="flex item-center justify-end mt-4">
                    <x-button class="ml-4 ">{{ __('Enviar')}}</x-button>
                </div>


            </form>
        </div>

        <div class="bg-white m-4 p-10 rounded shadow w-full">
            <span class="text-2xl font-semibold">Mis Reportes</span>
            <table class="mt-4 p-2 table-fixed rounded-md min-w-full divide-y divide-gray-200 shadow-lg">
                <thead class="bg-gray-50">
                    <tr>
                        
                        <td class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Asunto</td>
                        <td class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Tipo</td>
                        <td class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Fecha</td>
                        <td class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Estado</td>
                        <td class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Acciones</td>
                    </tr>
                </thead>
                <tbody id="tbody-soporte" class="divide-y divide-gray-200">
                </tbody>
            </table>

        </div>
    </div>
    </x-slot>

    <x-slot name="scripts">
        @if(Auth::check())
            <script>
                var userRUT = '{{ Auth::user()->rut }}';
            </script>
        @endif
        <script src="{{asset('js/service/reportesService.js')}}"></script>
        <script src="{{asset('js/soporte.js')}}"></script>
    </x-slot>

</x-app-layout>