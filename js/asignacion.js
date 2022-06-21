function controlesAsignacion(){
  cargarContribuyentes()
  cargarBases() 
}

async function cargarBases(){
    const ayuntamientos = await ajax.get(`/base`)
    const ayuntamientosArray = ayuntamientos.datos
    var htmlAyuntamientosSelect = '<option value=0>Seleccione una Base</option>';
    ayuntamientosArray.forEach(element => {
        htmlAyuntamientosSelect +=  `<option value='${element.id}'>${element.descripcion}</option> ` 
    }) 
    document.getElementById('cboBases').innerHTML = htmlAyuntamientosSelect
}

async function cargarContribuyentes(){  
    const base = await ajax.get(`/contribuyentes`)
    llenarTabla(base)
} 

async function llenarTabla(base){
    let htmlBase = ''
    base.datos.forEach(element => {
        htmlBase +=  `<tr>
            <td class="text-center">${element.clave_catastral}</td>
            <td>${element.nombre_contribuyente ? element.nombre_contribuyente : ''}</td>  
            <td>${element.domicilio_ubicacion ? element.domicilio_ubicacion : ''}</td>  
            <td>${element.domicilio_notificar ? element.domicilio_notificar : ''}</td> 
            <td>${element.superficie_terreno ? element.superficie_terreno : ''}</td>  
            <td>${element.superficie_construccion ? element.superficie_construccion : ''}</td>  
            <td>${element.valor_gravable ? element.valor_gravable : ''}</td>  
            <td>${element.principal_sin_dscto ? element.principal_sin_dscto : ''}</td>  
            <td>${element.valor_catastral ? element.valor_catastral : ''}</td>  
            <td>${element.valor_terreno ? element.valor_terreno : ''}</td>  
            <td>${element.valor_construccion ? element.valor_construccion : ''}</td>  
            <td>${element.usuario ? element.usuario.primer_nombre+' '+ element.usuario.appaterno: ''}</td>  
            <td scope="col" class="text-center"> 
                <input type="checkbox" name="${element.clave_catastral}" value="${element.clave_catastral}" id="${element.clave_catastral}">
            </td>
        </tr>`

        
     })
      document.getElementById("tbContribuyentes").innerHTML = htmlBase ? htmlBase :'' 
      $('#selectAll').change(function () {
        $('tbody tr td input[type="checkbox"]').prop('checked', $(this).prop('checked'));
    });
}

async function aplicarFiltros(){
    const baseId  = document.getElementById('cboBases').value  
    const dir = document.getElementById('txtDireccion').value  
    let direccion = ''
    if(dir.trim().length>0){
        direccion=dir
    }else{
        direccion='NODIRECCION'
    }

    const base = await ajax.get(`/contribuyentes/filtros/${baseId}/${direccion}`)
    llenarTabla(base) 

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

async function asignarNotificador(){
   const notificador_id =  document.getElementById('cboNotificadores').value

   if(notificador_id<=0){
    mensajeAlerta('El notificador no es valido.', 'error')
     
   }else{
    const clientes =  new Array()

    $('#tbAsignable tbody tr  input:checkbox').each(function() {
        if (this.checked) {
            // console.log(this.value)
            clientes.push(this.value)
        }
    }) 

    const notificadores = await ajax.post(`/contribuyentes/asignarnorificador`,{notificador_id,clientes})
    if(notificadores.codigo==200){
        mensajeAlerta('Se asignaron los clientes.', 'success')
        cargarContribuyentes()
    }else{
        mensajeAlerta('Ocurrio un error al intentar asignar los clientes.', 'error')
    }

    
    $('#modalNotificadores').modal('hide')
   }

    
     
  

}