
const URL = 'https://82a7-45-230-173-209.ngrok.io'
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