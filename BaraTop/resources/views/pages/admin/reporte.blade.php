<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            Reporte
        </h2>
    </x-slot>


    <x-slot name="slot">

        <div class="w-full m-4 pr-8 flex flex-col lg:flex-row lg:pr-0 ">

            <div class="bg-white w-full shadow p-8 m-4 flex flex-col rounded">
                <span class="text-3xl font-semibold">Asunto: {{ $reporte->asunto }}</span>
                <div class="mt-4 mb-4 flex flex-col">
                    <span class="text-xl">RUT: {{ $reporte->rut }}</span>
                    <span class="text-xl">ID: {{ $reporte->id }}</span>
                    @php
                        $ar_fecha = explode('-', substr($reporte->created_at, 0, 10));
                        $fecha_f = $ar_fecha[2] . '/' . $ar_fecha[1] . '/' . $ar_fecha[0];
                    @endphp

                    <span class="text-xl">Fecha: {{ $fecha_f }}</span>

                    <p>{{ $reporte->texto }}</p>

                </div>

                
                
            </div>

            <div class="bg-white w-full shadow p-8 m-4 flex flex-col rounded">
                
                <form method="POST" action="{{ route('reportes.responder', ['reporte' => $reporte]) }}">
                    @csrf
                    @method('PATCH')

                    <span class="text-3xl font-semibold">Respuesta</span>
                    
                    <div class="mt-4 p-4">
                        
                        <x-textarea name="respuesta" id="text" class="block mt-1 w-auto" ></x-textarea>
                    </div>
    
                    <div class="flex item-center justify-end mt-4">
                        <x-button class="ml-4 ">{{ __('Responder')}}</x-button>
                    </div>
    
    
                </form>
                

                
            
            </div>
            

        </div>

    </x-slot>

    <x-slot name="scripts">
    </x-slot>

</x-app-layout>