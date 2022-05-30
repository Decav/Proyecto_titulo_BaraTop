//crearProductos
const crearProductos = async(producto)=>{
    let respuesta = await axios.post("productos/post", producto, {
        headers: {
            'Content-Type': 'application/json'
        }
    });
    return respuesta.data;
};

//getProducto
const getProducto = async()=>{
    let respuesta = await axios.get("productos/get");
    return respuesta.data;

};

//eliminarproductos
const eliminarProducto = async(id)=>{
    let respuesta = await axios.post("productos/delete",{id},{
        headers:{
            'Content-Type': 'application/json'
        }
    }).catch(err => console.error(err))
    return respuesta.data == "ok";

}