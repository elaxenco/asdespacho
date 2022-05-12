function controlContribuyentes(){
    cargarBases()
    cargarAyuntamientos()
    cargarNotificadores()
}

async function guardarBaseContribuyentes(){

    const formularioBase = document.getElementById('formBase')
    const datos = new FormData(formularioBase);
 
    const jsonDatos = Object.fromEntries(datos.entries())
    jsonDatos.capturista_id = USUARIO_ID 
    const respuest = await ajax.post('/base',jsonDatos)

    if(respuest.status){
        cargarBases()
        mensajeAlerta('Los datos se guardaron correctamente', 'success') 
        $('#modalBaseContribuyentes').modal('hide')
    }

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
                <button  onclick='editarBase(${element.id},${element.anio_base},${element.ayuntamiento_id},${element.notificador_id},"${element.descripcion}")'
                    type="button" class="btn  border border-secondary"
                      title="" data-toggle="modal" data-target="#modalBaseContribuyentes" >
                    <i class="fa fa-edit"></i>
                </button>
                <button  onclick='modalExcel(${element.id},${element.anio_base},"${element.descripcion}")'
                    type="button" class="btn  border border-secondary"
                      title="" data-toggle="modal" data-target="#modalCargarBase" > 
                      <i class="fa fa-file-upload"></i>
                </button> 
                <button  onclick='modalExcelVer(${element.id},${element.anio_base},"${element.descripcion}")'
                    type="button" class="btn  border border-secondary"
                      title="" data-toggle="modal" data-target="#modalCargarBase" >  
                      <i class="fa fa-search"></i>
                </button>
          </div>
        </td></tr>`
    }) 

    document.getElementById('tbContribuyentes').innerHTML = htmlBase? htmlBase: ''
}

async function editarBase(id,anio,ayuntamiento_id,notificador_id,descripcion){
    document.getElementById('txtBaseId').value = id
    document.getElementById('txtAnio').value = anio
    document.getElementById('cboAyuntamientos').value = ayuntamiento_id
    document.getElementById('cboNotificadores').value = notificador_id
    document.getElementById('txtDescripconBase').value = descripcion
    $('#modalBaseContribuyentes').modal('show')
}

async function modalExcel(id,anio,descripcion){
    document.getElementById('txtBaseIdExcel').value = id
    document.getElementById('txtAnioExcel').value = anio
    document.getElementById('txtDescripconBaseExcel').value = descripcion
    document.getElementById('btnGuardarExcel').classList.remove('d-none')
    document.getElementById('inputExcel').classList.remove('d-none')
    document.getElementById('btnExcel').classList.remove('d-none')
} 

async function modalExcelVer(id,anio,descripcion){
    document.getElementById('txtBaseIdExcel').value = id
    document.getElementById('txtAnioExcel').value = anio
    document.getElementById('txtDescripconBaseExcel').value = descripcion
    
    document.getElementById('btnGuardarExcel').classList.add('d-none')
    document.getElementById('inputExcel').classList.add('d-none')
    document.getElementById('btnExcel').classList.add('d-none')
    const base = await ajax.get(`/contribuyentes/base/`+id)
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
        </tr>`

        
     })
      document.getElementById("tbExcel").innerHTML = htmlBase ? htmlBase :'' 
} 

/*document.getElementById('inputExcel').addEventListener("change", (event) => {
    selectedFile = event.target.files[0]
})*/

async function saveExcel(data){

  const id = document.getElementById('txtBaseIdExcel').value 
  const anio = document.getElementById('txtAnioExcel').value 
    console.log('se llevo')
    console.log(data)

    const respuest = await ajax.post('/guardarbase',{datos : data , base_id :id} )
    console.log(respuest)
        
}

async function verificarExcel(verificar){  
    const doct = document.getElementById('inputExcel').files[0]
    const id = document.getElementById('txtBaseIdExcel').value 
    const anio = document.getElementById('txtAnioExcel').value 
    if(doct){

        let fileReader = new FileReader()
        fileReader.readAsBinaryString(doct)
        fileReader.onload = (event)=>{
         let data = event.target.result;
         let workbook = XLSX.read(data,{type:"binary"})

         workbook.SheetNames.forEach(sheet => {
              let rowObject = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheet]);  

              for(let i=0 ; i<rowObject.length; i++){
                rowObject[i].anio_base = anio
                rowObject[i].base_id = id
                rowObject[i].capturista_id  = USUARIO_ID

                Object.keys(rowObject[i]).forEach((key) => {

                    var replacedKey = key.toLowerCase().trim().replace(' ', "_").replace(' ', "_").replace(' ', "_") 
                    if (key !== replacedKey) {
                        rowObject[i][replacedKey] = rowObject[i][key];
                       delete rowObject[i][key];
                    }
                 })
              }

              if(verificar==false){
                let htmlBase=''
                rowObject.forEach(element => {
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
                    </tr>`
        
                    
                 })
                  document.getElementById("tbExcel").innerHTML = htmlBase ? htmlBase :'' 
              }else{
                saveExcel(rowObject)
              }
              
             
         })
        }
       
    }

  //  const data =await ajax.files('/verificarexcel',formularioBase) 

}