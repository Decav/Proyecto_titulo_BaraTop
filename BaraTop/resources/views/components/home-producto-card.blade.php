@props(['image' => '', 'product' => 'Producto', 'price' => '0', 'oferta' => 0])


<div class="flex-shrink-0 transition duration-500 ease-in-out w-64 h-64 bg-white border-2 border-yellow hover:bg-yellow-100 transform hover:scale-105 m-3 p-4 shadow rounded flex flex-col justify-between items-center">
                
                
    {{-- <img  class="hidden md:block w-32 h-32 rounded-full border-2 border-gray " src="{{ $image }}" alt=""> <!-- http://images.lider.cl/wmtcl?source=url[file:/productos/5101a.jpg]&sink --> --}}
    
    <span class="hidden md:block md:mt-10  text-center material-icons text-6xl">inventory_2</span>

    <span class="mt-4 font-semibold">{{ $product }}</span> <!-- Leche Entera Colun 200cc -->

    <div class="flex flex-col mt-2">
        <?php if( $oferta > 0): ?>

            <span class="text-sm text-red-500 line-through text-right">${{ $price }}</span>
            <span class="text-2xl text-semibold">${{ $oferta }}</span>

        <?php else: ?>
            <span class="text-2xl text-semibold">${{ $price }}</span>
        <?php endif ?>
    </div>
    
    

</div>