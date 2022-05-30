<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agregar Favorito') }}
        </h2>
    </x-slot>

    <x-slot name="slot">

        

       <x-form-card>
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('favoritos.post')}}">
                @csrf

                
                <div class="rounded-lg shadow-inner bg-gray-300 p-8 flex flex-col">
                    <span class="font-bold text-center">{{$negocio->nombre}}</span>
                    <span>Direccion: {{$negocio->direccion}}</span>
                    <span>Comuna: {{$negocio->comuna}}</span>



                </div>

                <div class="mt-4">
                    <x-label for="nombre" :value="__('Nombre')" />
                    <x-input id="nombre" class="block mt-1 w-full " type="text" name="nombre" value="{{$negocio->nombre}}" required autofocus />

                </div>

                <input type="text" class="hidden" name="negocio_patente" id="negocio_patente" value="{{$negocio->patente}}">

                <div class="flex item-center justify-end mt-4">
                    <x-button class="ml-4 ">{{ __('Agregar')}}</x-button>
                </div>


           </form>
       </x-form-card>

    </x-slot>

    <x-slot name="scripts">

        
    </x-slot>

</x-app-layout>