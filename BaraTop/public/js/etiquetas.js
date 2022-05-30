

const deleteEtiqueta = async function(){
    let id = this.idEtiqueta;
    let eliminarbtn = await Swal.fire({title:"Esta seguro de la operacion?",text:"Esta operacion no es reversible"
    , icon: "warning",showCancelButton:true});
    if(eliminarbtn.isConfirmed){
        Swal.fire("La etiqueta a eliminar es: " + this.nombreEtiqueta);
        if(await eliminarEtiqueta(id)){
            let Etiqueta = await getEtiqueta();
            cargarTabla(Etiqueta);
            Swal.fire("Etiqueta eliminada", "Se elimino correctamente la etiqueta", "info");
        }
    }else{
        Swal.fire("Cancelado", "La operacion fue cancelada", "info");
    }
    
}

const cargarTabla = (etiqueta) =>{
    let tbody = document.querySelector("#tbody-etiqueta");
    tbody.innerHTML = "";
    for(let i=0; i < etiqueta.length; ++i){
        let tr = document.createElement("tr");

        let tdId = document.createElement("td");
        tdId.innerText = (i+1);
        tdId.classList.add("px-6","py-4", "whitespace-nowrap");
        let tdNombre = document.createElement("td");
        tdNombre.innerText = etiqueta[i].nombre;
        tdNombre.classList.add("px-6","py-4", "whitespace-nowrap");

        let tdAcciones = document.createElement("td");
        tdAcciones.classList.add("px-6","py-4", "whitespace-nowrap");
        
        let botonEliminar = document.createElement("button");
        botonEliminar.innerHTML = "<span class='text-md material-icons text-white'>delete</span>";
        botonEliminar.classList.add("inline-flex","items-center","px-2" , "shadow-md","py-2" ,"bg-red-600" ,"border" ,"border-transparent" ,"rounded-md" ,"font-semibold", "text-xs" ,"text-white" ,"uppercase" ,"tracking-widest", "hover:shadow-lg" ,"hover:bg-red-400" ,"active:bg-red-900" ,"focus:outline-none" ,"focus:border-red-900" ,"focus:ring" ,"ring-red-300" ,"disabled:opacity-25" ,"transform" ,"hover:scale-105" ,"focus:scale-110" ,"transition" ,"ease-in-out" ,"duration-150");
        botonEliminar.idEtiqueta = etiqueta[i].id;
        botonEliminar.nombreEtiqueta = etiqueta[i].nombre;
        botonEliminar.addEventListener("click",deleteEtiqueta);

        tr.appendChild(tdId);
        tr.appendChild(tdNombre);
        tr.appendChild(tdAcciones);
        tdAcciones.appendChild(botonEliminar);
        
        tbody.appendChild(tr);
        
    }

}



document.addEventListener("DOMContentLoaded" , async()=>{
    let etiqueta = await getEtiqueta();
    cargarTabla(etiqueta);
});