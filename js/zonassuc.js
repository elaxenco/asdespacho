function controlesZonasSuc() {
    cargarZonas()
}

function controlesSuc() {
    cargarSucursalesMant()
    cargarZonasSelect()
}

function agregarZona(){
    document.getElementById('txtIdZona').value = 0
    document.getElementById('txtZona').value = ''
}

function agregarSucursal(){ 
    document.getElementById('txtIdSucursal').value = 0
    document.getElementById('txtSucursal').value = ''
}
async function cargarZonas() {

    const data = await ajax.get(`/zona`)  
    const zonas = data.datos
    var htmlZonas = ''

    zonas.forEach(element => {
        htmlZonas +=  ` <tr><td>${element.id}</td><td>${element.descripcion}</td><td>
            <div class="btn-group btn-group-sm mr-2" role="group" aria-label="First group"> 
                <button  onclick='editarZona(${element.id},"${element.descripcion}")'
                    type="button" class="btn  border border-secondary"
                        title="" data-toggle="modal" data-target="#modalNuevaZona" >
                    <i class="fa fa-edit"></i>
                </button>
            </div>
        </td></tr>`
    })

    document.getElementById('tbZonas').innerHTML = htmlZonas
    
}

async function cargarZonasSelect() {
    const zonas = await ajax.get(`/zona`)
    const zonasobj = zonas.datos
    var htmlZonasSelect = '<option value=0>Seleccione una Zona</option>';
    zonasobj.forEach(element => {
        htmlZonasSelect +=  `<option value='${element.id}'>${element.descripcion}</option> ` 
    }) 
    document.getElementById('cboZonas').innerHTML = htmlZonasSelect
}

async function cargarSucursalesMant() {
    const sucursales = await ajax.get(`/sucursal`)
    const sucursalesarray = sucursales.datos
    var htmlSuc = ''
    sucursalesarray.forEach(element => {
        htmlSuc +=  ` <tr><td class="text-center">${element.id}</td><td>${element.descripcion}</td><td>${element.zona.descripcion}</td>
        <td class="text-center">
            <div class="btn-group btn-group-sm mr-2" role="group" aria-label="First group"> 

                <button  onclick='editarSucursal(${element.id},"${element.descripcion}",${element.zona_id})'
                    type="button" class="btn  border border-secondary"
                      title="" data-toggle="modal" data-target="#modalSucursalesNueva" >
                    <i class="fa fa-edit"></i>
                </button>
          </div>
        </td></tr>`
    }) 

    document.getElementById('tbSucursales').innerHTML = htmlSuc;
    $('[data-toggle="tooltip"]').tooltip()
  
}

function editarZona(id, zona) {
    document.getElementById('txtIdZona').value = id;
    document.getElementById('txtZona').value = zona;
}

function editarSucursal(id, sucursal, zona_id) {
    document.getElementById('txtIdSucursal').value = id;
    document.getElementById('txtSucursal').value = sucursal;
    document.getElementById('cboZonas').value = zona_id;
}

async function guardarZona() {
    const zona_id = document.getElementById('txtIdZona').value
    const descripcion = document.getElementById('txtZona').value.toUpperCase()

    if (descripcion.length < 1) {
        mensajeAlerta('La zona que intenta ingresar no es valida', 'error')
        return;
    } else {

        if(zona_id<=0){
            const resp = await ajax.post('/zona',{descripcion})

            if(resp.status){
                mensajeAlerta('La zona se guardo correctamente', 'success')
                cargarZonas()
                $('#modalNuevaZona').modal('hide')
            } 

        }else{
            const resp = ajax.post('/zona',{descripcion})
            if(resp.status){
                mensajeAlerta('La zona se guardo correctamente', 'success')
                cargarZonas()
                $('#modalNuevaZona').modal('hide')
            } 
        }
        
    }
}

async function guardarSucursal() {
    var zona_id = document.getElementById('cboZonas').value
    var sucursal_id = document.getElementById('txtIdSucursal').value
    var descripcion = document.getElementById('txtSucursal').value.toUpperCase()

    if (zona_id <= 0) {
        mensajeAlerta('La zona seleccionada no es valida', 'error')
        return;
    } else {

        if (descripcion.length < 1) {
            mensajeAlerta('El nombre de la sucursal no es valido', 'erro')
            return;
        }
        let suc = ''
        if(sucursal_id<=0){
            suc = await ajax.post('/sucursal',{zona_id,descripcion})
        }else{

        } 
        if(suc.status){
            cargarSucursalesMant()
            $('#modalSucursalesNueva').modal('hide')
            mensajeAlerta('La sucursal se guardo correctamente', 'success')
        } 
    }
}

function primerCorte(sucursal_id, descripcion) {

    document.getElementById('txtIdSucursalPcorte').value = sucursal_id
    document.getElementById('txtSucursalPcorte').value = descripcion

    $('#modalPrimerCorte').modal('show')

}

function generarPrimerCorte() {
    let sucursal_id = document.getElementById('txtIdSucursalPcorte').value
    let txtFechaCorte = document.getElementById('txtFechaCorte').value

    fetchFunctionGet(`banco/cortes/primercorte/sucursal/${sucursal_id}/${USUARIO_ID}/${txtFechaCorte}`, (data) => {
        switch (data) {
            case 1:
                mensajeAlerta('Esta sucursal ya cuenta con el primer corte.', 'error')
                break;
            case 2:
                mensajeAlerta('El primer corte fue generado correctamente.', 'success')
                break;
        }
    });
}

//////////////////////////
//  SUCURSAL - MODELO   //
// Cargar modelos
function cargarModelos() {
    fetchFunctionGet(`mostrar/modelos`, (data) => {
        var html = '<option value="0">Seleccione una sucursal.</option>';
        for (var datos in data) {
            html += ` <option value="${data[datos].modelo_id}">${data[datos].modelo}</option> `;
        }
        document.getElementById('cboModelos').innerHTML = html;
    });
}
// Editar sucursal modelo
function asignarModelo(sucursal_id, descripcion, modelo_id) {
    document.getElementById('txtIdSucursalModelo').value = sucursal_id
    document.getElementById('txtSucursalModelo').value = descripcion
    document.getElementById('cboModelos').value = modelo_id
    $('#modalAsignarModelo').modal('show')
}
// Guardar sucursal modelo
function guardarSucursalModelo() {
    let sucursal_id = document.getElementById('txtIdSucursalModelo').value
    let modelo_id = document.getElementById('cboModelos').value

    fetchFunctionGet(`guardar/sucursal/modelo/${sucursal_id}/${modelo_id}`, (data) => {
        mensajeAlerta('El modelo se asigno correctamente.', 'success');
        $('#modalAsignarModelo').modal('hide');
        cargarSucursalesMant();
    });
}
//  /SUCURSAL - MODELO  //
//////////////////////////