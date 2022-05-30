<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Favoritos') }}
        </h2>
    </x-slot>

    <x-slot name="slot">

    <ul class="m-4 p-8 bg-white shadow flex flex-col">

        @foreach ($favoritos as $favorito)

            <x-favorite-card negocio="{{$favorito->nombre}}" location="{{$favorito->negocio->comuna}}" patente="{{$favorito->negocio_patente}}" id="{{$favorito->id}}"></x-favorite-card>
            
        @endforeach
    </ul>
       

    </x-slot>
    <x-slot name="scripts">
        <script src="{{asset('js/favorito.js')}}"></script>
    </x-slot>
</x-app-layout>




