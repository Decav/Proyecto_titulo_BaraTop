<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            {{ __('Agregar oferta') }}
        </h2>
    </x-slot>
    
    <x-slot name="slot">
        <div class="w-auto m-4 pr-8 flex flex-col lg:flex-row lg:pr-0 ">


            <div class="bg-white m-4 p-10 rounded shadow w-full">
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
    
                <form method="POST" action="{{ route('oferta.post')}}">
                    @csrf
        
                    <div class="mt-4">
                        <x-label for="postproducto" :value="__('Mi Producto')" />
                        <x-select id='postproducto' name='postproducto'>
                            @foreach ($postproductos as $postproducto)
                                @if ($postproducto->oferta == null)
                                <option value="{{$postproducto->id}}">{{$postproducto->producto->nombre}} : ${{$postproducto->precio}}</option>
                                @endif
                                
                            @endforeach

                        </x-select>
                    </div>

        
                    <div class="mt-4">
                        <x-label for="descuento" :value="__('Porcentaje de Descuento (1 - 90)')" />
                        <x-input id="descuento" class="block mt-1 w-full" type="number" name="descuento" :value="old('descuento')" required autofocus />
                    </div>
        
        
                    <div class="flex item-center justify-end mt-4">
                        <x-button class="ml-4 ">{{ __('Agregar')}}</x-button>
                    </div>
                

                </form>
            </div>


            <div class="bg-white m-4 p-8 rounded shadow w-full">
                <span class="text-2xl font-semibold">Mis Ofertas</span>
                
                <table class="mt-4 p-2 table-fixed rounded-md min-w-full divide-y divide-gray-200 shadow-lg">
                    <thead class="bg-gray-50">
                        <tr>
                            
                            <td class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Producto</td>
                            <td class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Precio Normal</td>
                            <td class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Descuento</td>
                            <td class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Precio Oferta</td>
                            <td class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Acciones</td>  
                        </tr>   
                    </thead>
                    <tbody id="tbody-oferta" class="divide-y divide-gray-200">
                        @foreach ($postproductos as $postproducto)
                            
                            @if ($postproducto->oferta != null)
                            <tr>
                                <td id="tbody-producto" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">{{$postproducto->producto->nombre}}</td>
                                <td id="tbody-precio" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">${{$postproducto->precio}} </td>
                                <td id="tbody-descuento" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">{{($postproducto->oferta->descuento)}}%</td>
                                <td id="tbody-oferta" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">${{($postproducto->precio * (1 - $postproducto->oferta->descuento/100))}}</td>
                                <td id="tbody-button" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    <button onclick="confirmarEliminacion('{{$postproducto->oferta->id}}')" class="inline-flex items-center px-2  shadow-md py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:shadow-lg hover:bg-red-400 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring ring-red-300 disabled:opacity-25 transform hover:scale-105 focus:scale-110 transition ease-in-out duration-150">
                                        <span class='text-md material-icons text-white'>delete</span>
                                    </button>    
                                    <form id="formid_{{$postproducto->oferta->id}}" method="post" action="{{route('oferta.delete', $postproducto->oferta->id)}}">
                                        @csrf
                                        @method('delete')
                                        
                                    </form>
                                    
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </x-slot>

    <x-slot name="scripts">
    <script src="{{asset('js/favorito.js')}}"></script>
        <!-- <script src="asset('js/service/ofertasService.js')}}"></script>
         -->
    </x-slot>

</x-app-layout>