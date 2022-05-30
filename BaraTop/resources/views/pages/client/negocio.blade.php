<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            {{ $negocio->nombre }}
        </h2>
    </x-slot>


    <x-slot name="slot">

        <div class="w-auto m-4 pr-8 flex flex-col lg:flex-row lg:pr-0 ">

            <div class="bg-white w-full shadow p-8 m-4 flex flex-col rounded">
                <span class="text-3xl font-semibold">Informacion</span>
                <div class="mt-4 mb-4 flex flex-col">
                    <span class="text-xl">Comuna: {{ $negocio->comuna }}</span>
                    <span class="text-xl">Direccion: {{ $negocio->direccion }}</span>
                    <span class="text-xl">Telefono: {{ $negocio->telefono }}</span>

                    

                </div>
                <button class="rounded bg-green-600 flex flex-row justify-between hover:bg-green-500 p-4 transform hover:scale-105 transition duration-500 ease-in-out pr-4 pl-4" onclick="window.open('https://wa.me/56{{$negocio->telefono}}')">
                    <span class="text-xl font-semibold align-center text-white">Contactar</span>
                    <span class="material-icons text-white">whatsapp</span>
                </button>

               
 
                    
                
                @if ( $minegocio != null  && $negocio->patente == $minegocio->patente)

                    <button class=" mt-2 text-gray-100 rounded bg-gray-300 flex flex-row justify-between p-4 pr-4 pl-4" disabled>
                        <span class="text-xl font-semibold align-center text-white">Agregar a Favoritos</span>
                        <span class="material-icons text-white">star</span>
                    </button>

                @else
                    
                    
                    @if ($favorito != "[]")
                        <button class=" mt-2 rounded bg-red-600 flex flex-row justify-between hover:bg-red-400 p-4 transform hover:scale-105 transition duration-500 ease-in-out pr-4 pl-4" onclick="confirmarEliminacion('{{$favorito[0]->id}}')">
                            <span class="text-xl font-semibold align-center text-white">Quitar de Favoritos</span>
                            <span class="material-icons text-white">star</span>
                        </button>
    
                        <form id="formid_{{$favorito[0]->id}}" method="POST" action="{{ route('favoritos.delete', $favorito[0]->id)}}">
                            @csrf
                            @method('delete')
                        </form>

                    @else
                        <button class=" mt-2 rounded bg-yellow-600 flex flex-row justify-between hover:bg-yellow-400 p-4 transform hover:scale-105 transition duration-500 ease-in-out pr-4 pl-4" onclick="window.location='{{ url('negocio/' . $negocio->patente .'/agregar_favorito')}}'">
                            <span class="text-xl font-semibold align-center text-white">Agregar a Favoritos</span>
                            <span class="material-icons text-white">star</span>
                        </button>




                    @endif
                
                @endif



                {{-- @endif --}}

                    
                
                
                <span class="text-3xl font-semibold mt-4">Comentarios</span>
                <ul class="p-2 overflow-x-hidden overflow-y-auto h-screen border-2 border-gray-100 bg-gray-200 rounded-md">
                @foreach ($feedbacks as $feedback)

                     <x-comentario usuario="{{$feedback->usuario->name}}" calificacion="{{$feedback->calificacion}}" fecha="{{$feedback->created_at}}">{{$feedback->comentario}}</x-comentario>
                @endforeach
                    
                </ul>
                @if ($minegocio == null || $negocio->patente != $minegocio->patente)
                    <div class="p-4">
                        <form method="POST" action="{{route('feedback.post')}}">
                            @csrf
                
                            <div class="mt-4">
                                <x-label for="comentario" :value="__('Comentario')" />
                                <x-textarea name="comentario" id="text" class="block mt-1 w-auto" ></x-textarea>
                            </div>
                            
                            
                            <input id="patente" name="patente" type="text" class="hidden" value="{{ $negocio->patente}}">

                            <div class="flex item-center justify-end mt-2">

                                <div class="flex w-full justify-start content-center">
                                    <div>
                                        <input type="radio" id="megusta"  name="calificacion"  class="mb-3" value="1" />
                                        <span class="material-icons text-green-500" for="megusta">thumb_up</span>
                                    </div>
                                    <div class="ml-4">
                                        <input type="radio" class="mb-3"  name="calificacion" value="0" />
                                        <span class="material-icons text-red-500" for="nomegusta">thumb_down</span>

                                    </div>
                                </div>
                                <x-button class="ml-4 ">{{ __('Comentar')}}</x-button>
                            </div>
                
                        </form>
                    </div>
                @endif


            </div>
            <!--- http://images.lider.cl/wmtcl?source=url[file:/productos/5101a.jpg]&sink -->
            <div class="bg-white w-full shadow p-8 m-4 flex flex-col rounded">
                <span class="text-3xl font-semibold">Ofertas</span>
                <ul class="p-2 overflow-x-hidden overflow-y-auto h-96 border-2 border-gray-100 bg-gray-200 rounded-md">
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


                            <x-producto-profile imagen='http://images.lider.cl/wmtcl?source=url[file:/productos/5101a.jpg]&sink' producto='{{$postproducto->producto->nombre}}' stock='{{$postproducto->stock_referencial}}' descripcion="{{$postproducto->producto->descripcion}}" etiquetas="{{$etiq_f}}" precio='{{ $postproducto->precio }}' comuna='{{ $negocio->comuna}}' oferta='{{ ($postproducto->precio * (1 - $postproducto->oferta->descuento/100))}}'></x-producto-profile>
                        @endif
                    @endforeach
                </ul>
                <span class="text-3xl font-semibold mt-2">Productos</span>
                <ul class="p-2 overflow-x-hidden overflow-y-auto h-96 border-2 border-gray-100 bg-gray-200 rounded-md">
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


            </div>

        </div>

    </x-slot>

    <x-slot name="scripts">
        <script src="{{asset('js/favorito.js')}}"></script>
    </x-slot>

</x-app-layout>