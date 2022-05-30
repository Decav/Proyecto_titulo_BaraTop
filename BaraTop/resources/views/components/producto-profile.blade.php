@props([ 'producto' => 'Producto', 'descripcion' => '', 'etiquetas' => '','stock' => 0, 'precio' => 2000, 'oferta' => 0, 'comuna' => '-1', 'imagen' => ''])

<li class="group bg-white h-24 w-auto rounded mt-2 border-2 border-gray items-center flex flex-row justify-between shadow p-4 hover:bg-yellow-300 transform hover:scale-105 transition duration-500 ease-in-out">
    {{-- <img  class=" w-16 h-16 rounded-full border-2 border-gray " src="{{ $imagen }}" alt="">  --}}

    {{-- <span class="hidden md:block material-icons text-4xl">inventory_2</span> --}}

    {{-- <span class="text-xl">{{ $producto}}</span> --}}

    <div class="ml-2 flex flex-col w-32">


        <span class="text-lg font-bold opacity-100 group-hover:opacity-0 group-hover:absolute duration-100">{{ $producto }}</span>

         <!-- Leche Entera Colun 200cc -->
        
        <div class=" p-0 md:p-1  opacity-0 group-hover:opacity-100  fixed top-0 bottom-0 group-hover:fixed flex flex-col duration-100">
            <span class="text-lg font-bold">{{ $producto }}</span>
            <span class="">{{ $descripcion }}</span> <!-- Leche Entera Colun 200cc -->
            <div class="flex flex-rows w-50">
                @foreach ( explode(",",$etiquetas) as $e)
                    <span class="cursor-pointer bg-green-100 rounded-lg p-1 mr-2 text-sm shadow font-semibold" onclick="window.location='{{ url('/buscar?producto='. $e .'&comuna='. $comuna .'#') }}'">{{$e}}</span>
                @endforeach

            </div>
            {{-- <span class="text-sm">{{$etiquetas}}</span> <!-- Leche Entera Colun 200cc --> --}}
        </div>
        
    </div>

    <div class="w-30 ">

        <span class="ml-1 opacity-100 group-hover:opacity-0 duration-50">{{$stock}}</span>

        <div class="flex flex-col opacity-0 group-hover:opacity-100 fixed left-70 top-4 duration-100">
            <span class="text-sm text-center font-bold">Stock Referencial</span>
            <span class="text-center font-semibold">{{$stock}}</span>
        </div>
        
    </div>



    <div class="flex flex-col">
        <?php if( $oferta > 0): ?>
            <span class="text-sm text-red-500 line-through text-right">${{ $precio}}</span>
            <span class="text-2xl text-semibold">${{ $oferta }}</span>
        <?php else: ?>
            <span class="text-2xl text-semibold">${{ $precio }}</span>
        <?php endif ?>
    </div>
</li>