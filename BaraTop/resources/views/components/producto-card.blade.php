@props(['image' => '', 'product' => 'Producto', 'descripcion' => 'desc', 'etiquetas' => '', 'price' => '0', 'location' => 'Ningun lugar', 'negocio' => '', 'oferta' => 0, 'telefono' => 0])



<li class=" group transition duration-500 h-28 ease-in-out w-auto bg-white border-2 border-yellow hover:bg-yellow-100 transform hover:scale-105 m-3 p-4 shadow rounded flex flex-cols content-evenly justify-between items-center">
                
                
    {{-- <img  class="hidden md:block w-16 h-16 rounded-full border-2 border-gray " src="{{ $image }}" alt=""> <!-- http://images.lider.cl/wmtcl?source=url[file:/productos/5101a.jpg]&sink --> --}}
    <span class="hidden md:block ml-4 material-icons text-4xl">inventory_2</span>
    <div class="flex flex-col relative w-64">


        <span class="text-lg font-bold opacity-100 group-hover:opacity-0 group-hover:absolute duration-100">{{ $product }}</span>

         <!-- Leche Entera Colun 200cc -->
        
        <div class=" p-0 md:p-3  opacity-0 group-hover:opacity-100  fixed top-0 bottom-0 group-hover:fixed flex flex-col duration-100">
            <span class="text-lg font-bold">{{ $product }}</span>
            <span class="">{{ $descripcion }}</span> <!-- Leche Entera Colun 200cc -->
            <div class="flex flex-rows w-50">
                @foreach ( explode(",",$etiquetas) as $e)
                    <span class=" cursor-pointer bg-green-100 rounded-lg p-1 mr-2 text-sm shadow font-semibold" onclick="window.location='{{ url('/buscar?producto='. $e .'&comuna='. $location .'#') }}'">{{$e}}</span>
                @endforeach

            </div>
            {{-- <span class="text-sm">{{$etiquetas}}</span> <!-- Leche Entera Colun 200cc --> --}}
        </div>
        
    </div>
    

    <span class="hidden md:block">{{ $location}}</span> <!-- Quillota -->

    <div class="flex flex-col">
        <?php if( $oferta > 0): ?>
            <span class="text-sm text-red-500 line-through text-right">${{ $oferta}}</span>
            <span class="text-2xl text-semibold">${{ $price }}</span>
        <?php else: ?>
            <span class="text-2xl text-semibold">${{ $price }}</span>
        <?php endif ?>
    </div>


    <div class="flex">
        <button class="ml-1 rounded bg-blue-600 hover:bg-blue-400 transform hover:scale-105 transition duration-500 ease-in-out pr-4 pl-4" onclick="window.open('https://wa.me/56{{$telefono}}')">
            <span class=" mt-3 mb-2 items-center material-icons text-white">textsms</span>
        </button>

        

        <button class="ml-1 rounded bg-blue-600 hover:bg-blue-400 transform hover:scale-105 transition duration-500 ease-in-out pr-4 pl-4" onclick="window.location='{{ url('negocio/'. $negocio)}}'">
            <span class=" mt-3 mb-2 items-center material-icons text-white">store</span>
        </button>
        
    </div>

</li>