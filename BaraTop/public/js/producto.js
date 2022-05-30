
const deleteProducto = async function(){
    let id = this.idProducto;
    let eliminarbtn = await Swal.fire({title:"Esta seguro de la operacion?",text:"Esta operacion no es reversible"
    , icon: "warning",showCancelButton:true});
    if(eliminarbtn.isConfirmed){
        Swal.fire("El producto a eliminar es: " + this.nombreProducto);
        if(await eliminarProducto(id)){
            let Producto = await getProducto();
            cargarTabla(Producto);
            Swal.fire("Producto eliminado", "Se elimino correctamente el producto", "info");
        }
    }else{
        Swal.fire("Cancelado", "La operacion fue cancelada", "info");
    }
    
}

const cargarTabla = (producto) =>{
    let tbody = document.querySelector("#tbody-producto");
    tbody.innerHTML = "";
    for(let i=0; i < producto.length; ++i){
        let tr = document.createElement("tr");
        
        let tdNombre = document.createElement("td");
        tdNombre.innerText = producto[i].nombre;
        tdNombre.classList.add("px-6","py-4", "whitespace-nowrap");

        let tdDescripcion = document.createElement("td");
        tdDescripcion.innerText = producto[i].descripcion;
        tdDescripcion.classList.add("px-6","py-4", "whitespace-nowrap");

        let tdMarca = document.createElement("td");
        tdMarca.innerText = producto[i].marca;
        tdMarca.classList.add("px-6","py-4", "whitespace-nowrap");

        let tdEtiquetas = document.createElement("td");
        tdEtiquetas.innerText = "";
        etiquetasArray = producto[i].etiquetas;
        if (etiquetasArray.length != 1){
            for(let j=0; j < etiquetasArray.length; ++j){
                tdEtiquetas.innerText += etiquetasArray[j].nombre + ", ";
                
            }
            let eti = tdEtiquetas.innerText.substring(0, tdEtiquetas.innerText.length - 2);
            tdEtiquetas.innerText = eti;
        }else{
            tdEtiquetas.innerText = producto[i].etiquetas[0].nombre;
        }
        
        tdEtiquetas.classList.add("px-6","py-4", "whitespace-nowrap");
        
        

        let tdAcciones = document.createElement("td");
        tdAcciones.classList.add("px-6","py-4", "whitespace-nowrap");
        
        let botonEliminar = document.createElement("button");
        botonEliminar.innerHTML = "<span class='text-md material-icons text-white'>delete</span>";
        botonEliminar.classList.add("inline-flex","items-center","px-2" , "shadow-md","py-2" ,"bg-red-600" ,"border" ,"border-transparent" ,"rounded-md" ,"font-semibold", "text-xs" ,"text-white" ,"uppercase" ,"tracking-widest", "hover:shadow-lg" ,"hover:bg-red-400" ,"active:bg-red-900" ,"focus:outline-none" ,"focus:border-red-900" ,"focus:ring" ,"ring-red-300" ,"disabled:opacity-25" ,"transform" ,"hover:scale-105" ,"focus:scale-110" ,"transition" ,"ease-in-out" ,"duration-150");
        botonEliminar.idProducto = producto[i].id;
        botonEliminar.nombreProducto = producto[i].nombre;
        botonEliminar.addEventListener("click", deleteProducto);

        
        tr.appendChild(tdNombre);
        tr.appendChild(tdDescripcion);
        tr.appendChild(tdMarca);
        tr.appendChild(tdEtiquetas);
        tr.appendChild(tdAcciones);
        tdAcciones.appendChild(botonEliminar);
        
        tbody.appendChild(tr);
        
    }

}

document.addEventListener("DOMContentLoaded" , async()=>{
    let producto = await getProducto();
    cargarTabla(producto);
});