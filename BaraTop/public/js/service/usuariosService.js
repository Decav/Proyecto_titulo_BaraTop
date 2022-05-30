const getUsuarios = async()=>{
    let respuesta = await axios.get("usuarios/get");
    return respuesta.data;
};

const banUsuario = async(id)=>{
    let respuesta = await axios.put(`usuarios/ban/${id}`, id, {
        headers: {
            'Content-Type': 'application/json'
        }
    });
    return respuesta.data;
};

const desbanUsuario = async(id)=>{
    let respuesta = await axios.put(`usuarios/desban/${id}`, id, {
        headers: {
            'Content-Type': 'application/json'
        }
    });
    return respuesta.data;
};

const setUsuarioCliente = async(id)=>{
    let respuesta = await axios.put(`usuarios/cliente/${id}`, id, {
        headers: {
            'Content-Type': 'application/json'
        }
    });
    return respuesta.data;
};

const setUsuarioVendedor = async(id)=>{
    let respuesta = await axios.put(`usuarios/vendedor/${id}`, id, {
        headers: {
            'Content-Type': 'application/json'
        }
    });
    return respuesta.data;
};
