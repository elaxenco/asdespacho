const arregloDetTip = []

function controlesTip(){
    cargarTip()
}

function agregarTip(){
    document.getElementById("formTip").reset()
}

async function cargarTip(){

    const tip = await ajax.get(`/tip`)
    const tipArray = tip.datos
    var htmlTip = ''
    tipArray?.forEach(element => {
        htmlTip +=  ` <tr><td class="text-center">${element.id}</td><td>${element.anio}</td>
        <td>${element.fecha_publicacion}</td>
        <td>${element.num_periodos}</td>
        <td>${element.articulo}</td>
        <td>${element.decreto}</td>
        <td>${element.porc_incremento}</td>
        <td>${element.vigencia_apartir}</td>
        <td>${element.rango}</td>
        <td class="text-center">
            <div class="btn-group btn-group-sm mr-2" role="group" aria-label="First group">  
                <button  onclick='editarInpc(${element.id},"${element.anio}")'
                    type="button" class="btn  border border-secondary"
                      title="" data-toggle="modal" data-target="#modalNuevoTip" >
                    <i class="fa fa-edit"></i>
                </button>
                <button  onclick='detalleTip(${element.id},"${element.anio}")'
                    type="button" class="btn  border border-secondary"
                      title="" data-toggle="modal" data-target="#AgregarDetalle" >
                      <i class="fa fa-align-center"></i>
                </button>
                <button  onclick='tablaTip(${element.id},"${element.anio}")'
                    type="button" class="btn  border border-secondary"
                      title="" data-toggle="modal" data-target="#VerDetalle" >
                      <i class="fa fa-align-justify"></i>
                </button>
          </div>
        </td></tr>`
    }) 

    document.getElementById('tbTip').innerHTML = htmlTip? htmlTip: ''
}

async function generarTip(){
    const formulariInpc = document.getElementById('formTip')
    const datos = new FormData(formulariInpc)
 
    const jsonDatos = Object.fromEntries(datos.entries())
    jsonDatos.capturista_id  = USUARIO_ID
    const respuest = await ajax.post('/tip',jsonDatos)

    if(respuest.status){
        cargarTip()
        mensajeAlerta('Los datos se guardaron correctamente', 'success') 
        $('#modalNuevoTip').modal('hide')
    }

}

async function detalleTip(id,anio){
    document.getElementById("txtLimInf").focus()
    document.getElementById('txtIdTipDet').value = id
    document.getElementById('txtAnioTipDet').value = anio
}

async function agregarTarifa(){

    if(arregloDetTip.length<11){
        const formulariInpc = document.getElementById('formTipDet')
        const datos = new FormData(formulariInpc) 
        const jsonDatos = Object.fromEntries(datos.entries())
        jsonDatos.capturista_id = USUARIO_ID 
        jsonDatos.tip_id =  document.getElementById('txtIdTipDet').value 
        jsonDatos.num_rango = arregloDetTip.length+1 
        arregloDetTip.push(jsonDatos)
        refrescarInfo()
    }
    
}

async function excluirElemento(num_rango){

    console.log('excluir',num_rango)
    console.log(arregloDetTip)
    const newArray = arregloDetTip.filter(f=>f.num_rango!=num_rango) 
    arregloDetTip.splice(0, arregloDetTip.length)
    console.log(newArray)
    newArray.forEach(e=>arregloDetTip.push(e))
    refrescarInfo()
}

async function refrescarInfo(){
    let htmlTipDetAdd = ''
    let i = 1
    arregloDetTip.forEach(element=>{ 
        htmlTipDetAdd +=  ` <tr>
        <td class="text-center">${element.id}</td>
        <td class="text-center">${element.anio}</td>
        <td class="text-center">${element.num_rango}</td>
        <td class="text-center">${element.limite_inferior}</td> 
        <td class="text-center">${element.limite_superior}</td>
        <td class="text-center">${element.cuota_fija_construccion}</td>
        <td class="text-center">${element.tasa_limite_inferior_construccion}</td>
        <td class="text-center">${element.cuota_fija_sconstruccion}</td>
        <td class="text-center">${element.tasa_limite_inferior_sconstruccion}</td> 
        <td class="text-center">
            <div class="btn-group btn-group-sm mr-2  ${Number(arregloDetTip.length) == i  ? '' : 'menudisplay' }  " role="group" aria-label="First group">  
                <button  onclick='excluirElemento(${element.num_rango})'
                    type="button" class="btn  border border-secondary"
                      title="" data-toggle="modal"   >
                    <i class="fa fa-backspace"  ></i>
                </button>
          </div>
        </td></tr>`

        i++

        console.log(i,arregloDetTip.length)
    })

    document.getElementById('tbTipDetAdd').innerHTML = htmlTipDetAdd? htmlTipDetAdd: ''

    document.getElementById('txtLimInf').value = ''
    document.getElementById('txtLimSup').value = ''
    document.getElementById('txtCFC').value = ''
    document.getElementById('txtTC').value = ''
    document.getElementById('txtCFSC').value = ''
    document.getElementById('txtTSC').value = ''
    document.getElementById("txtLimInf").focus()
}

async function guardarTarifa(){
     
    const datos = { registros : arregloDetTip ,capturista_id : USUARIO_ID}

    if(arregloDetTip.length==11){
        const respuest = await ajax.post('/tipdetalle',datos)

        if(respuest.status){ 
            mensajeAlerta('Los datos se guardaron correctamente', 'success') 
            $('#AgregarDetalle').modal('hide')
        }
    }else{
        mensajeAlerta('La tabla aun no a sido capturada correctamente.', 'error') 
    }
    
}

async function tablaTip(tip_id,anio){

    document.getElementById('txtIdTipDetT').value = tip_id
    document.getElementById('txtAnioTipDetT').value = anio


const tip = await ajax.get(`/tipdetalle/`+tip_id)
    const tipArray = tip.datos
    var tbTipDet = ''
    tipArray?.forEach(element => {
        tbTipDet +=   ` <tr> 
        <td class="text-center">${element.num_rango}</td>
        <td class="text-center">${element.limite_inferior}</td> 
        <td class="text-center">${element.limite_superior}</td>
        <td class="text-center">${element.cuota_fija_construccion}</td>
        <td class="text-center">${element.tasa_limite_inferior_construccion}</td>
        <td class="text-center">${element.cuota_fija_sconstruccion}</td>
        <td class="text-center">${element.tasa_limite_inferior_sconstruccion}</td> 
        </tr>`
    }) 

    document.getElementById('tbTipDet').innerHTML = tbTipDet? tbTipDet: ''
}

 