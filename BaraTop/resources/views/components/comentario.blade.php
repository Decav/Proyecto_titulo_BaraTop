@props(['usuario' => 'Usuario', 'calificacion' => 1, 'fecha' => '12/12/2021'])


<li class="bg-white flex w-50 flex-col mt-4 p-4 rounded-md border-2 border-gray shadow" >
    <div class="flex flex-row justify-between">
        <span class="text-xl font-bold">{{$usuario}}</span>

        <?php if( $calificacion > 0): ?>

            <span class="material-icons text-green-500">thumb_up</span>
        <?php else: ?>
        <span class="material-icons text-red-500">thumb_down</span>


        <?php endif ?>
    </div>

    <p class="overflow-ellipsis mt-2">{{ $slot }}</p>

    <div class="flex flex-row justify-end mt-2">
        @php
            $ar_fecha = explode('-', substr($fecha, 0, 10));
            $fecha_f = $ar_fecha[2] . '/' . $ar_fecha[1] . '/' . $ar_fecha[0];
        @endphp

        <span class="font-semibold">{{$fecha_f}}</span>
    </div>
</li>
