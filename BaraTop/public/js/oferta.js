
const deleteOferta = async function(){
    let id = this.idOferta;
    let eliminarbtn = await Swal.fire({title:"Esta seguro de la operacion?",text:"Esta operacion no es reversible"
    , icon: "warning",showCancelButton:true});
    if(eliminarbtn.isConfirmed){
        Swal.fire("La Oferta a eliminar es: " + this.nombreOferta);
        if(await eliminarOferta(id)){
            let oferta = await getOfertas();
            cargarTabla(oferta);
            Swal.fire("Oferta eliminada", "Se elimino correctamente la Oferta", "info");
        }
    }else{
        Swal.fire("Cancelado", "La operacion fue cancelada", "info");
    }
    
}
const cargarTabla = () =>{
    let tbody = document.querySelector("#tbody-oferta");
    for(let i=0; i < oferta.length; ++i){
        let tr = document.createElement("tr");
        
        // let tdNombre = document.createElement("td");
        // tdNombre.innerText = oferta[i].postproducto.producto.nombre;
        // tdNombre.classList.add("px-6","py-4", "whitespace-nowrap");
        // let tdId = document.createElement("td");
        // tdId.innerText = oferta[i].id;
        // tdId.classList.add("px-6","py-4", "whitespace-nowrap");>

        let tdDescuento = document.createElement("td");
        tdDescuento.innerText = oferta[i].descuento;
        tdDescuento.classList.add("px-6","py-4", "whitespace-nowrap");

        let tdAcciones = document.createElement("td");
        tdAcciones.classList.add("px-6","py-4", "whitespace-nowrap");
        
        let botonEliminar = document.createElement("button");
        botonEliminar.innerHTML = "<span class='text-md material-icons text-white'>delete</span>";
        botonEliminar.classList.add("inline-flex","items-center","px-2" , "shadow-md","py-2" ,"bg-red-600" ,"border" ,"border-transparent" ,"rounded-md" ,"font-semibold", "text-xs" ,"text-white" ,"uppercase" ,"tracking-widest", "hover:shadow-lg" ,"hover:bg-red-400" ,"active:bg-red-900" ,"focus:outline-none" ,"focus:border-red-900" ,"focus:ring" ,"ring-red-300" ,"disabled:opacity-25" ,"transform" ,"hover:scale-105" ,"focus:scale-110" ,"transition" ,"ease-in-out" ,"duration-150");
        // botonEliminar.idoferta = oferta[i].id;
        // botonEliminar.nombreoferta = oferta[i].nombre;
        // botonEliminar.addEventListener("click",eliminarOferta);

        
        // tr.appendChild(tdNombre);
        // tr.appendChild(tdId);
        tr.appendChild(tdDescuento);
        tr.appendChild(tdAcciones);
        // tdAcciones.appendChild(botonEliminar);
        
        tbody.appendChild(tr);
        
    }

}


document.addEventListener("DOMContentLoaded" , async()=>{
    postproducto = await getPostProducto();
    cargarTabla(postproducto);
});