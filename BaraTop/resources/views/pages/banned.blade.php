<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            Cuenta Bloqueada
        </h2>
    </x-slot>


    <x-slot name="slot">

        <div class="w-auto h-full m-4 pr-8 flex justify-center">

            <div class="bg-white w-auto h-auto shadow-lg shadow-red-500 p-8 m-4 flex flex-col rounded justify-center items-center ">
                <span class="mb-8 text-8xl text-red-500 font-semibold material-icons">block</span>
                <span class="text-4xl font-semibold ">Tu cuenta ha sido bloqueada, por infringir terminos y condiciones de BaraTop.</span>
                <span class="mt-8 text-4xl font-bold ">Lo lamentamos :(</span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Cerrar Sesion') }}
                    </button>
                </form>
            </div>

        </div>

    </x-slot>

    <x-slot name="scripts">
    </x-slot>

</x-app-layout>