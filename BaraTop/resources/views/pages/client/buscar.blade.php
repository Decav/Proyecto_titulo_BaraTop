<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buscar') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <form method="GET" action="#">
            <div class="bg-white m-4 p-8 shadow flex">
            
                <input name="producto" class="w-full rounded-l-lg p-2 border-transparent bg-gray-200 shadow-inner" type="text" placeholder="Intenta buscar 'Leche'" value="{{ request('producto') }}">
                <select name="comuna" id="comuna" class="w-48  p-2 border-transparent bg-gray-200 shadow-inner">
                    <option value="-1">Ninguna</option>
                    @foreach ($comunas as $comuna)
                        @if ($comuna->nombre == request('comuna'))
                            <option selected value="{{$comuna->nombre}}">{{$comuna->nombre}}</option>
                        @else
                            <option value="{{$comuna->nombre}}">{{$comuna->nombre}}</option>
                        @endif
                        
                    @endforeach

                </select>
                <button class=" bg-red-600 shadow-md hover:bg-red-500 rounded-r-lg text-white p-2 pl-4 pr-4 transition duration-500 ease-in-out transform hover:scale-110">
                    
                    <span class="material-icons text-3xl py-1">search</span>
                    
                </button>
            

            </div>
        </form>

        <ul class="bg-white m-4 p-8 shadow flex flex-col">

            <!-- Productos Buscados -->
            @foreach($postproductos as $postproducto)

                @php
                    $etiqs = $postproducto->producto->etiquetas()->get();
                    $etiq_f = "";
                    foreach($etiqs as $etiq){

                        $etiq_f = $etiq_f .  $etiq->nombre . ", ";
                    }
                    $etiq_f = rtrim($etiq_f, ", ");
                @endphp


                
                @if (count($postproducto->negocio))
                    
                    
                    @if ($postproducto->oferta != null)
                        <x-producto-card image="http://images.lider.cl/wmtcl?source=url[file:/productos/5101a.jpg]&sink" negocio="{{$postproducto->negocio[0]->patente}}" product="{{$postproducto->producto->nombre}}" descripcion="{{$postproducto->producto->descripcion}}" etiquetas="{{ $etiq_f}}" location="{{$postproducto->negocio[0]->comuna}}" price="{{$postproducto->precio * (1 - $postproducto->oferta->descuento/100)}}" oferta="{{$postproducto->precio}}" telefono="{{$postproducto->negocio[0]->telefono}}"></x-product-card>
                        
                    @else
                        
                        <x-producto-card image="http://images.lider.cl/wmtcl?source=url[file:/productos/5101a.jpg]&sink" negocio="{{$postproducto->negocio[0]->patente}}" product="{{$postproducto->producto->nombre}}" descripcion="{{$postproducto->producto->descripcion}}" etiquetas="{{$etiq_f}}" location="{{$postproducto->negocio[0]->comuna}}" price="{{$postproducto->precio}}"  telefono="{{$postproducto->negocio[0]->telefono}}" ></x-product-card>
                        
                    @endif
                @endif

            @endforeach

        </ul>

    </x-slot>
    <x-slot name="scripts">
    </x-slot>
</x-app-layout>




