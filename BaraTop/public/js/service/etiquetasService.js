//getetiquetas
const getEtiqueta = async()=>{
    let respuesta = await axios.get("etiquetas/get");
    
    return respuesta.data;
};

//crearetiquetas
const crearEtiquetas = async(etiqueta)=>{
    let respuesta = await axios.post("etiquetas/post", etiqueta, {
        headers: {
            'Content-Type': 'application/json'
        }
    });
    return respuesta.data;
};

//eliminaretiquetas
const eliminarEtiqueta = async(id)=>{

    let respuesta = await axios.post("etiquetas/delete",{id},{
        headers:{
            'Content-Type': 'application/json'
        }
    }).catch(err => console.error(err))
    return respuesta.data == "ok";

}