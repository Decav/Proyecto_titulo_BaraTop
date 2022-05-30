
@props(['negocio' => 'negocio', 'location'=>'Ningun lugar', 'patente'=> '', 'id' => ''])


<li class="w-auto bg-white shadow m-2 p-4 border-2 border-gray items-center rounded justify-between flex flex-row hover:bg-yellow-100  transform hover:scale-105 transition duration-500 ease-in-out">
           
    <span class="hidden md:block mt-3 mb-2 text-3xl items-center material-icons text-yellow-500">star</span>
    <span>{{ $negocio }}</span>
   <span class="hidden md:block">{{$location}}</span>
   <div class="flex">
    
    <button class="ml-1 rounded bg-blue-600 hover:bg-blue-400 transform hover:scale-105 transition duration-500 ease-in-out pr-4 pl-4" onclick="window.location='{{ url('negocio/' . $patente)}}'">
        <span class=" mt-3 mb-2 items-center material-icons text-white">store</span>
    </button>
    <button  class="ml-1 rounded bg-red-600 hover:bg-red-400 transform hover:scale-105 transition duration-500 ease-in-out pr-4 pl-4" onclick="confirmarEliminacion('{{$id}}')">
        <span class=" mt-3 mb-2 items-center material-icons text-white">block</span>
    </button>
    
    <form id="formid_{{$id}}" method="POST" action="{{ route('favoritos.delete', $id)}}">
        @csrf
        @method('delete')
    </form>

   </div>
</li>