
const URL = 'http://localhost:5005'
const ajax = {}

ajax.post = async (ruta,datos)=>{  
    return await fetch(`${URL}${ruta}`, {
        method: 'POST',
        body: JSON.stringify(datos),
        headers: {
            'Content-Type': 'application/json'
        }  
    }).then(r=>{return r.json() })
    .then(r=>{return r}) 
}

ajax.get = async (ruta)=>{  
    return await fetch(`${URL}${ruta}`, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }  
    }).then(r=>{return r.json() })
    .then(r=>{return r}) 
}

ajax.put = async (ruta,datos)=>{  
    return await fetch(`${URL}${ruta}`, {
        method: 'PUT',
        body: JSON.stringify(datos),
        headers: {
            'Content-Type': 'application/json'
        }  
    }).then(r=>{return r.json() })
    .then(r=>{return r}) 
}

ajax.files = async (ruta,datos)=>{  
    return await fetch(`${URL}${ruta}`, {
        method: 'POST',
        body: datos,
        headers: {
            'Content-Type': "multipart/form-data"
        }  
    }).then(r=>{return r.json() })
    .then(r=>{return r}) 
}