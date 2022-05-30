//crearPostProductos
const crearPostProductos = async(postproductos)=>{
    let respuesta = await axios.post("postproductos/post", postproductos, {
        headers: {
            'Content-Type': 'application/json'
        }
    });
    return respuesta.data;
};