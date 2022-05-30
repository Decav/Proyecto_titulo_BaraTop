//getnegocios
const getNegocio = async()=>{
    let respuesta = await axios.get("negocios/get");
    return respuesta.data;

};

//crearnegocios
const crearNegocios = async(negocio)=>{
    let respuesta = await axios.post("negocios/post", negocio, {
        headers: {
            'Content-Type': 'application/json'
        }
    });
    return respuesta.data;
};

const eliminarNegocio = async(patente)=>{
    let respuesta = await axios.delete(`negocios/delete/${patente}`,{patente},{
        headers:{
            'Content-Type': 'application/json'
        }
    }).catch(err => console.error(err))
    return respuesta.data == "ok";

}

