const rechazarNegocio = async function(){
    let patente = this.NCpatente;
    let id = this.idUsuario;
    let eliminarbtn = await Swal.fire({title:"Esta seguro de la operacion?",text:"El negocio sera rechazado de la plataforma"
    , icon: "warning",showCancelButton:true});
    if(eliminarbtn.isConfirmed){
        if(await eliminarNegocio(patente)){
            await setUsuarioCliente(id);
            let negocio = await getNegocio();
            let usuarios = await getUsuarios();
            cargarTabla(negocio, usuarios);
            Swal.fire("Negocio rechazado", "Se ha rechazado la solicitud", "info");
        }
    }else{
        Swal.fire("Cancelado", "La operacion fue cancelada", "info");
    }
    
}
const aceptarNegocio = async function(){
    let id = this.idUsuario;
    let aceptarbtn = await Swal.fire({title:"Esta seguro de la operacion?",text:"El negocio sera aceptado en la plataforma"
    , icon: "warning",showCancelButton:true});
    if(aceptarbtn.isConfirmed){
        if(await setUsuarioVendedor(id)){
            let negocio = await getNegocio();
            let usuarios = await getUsuarios();
            cargarTabla(negocio, usuarios);
            Swal.fire("Negocio aceptado", "Se ha aceptado la solicitud", "info");
        }
    }else{
        Swal.fire("Cancelado", "La operacion fue cancelada", "info");
    }
    
}
const cargarTabla = (negocio,usuarios) =>{
    let tbody = document.querySelector("#tbody-negocio");
    tbody.innerHTML = "";
    for(let i=0; i < negocio.length; ++i){
        let tr = document.createElement("tr");
        console.log(negocio[i]);
        let tdPatente = document.createElement("td");
        tdPatente.innerText = negocio[i].patente;
        tdPatente.classList.add("px-6","py-4", "whitespace-nowrap");

        let tdRut = document.createElement("td");
        tdRut.innerText = negocio[i].rut;
        tdRut.classList.add("px-6","py-4", "whitespace-nowrap");

        let tdNombre = document.createElement("td");
        tdNombre.innerText = negocio[i].nombre;
        tdNombre.classList.add("px-6","py-4", "whitespace-nowrap");

        let tdAcciones = document.createElement("td");
        tdAcciones.classList.add("px-6","py-4", "whitespace-nowrap");

        let id_usuario;
        let rol_usuario;
        for(let j = 0; j < usuarios.length; j++){
            if( negocio[i].rut == usuarios[j].rut){
                id_usuario = usuarios[j].id;
                rol_usuario = usuarios[j].role;
                break;
            }
            
        }
        let botonAceptar = document.createElement("button");
        botonAceptar.innerHTML = "<span class='text-md material-icons text-white'>done</span>";
        botonAceptar.classList.add("inline-flex","items-center","px-2" , "shadow-md","py-2" ,"bg-green-600" ,"border" ,"border-transparent" ,"rounded-md" ,"font-semibold", "text-xs" ,"text-white" ,"uppercase" ,"tracking-wrutest", "hover:shadow-lg" ,"hover:bg-green-400" ,"active:bg-green-900" ,"focus:outline-none" ,"focus:border-green-900" ,"focus:ring" ,"ring-green-300" ,"disabled:opacity-25" ,"transform" ,"hover:scale-105" ,"focus:scale-110" ,"transition" ,"ease-in-out" ,"duration-150");
        botonAceptar.idUsuario = id_usuario
        botonAceptar.addEventListener("click",aceptarNegocio);

        let botonEliminar = document.createElement("button");
        botonEliminar.innerHTML = "<span class='text-md material-icons text-white'>delete</span>";
        botonEliminar.classList.add("inline-flex","items-center","px-2", "ml-2" , "shadow-md","py-2" ,"bg-red-600" ,"border" ,"border-transparent" ,"rounded-md" ,"font-semibold", "text-xs" ,"text-white" ,"uppercase" ,"tracking-wrutest", "hover:shadow-lg" ,"hover:bg-red-400" ,"active:bg-red-900" ,"focus:outline-none" ,"focus:border-red-900" ,"focus:ring" ,"ring-red-300" ,"disabled:opacity-25" ,"transform" ,"hover:scale-105" ,"focus:scale-110" ,"transition" ,"ease-in-out" ,"duration-150");
        botonEliminar.NCpatente = negocio[i].patente;
        botonEliminar.idUsuario = id_usuario;
        botonEliminar.addEventListener("click",rechazarNegocio);
        

        tr.appendChild(tdPatente);
        tr.appendChild(tdRut);
        tr.appendChild(tdNombre);
        tr.appendChild(tdAcciones);

        if(rol_usuario != 1){
            tdAcciones.appendChild(botonAceptar);
        }
        
        tdAcciones.appendChild(botonEliminar);
        
        tbody.appendChild(tr);
        
    }

}


document.addEventListener("DOMContentLoaded" , async()=>{
    let negocio = await getNegocio();
    let usuarios = await getUsuarios();
    cargarTabla(negocio,usuarios);
});