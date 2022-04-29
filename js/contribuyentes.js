function controlContribuyentes(){
    cargarBases()
    cargarAyuntamientos()
    cargarNotificadores()
}

async function cargarNotificadores(){
    const notificadores = await ajax.get(`/notificadores`)
    const notificadoresArray = notificadores.datos
    var htmlNotificadoresSelect = '<option value=0>Seleccione una Notificadores</option>';
    notificadoresArray.forEach(element => {
        htmlNotificadoresSelect +=  `<option value='${element.id}'>${element.primer_nombre} ${element.appaterno}</option> ` 
    }) 
    document.getElementById('cboNotificadores').innerHTML = htmlNotificadoresSelect
}

async function cargarAyuntamientos(){
    const ayuntamientos = await ajax.get(`/catalagos/ayuntamiento`)
    const ayuntamientosArray = ayuntamientos.datos
    var htmlAyuntamientosSelect = '<option value=0>Seleccione una Ayuntamiento</option>';
    ayuntamientosArray.forEach(element => {
        htmlAyuntamientosSelect +=  `<option value='${element.id}'>${element.descripcion}</option> ` 
    }) 
    document.getElementById('cboAyuntamientos').innerHTML = htmlAyuntamientosSelect
}

async function cargarBases(){
    const base = await ajax.get(`/base`)
    const baseArray = base.datos
    var htmlBase = ''
    baseArray?.forEach(element => {
        htmlBase +=  ` <tr>
        <td class="text-center">${element.id}</td>
        <td>${element.descripcion}</td>
        <td>${element.usuario.primer_nombre} ${element.usuario.appaterno}</td>
        <td>${element.ayuntamiento.descripcion}</td>
        <td>${element.contribuyentes!=null ? element.contribuyentes : 0 }</td>
        <td>${element.anio_base}</td> 
        <td class="text-center">
            <div class="btn-group btn-group-sm mr-2" role="group" aria-label="First group">  
                <button  onclick='editarInpc(${element.id},"${element.anio}")'
                    type="button" class="btn  border border-secondary"
                      title="" data-toggle="modal" data-target="#modalIncpNuevo" >
                    <i class="fa fa-edit"></i>
                </button>
          </div>
        </td></tr>`
    }) 

    document.getElementById('tbContribuyentes').innerHTML = htmlBase? htmlBase: ''
}