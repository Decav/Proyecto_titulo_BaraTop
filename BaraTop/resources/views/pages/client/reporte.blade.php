<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            Mi Reporte
        </h2>
    </x-slot>


    <x-slot name="slot">

        <div class="w-full m-4 pr-8 flex flex-col lg:flex-row lg:pr-0 ">

            <div class="bg-white w-full shadow p-8 m-4 flex flex-col rounded">
                <span class="text-3xl font-semibold">Asunto: {{ $reporte->asunto }}</span>
                <div class="mt-4 mb-4 flex flex-col">
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
                
                <span class="text-3xl font-semibold mb-4">Respuesta</span>
                <?php if($reporte->estado != 0): ?>
                    <p>
                        {{$reporte->respuesta}}
                    </p>
                    <span class="text-2xl font-semibold mt-4">¿Se soluciono mi problema?</span>
                    <div class="flex flex-row p-4 justify-evenly">
                        
                        <?php if($reporte->estado == 1): ?>
                            <button id="btnSi" class="w-full mr-4 rounded bg-green-600 flex flex-row justify-between hover:bg-green-400 p-4 transform hover:scale-105 transition duration-500 ease-in-out pr-4 pl-4">
                                <span class="text-xl font-semibold align-center text-white">Si </span>
                                <span class="material-icons text-white">thumb_up</span>
                            </button>
                            <button  id="btnNo" class="w-full rounded bg-red-600 flex flex-row justify-between hover:bg-red-400 p-4 transform hover:scale-105 transition duration-500 ease-in-out pr-4 pl-4">
                                <span class="text-xl font-semibold align-center text-white">No </span>
                                <span class="material-icons text-white">thumb_down</span>
                            </button>
                        <?php endif ?>
                    </div>
                <?php else: ?>
                    <div class="flex p-4 items-center justify-evenly bg-gray-200 rounded shadow-inner">
                        <span class="text-3xl">¡Pronto responderemos tu solicitud!</span>
                    </div>

                <?php endif ?>

                
            
            </div>
            

        </div>

    </x-slot>

    <x-slot name="scripts">
        <script src="{{asset('js/service/reportesService.js')}}"></script>
        <script src="{{asset('js/clienteReporte_respuesta.js')}}"></script>
    </x-slot>

</x-app-layout>