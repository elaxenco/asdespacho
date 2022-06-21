function controlesNotificador(){
    cargarContribuyentes() 
}

async function cargarContribuyentes(){  
    const base = await ajax.get(`/contribuyentes/notificador/`+USUARIO_ID)
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
            <td class="text-center">
            <div class="btn-group btn-group-sm mr-2" role="group" aria-label="First group">  
                <button  
                    type="button" class="btn  border border-secondary"
                      title="" data-toggle="modal" data-target="#modalNuevoTip" >
                      <i class="fa fa-print"></i>
                </button>
                <button   
                    type="button" class="btn  border border-secondary"
                    onclick='modalDocumentos(${element.id},"${element.clave_catastral}","${element.nombre_contribuyente}")'
                      title="" data-toggle="modal" data-target="#modalDocumentos" >
                      <i class="fa fa-camera"></i>
                </button> 
                <button   
                    type="button" class="btn  border border-secondary"
                    onclick='imagenes(${element.id},"${element.clave_catastral}","${element.nombre_contribuyente}")'
                      title="" data-toggle="modal" data-target="#modalImagenes" >
                      <i class="fa fa-images"></i>
                </button> 
          </div>
        </td>
        </tr>`

        
     })
      document.getElementById("tbContribuyentes").innerHTML = htmlBase ? htmlBase :'' 
    
}

async function modalDocumentos(id,catastral,deudor){
    document.getElementById('id_d').value=id
    document.getElementById('nombre_d').value=deudor.toUpperCase()
    document.getElementById('clave_catastral').value=catastral
}

async function imagenes(id,catastral,deudor){
    document.getElementById('id_d2').value=id
    document.getElementById('nombre_d2').value=deudor.toUpperCase()
    document.getElementById('clave_catastral2').value=catastral
    const base = await ajax.get(`/contribuyentes/documento/`+id)
    let htmlBase = ''
    base.data.forEach(element => {
        htmlBase +=  `<tr>
            <td class="text-center">${element.id}</td>
            <td>${element.nombredocumento}</td>  
            <td>${element.fecha_captura}</td>  
        
            <td class="text-center">
            <div class="btn-group btn-group-sm mr-2" role="group" aria-label="First group"> 
                <button   
                    type="button" class="btn  border border-secondary"
                    onclick='verDocumento(${element.id},"${element.nombredocumento}","${element.tipo}")'
                      title="" data-toggle="modal" data-target="#modalVerDocumentos" >
                      <i class="fa fa-search"></i>
                </button> 
                 
          </div>
        </td>
        </tr>`

        
     })
      document.getElementById("tbImagenes").innerHTML = htmlBase ? htmlBase :'' 
}

async function verDocumento(id,doc,tipo){

    if(tipo =='.pdf'){ 
        document.getElementById(`pdfCte2`).setAttribute("src", doc)
        document.getElementById(`imgMagnifyCte2`).classList.add('d-none')
        document.getElementById(`pdfCte2`).classList.remove('d-none')
    }else{
        document.getElementById(`imgLargeCte2`).setAttribute("style", `background: url('${ '../img/docs/documentos/' +doc}') no-repeat;`)
        document.getElementById(`imgSmallCte2`).setAttribute("src", '../img/docs/documentos/' +doc)
        document.getElementById(`pdfCte2`).classList.remove('d-none')
        document.getElementById(`pdfCte2`).classList.add('d-none')
        document.getElementById(`imgMagnifyCte2`).classList.remove('d-none')
    } 
} 
moment.locale('fr')
const fecha = moment().format('LL')

document.getElementById('fecha').innerHTML=fecha