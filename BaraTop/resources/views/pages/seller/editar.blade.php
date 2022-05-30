<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            {{ __('Editar') }}
        </h2>
    </x-slot>

    <x-slot name="slot">

        <x-form-card>
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('negocios.editar.telefono', [$negocio->patente]) }}">
                @csrf
                @method('put')
                <div>
                    <x-label for="telefono" :value="__('Telefono')" />
                    <x-input id="telefono" class="block mt-1 w-full " type="text" name="telefono" :value="old('telefono')" required autofocus />

                </div>

                <div class="flex item-center justify-end mt-4">
                    <x-button class="ml-4 ">{{ __('Editar')}}</x-button>
                    
                </div>


           </form>
       </x-form-card>

       
    </x-slot>

    <x-slot name="scripts">
    </x-slot>

</x-app-layout>