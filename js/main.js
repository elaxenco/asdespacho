const USUARIO_ID = leerCookie('id');
const ESTATUS    = leerCookie('estatus');
const ROL_ID     = leerCookie('rol_id');
const ROL        = leerCookie('rol');
const NOMBRE     = leerCookie('nombre');
const USUARIO    = leerCookie('usuario');
const SUCURSAL_ID= leerCookie('sucursal_id');
const SUCURSAL   = leerCookie('sucursal');
const NOTIFICACION_DESEMBOLSO = leerCookie('notificacion_desembolso');
const LINK_API_SRC  = '../apirest/src/';
const PAGINA_TITULO = "AsAplicaciones"
const TITTLE        = document.getElementById('paginaTittle')

document.getElementById('userName').innerHTML = `<i class="fa fa-user"></i> ${NOMBRE}`

if (TITTLE) {
    TITTLE.innerHTML = PAGINA_TITULO
}

//eliminamos cookies
function cerrarSesion() {
    document.cookie = `id=; max-age=10600; path=/`;
    document.cookie = `estatus=; max-age=10600; path=/`;
    document.cookie = `rol_id=; max-age=10600; path=/`;
    document.cookie = `rol=; max-age=10600; path=/`;
    document.cookie = `nombre=; max-age=10600; path=/`;
    document.cookie = `usuario=; max-age=10600; path=/`;
    document.cookie = `sucursal_id=; max-age=10600; path=/`;
    document.cookie = `sucursal=; max-age=10600; path=/`;
    document.cookie = `notificacion_desembolso=; max-age=10600; path=/`;
    validarEstatusUsuario()
}
// validamos que la sesion este iniciada sino lo direccionamos al login
function validarEstatusUsuario() {
    if (leerCookie('id') == null || leerCookie('id') == '') {
        window.location = "/";
    }

    const token = localStorage.getItem('token')
    if(!token){
        window.location = "/";
    }
}

/////////////////////////////////////////////////////////////////////////////// respuestas pagos//////////////////////////////
//respuesta de carteras por usuario
var resMenuPorRoles = function(data) {
    if (!data && data == null)
        return

    try{

        for (var i in data) {
            console.log(data[i].m_html_id)
            document.getElementById(`${data[i].m_html_id}`).classList.remove('menudisplay');
        }
    }catch(e){

        console.log(e)
    }
    

} 