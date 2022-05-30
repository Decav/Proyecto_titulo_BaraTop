<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mi Negocio') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <div class="w-auto m-4 pr-8 flex flex-col lg:flex-row lg:pr-0 ">
            <div class="bg-white w-full shadow p-8 m-4 flex flex-col rounded">
                <span class="text-3xl font-semibold">Informacion</span>
                <div class="mt-4 mb-4 flex flex-col">
                    <span class="text-xl">Nombre: {{ $negocio->nombre}} </span>
                    <span class="text-xl">Comuna: {{ $negocio->comuna}} </span>
                    <span class="text-xl">Direccion: {{ $negocio->direccion}}</span>
                    <span class="text-xl">Telefono: {{ $negocio->telefono}}</span>

                    
                    

                </div>
                <button class="rounded mb-8 self-end bg-blue-600 flex flex-row justify-between hover:bg-blue-400 p-4 transform hover:scale-105 transition duration-500 ease-in-out pr-4 pl-4" onclick="window.location='{{ url('negocio/editar')}}' ">
                    <span class="text-xl font-semibold align-center text-white mr-2">Editar Telefono</span>
                    <span class="material-icons text-white">edit</span>
                </button>
                {{-- <button class=" mt-2 rounded bg-yellow-600 flex flex-row justify-between hover:bg-yellow-400 p-4 transform hover:scale-105 transition duration-500 ease-in-out pr-4 pl-4">
                    <span class="text-xl font-semibold align-center text-white">Agregar a Favoritos</span>
                    <span class="material-icons text-white">star</span>
                </button> --}}

                <span class="mt-8 text-3xl font-semibold ">Comentarios</span>
                <ul class="p-2 overflow-x-hidden overflow-y-auto h-screen border-2 border-gray-100 bg-gray-200 rounded-md">
                    @foreach ($feedbacks as $feedback)

                        <x-comentario usuario="{{$feedback->usuario->name}}" calificacion="{{$feedback->calificacion}}" fecha="{{$feedback->created_at}}">{{$feedback->comentario}}</x-comentario>
                    @endforeach
                </ul>
            </div>
            <div class="bg-white w-full shadow p-8 m-4 flex flex-col rounded">
                <span class="text-3xl font-semibold">Ofertas</span>
                <ul class="mb-4 p-2 overflow-x-hidden overflow-y-auto h-96 border-2 border-gray-100 bg-gray-200 rounded-md">
                    
                    
                    
                    @foreach ($postproductos as $postproducto)
                        
                        @if ($postproducto->oferta != null)
                            @php
                                $etiqs = $postproducto->producto->etiquetas()->get();
                                $etiq_f = "";
                                foreach($etiqs as $etiq){
            
                                    $etiq_f = $etiq_f .  $etiq->nombre . ", ";
                                }
                                $etiq_f = rtrim($etiq_f, ", ");
                            @endphp


                            <x-producto-profile imagen='http://images.lider.cl/wmtcl?source=url[file:/productos/5101a.jpg]&sink' producto='{{$postproducto->producto->nombre}}' stock='{{$postproducto->stock_referencial}}' descripcion="{{$postproducto->producto->descripcion}}" comuna='{{ $negocio->comuna}}' etiquetas="{{$etiq_f}}" precio='{{ $postproducto->precio }}' oferta='{{ ($postproducto->precio * (1 - $postproducto->oferta->descuento/100))}}'></x-producto-profile>
                        @endif
                    @endforeach
                    
                    
                    

                </ul>
                <button class="rounded w-full mb-8 self-end bg-yellow-600 flex flex-row justify-between hover:bg-yellow-400 p-4 transform hover:scale-105 transition duration-500 ease-in-out pr-4 pl-4" onclick="window.location='{{ url('negocio/administrar/ofertas')}}' ">
                    <span class="text-xl font-semibold align-center text-white mr-2">Administrar mis ofertas</span>
                    <span class="material-icons text-white">local_offer</span>
                </button>

                <span class="text-3xl font-semibold mt-2">Productos</span>
                <ul class="p-2 mb-8 overflow-x-hidden overflow-y-auto h-96 border-2 border-gray-100 bg-gray-200 rounded-md">
                    
                    
                    @foreach ($postproductos as $postproducto)
                        @if ($postproducto->oferta == null)
                            @php
                                $etiqs = $postproducto->producto->etiquetas()->get();
                                $etiq_f = "";
                                foreach($etiqs as $etiq){
            
                                    $etiq_f = $etiq_f .  $etiq->nombre . ", ";
                                }
                                $etiq_f = rtrim($etiq_f, ", ");
                            @endphp

                        <x-producto-profile imagen='http://images.lider.cl/wmtcl?source=url[file:/productos/5101a.jpg]&sink' producto='{{$postproducto->producto->nombre}}' stock='{{$postproducto->stock_referencial}}' descripcion="{{$postproducto->producto->descripcion}}" etiquetas="{{$etiq_f}}" comuna='{{ $negocio->comuna}}' precio='{{$postproducto->precio}}'></x-producto-profile>
                        @endif
                        
                    @endforeach
                    


                </ul>

                <button class="rounded w-full mb-8 self-end bg-green-600 flex flex-row justify-between hover:bg-green-400 p-4 transform hover:scale-105 transition duration-500 ease-in-out pr-4 pl-4" onclick="window.location='{{ url('negocio/administrar/productos')}}' ">
                    <span class="text-xl font-semibold align-center text-white mr-2">Administrar mis productos</span>
                    <span class="material-icons text-white">inventory_2</span>
                </button>
            </div>
        </div>
    </x-slot>

    <x-slot name="scripts">
    </x-slot>
</x-app-layout>