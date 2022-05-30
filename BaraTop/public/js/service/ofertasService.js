const eliminarOferta = async(id)=>{
    let respuesta = await axios.post("ofertas/delete",{id},{
        headers:{
            'Content-Type': 'application/json'
        }
    }).catch(err => console.error(err))
    return respuesta.data == "ok";

}

const getOfertas = async(patente)=>{
    let respuesta = await axios.get("ofertas/get", {patente});
    return respuesta.data;
};