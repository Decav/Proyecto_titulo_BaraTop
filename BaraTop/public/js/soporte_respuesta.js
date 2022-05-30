

const deleteReporte = async function(){
    let id = this.idReporte;
    let eliminarbtn = await Swal.fire({title:"Esta seguro de la operacion?",text:"Esta operacion no es reversible"
    , icon: "warning",showCancelButton:true});
    if(eliminarbtn.isConfirmed){
        if(await eliminarReporte(id)){
            let Reporte = await getReporte();
            cargarTabla(Reporte);
            Swal.fire("Reporte eliminado", "Se elimino correctamente el reporte", "info");
        }
    }else{
        Swal.fire("Cancelado", "La operacion fue cancelada", "info");
    }
    
}

const cargarTabla = (reporte) =>{
    let tbody = document.querySelector("#tbody-soporteADM");
    tbody.innerHTML = "";
    for(let i=0; i < reporte.length; ++i){
        let tr = document.createElement("tr");

        let tdRut = document.createElement("td");
        tdRut.innerText = reporte[i].rut;
        tdRut.classList.add("px-6","py-4", "whitespace-nowrap");

        let tdAsunto = document.createElement("td");
        tdAsunto.innerText = reporte[i].asunto;
        tdAsunto.classList.add("px-6","py-4", "whitespace-nowrap");

        let tdTexto = document.createElement("td");
        tdTexto.innerText = reporte[i].texto;
        tdTexto.classList.add("px-6","py-4", "whitespace-nowrap");

        let tdTipo = document.createElement("td");
        tdTipo.innerText = reporte[i].tipo;
        tdTipo.classList.add("px-6","py-4", "whitespace-nowrap");

        
        switch(tdTipo.innerText){
            case "0":
                tdTipo.innerText = "Reclamo";
                break;
            case "1":
                tdTipo.innerText = "Sugerencia";
                break;
            case "2":
                tdTipo.innerText = "Error";
                break;
            default:
                break;
        }

        let tdFecha = document.createElement("td");
        let fecha = reporte[i].created_at.substr(0,10).split('-');
        tdFecha.innerText = fecha[2]+'/'+fecha[1]+'/'+fecha[0];
        tdFecha.classList.add("px-6","py-4", "whitespace-nowrap");


        let tdEstado = document.createElement("td");
        tdEstado.innerText = reporte[i].estado;
        tdEstado.classList.add("px-6","py-4", "whitespace-nowrap");

        
        switch(tdEstado.innerText){
            case "0":
                tdEstado.innerText = "Abierto";
                break;
            case "1":
                tdEstado.innerText = "Respondido";
                break;
            case "2":
                tdEstado.innerText = "Solucionado";
                break;
            default:
                break;
        }
        
        let tdAcciones = document.createElement("td");
        tdAcciones.classList.add("px-6","py-4", "whitespace-nowrap");

        
        let botonRevisar = document.createElement("button");
        botonRevisar.innerHTML = "<span class='text-md material-icons text-white'>visibility</span>";
        botonRevisar.classList.add("inline-flex","items-center","px-2" , "shadow-md","py-2" ,"bg-blue-600" ,"border" ,"border-transparent" ,"rounded-md" ,"font-semibold", "text-xs" ,"text-white" ,"uppercase" ,"tracking-wrutest", "hover:shadow-lg" ,"hover:bg-blue-400" ,"active:bg-blue-900" ,"focus:outline-none" ,"focus:border-blue-900" ,"focus:ring" ,"ring-blue-300" ,"disabled:opacity-25" ,"transform" ,"hover:scale-105" ,"focus:scale-110" ,"transition" ,"ease-in-out" ,"duration-150");
        botonRevisar.addEventListener("click", ()=>{
            window.location = "/admin/reporte/"+reporte[i].id;
        });

        let botonEliminar = document.createElement("button");
        botonEliminar.innerHTML = "<span class='text-md material-icons text-white'>delete</span>";
        botonEliminar.classList.add("inline-flex","items-center","px-2", "ml-2" , "shadow-md","py-2" ,"bg-red-600" ,"border" ,"border-transparent" ,"rounded-md" ,"font-semibold", "text-xs" ,"text-white" ,"uppercase" ,"tracking-wrutest", "hover:shadow-lg" ,"hover:bg-red-400" ,"active:bg-red-900" ,"focus:outline-none" ,"focus:border-red-900" ,"focus:ring" ,"ring-red-300" ,"disabled:opacity-25" ,"transform" ,"hover:scale-105" ,"focus:scale-110" ,"transition" ,"ease-in-out" ,"duration-150");
        botonEliminar.idReporte = reporte[i].id;
        botonEliminar.addEventListener("click",deleteReporte);
        

        tr.appendChild(tdRut);
        tr.appendChild(tdAsunto);
        tr.appendChild(tdTipo);
        tr.appendChild(tdFecha);
        tr.appendChild(tdEstado);

        
        tr.appendChild(tdAcciones);
        if(tdEstado.innerText != "Solucionado"){
            tdAcciones.appendChild(botonRevisar);
        }
        tdAcciones.appendChild(botonEliminar);
        
        tbody.appendChild(tr);
        
    }

}

document.addEventListener("DOMContentLoaded" , async()=>{
    let reporte = await getReporte();
    cargarTabla(reporte);
});