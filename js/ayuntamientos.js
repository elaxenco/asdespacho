function controlAyuntamientos(){

    cargarAyuntamientos()
    cargarZonasSelect() 
}

function agregarAyuntamiento(){
    $("#cboZonas").val(0)
    $("#cboSucursales").val(0)
    $("#txAyuntamiento").val('')
    $("#txtIdAyuntamiento").val(0)
    $("#txDomicilio").val('')
    
}

async function guardarAyuntamiento() {
 
    const zona_id = document.getElementById('cboZonas').value
    const sucursal_id = document.getElementById('cboSucursales').value
    const descripcion = document.getElementById('txAyuntamiento').value.toUpperCase()
    const domicilio = document.getElementById('txDomicilio').value.toUpperCase() 
    const ayuntamiento_id = document.getElementById('txtIdAyuntamiento').value
    const capturista_id = USUARIO_ID 

    if (zona_id <= 0 || sucursal_id<=0) {
        mensajeAlerta('La zona o sucursal seleccionada no es valida', 'error')
        return
    } else {

        if (descripcion.length < 1) {
            mensajeAlerta('El nombre de la sucursal no es valido', 'error')
            return;
        }
        let ayuntamiento = ''
        if(ayuntamiento_id<=0){
            ayuntamiento = await ajax.post('/catalagos/ayuntamiento',{sucursal_id,descripcion,capturista_id,domicilio})
        }else{

        } 
        if(ayuntamiento.status){
            cargarAyuntamientos()
            $('#modalAyuntamientos').modal('hide')
            mensajeAlerta('El ayuntamiento se guardo correctamente', 'success')
        } 
    }
}

async function cargarZonasSelect() {
    const zonas = await ajax.get(`/zona`)
    const zonasobj = zonas.datos
    var htmlZonasSelect = '<option value=0>Seleccione una Zona</option>';
    zonasobj.forEach(element => {
        htmlZonasSelect +=  `<option value='${element.id}'>${element.descripcion}</option> ` 
    }) 
    document.getElementById('cboAyuntamientos').innerHTML = htmlZonasSelect
}

async function cargarSucursalesSelect(zona_id) {
    const sucursales = await ajax.get(`/sucursal/zona/`+zona_id)
    const sucursalesobj = sucursales.datos
    var htmlSucSelect = '<option value=0>Seleccione una Sucursal</option>';
    sucursalesobj.forEach(element => {
        htmlSucSelect +=  `<option value='${element.id}'>${element.descripcion}</option> ` 
    }) 
    document.getElementById('cboSucursales').innerHTML = htmlSucSelect
}

async function cargarAyuntamientos() {
    const ayuntamientos = await ajax.get(`/catalagos/ayuntamiento`)
    const ayuntamientosArray = ayuntamientos.datos
    var htmlAyu = ''
    ayuntamientosArray.forEach(element => {
        htmlAyu +=  ` <tr><td class="text-center">${element.id}</td><td>${element.descripcion}</td><td>${element.domicilio}</td><td>${element.sucursale.descripcion}</td>
        <td class="text-center">
            <div class="btn-group btn-group-sm mr-2" role="group" aria-label="First group"> 

                <button  onclick='editarAyuntamiento(${element.id},"${element.descripcion}",${element.sucursale.zona_id},${element.sucursale.id},"${element.domicilio}")'
                    type="button" class="btn  border border-secondary"
                      title="" data-toggle="modal" data-target="#modalAyuntamientos" >
                    <i class="fa fa-edit"></i>
                </button>
                
                <button  onclick='editarAyuntamiento(${element.id},"${element.descripcion}",${element.sucursale.zona_id},${element.sucursale.id},"${element.domicilio}")'
                    type="button" class="btn  border border-secondary"
                      title="" data-toggle="modal" data-target="#modalAyuntamientos" >
                    <i class="fa fa-edit"></i>
                </button>
          </div>
        </td></tr>`
    }) 

    document.getElementById('tbAyuntamientos').innerHTML = htmlAyu;
    $('[data-toggle="tooltip"]').tooltip()
  
}

async function editarAyuntamiento(id,ayuntamiento,zona_id,sucursal_id,domicilio){
    await cargarSucursalesSelect(zona_id) 
    $("#cboZonas").val(zona_id)
    $("#cboSucursales").val(sucursal_id)
    $("#txAyuntamiento").val(ayuntamiento)
    $("#txtIdAyuntamiento").val(id)
    $("#txDomicilio").val(domicilio)
}