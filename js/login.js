const formularioLogin = document.getElementById('loginForm')

formularioLogin.addEventListener("submit",async  function(e) {
    e.preventDefault();
    const datos = new FormData(formularioLogin);
 
    const jsonDatos = Object.fromEntries(datos.entries())
    const respuest = await ajax.post('/login',jsonDatos)

    if(respuest.status){
        mensajeAlerta('Datos correctos.', 'success')
        crearCookies(respuest.data)
    }else{
        mensajeAlerta('El usuario o contraseña no son validos.', 'error')
    }
})

const crearCookies = (data)=>{
    document.cookie = `id=${data.id}; max-age=10600; path=/`
    document.cookie = `rol_id=${data.rol_id}; max-age=10600; path=/`
    document.cookie = `nombre=${data.primer_nombre} ${data.apmaterno}; max-age=10600; path=/`
    document.cookie = `usuario=${data.usuario}; max-age=10600; path=/`
    document.cookie = `sucursal_id=${data.sucursal_id}; max-age=10600; path=/`   
    window.location = "home/"
}