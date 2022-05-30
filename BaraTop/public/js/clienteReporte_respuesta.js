document.querySelector("#btnNo").addEventListener("click",async() =>{
    //let estado = 0;
    let rID = window.location.href;
    rID = rID.charAt(rID.length-1);
    let reporte = {};
    reporte.id = parseInt(rID);
    reporte.estado = 0;
    console.log(reporte);
    let no_btn = await Swal.fire({title:"Se ha resuelto el problema?",text:"La respuesta seguira abierta"
    , icon: "warning",showCancelButton:true});
    if(no_btn.isConfirmed){
        await setEstado(reporte);
        Swal.fire("Reporte Actualizado", "La operacion fue completada con exito", "info");
    }else{
        Swal.fire("Cancelado", "La operacion fue cancelada", "info");
    }
    

});

document.querySelector("#btnSi").addEventListener("click",async() =>{
    let rID = window.location.href;
    rID = rID.charAt(rID.length-1);
    let reporte = {};
    reporte.id = parseInt(rID);
    reporte.estado = 2;
    console.log(reporte);
    let no_btn = await Swal.fire({title:"Se ha resuelto el problema?",text:"El reporte va a ser marcado como solucionado"
    , icon: "warning",showCancelButton:true});
    if(no_btn.isConfirmed){
        await setEstado(reporte);
        Swal.fire("Reporte Actualizado", "La operacion fue completada con exito", "info");
    }else{
        Swal.fire("Cancelado", "La operacion fue cancelada", "info");
    }
});