
function controlesIncp(){
    cargarInpc()
}

function agregarIncp(){
    document.getElementById("formIncp").reset()
}

async function generarInpc(){
    const formulariInpc = document.getElementById('formIncp')
    const datos = new FormData(formulariInpc)
 
    const jsonDatos = Object.fromEntries(datos.entries())
    const respuest = await ajax.post('/inpc',jsonDatos)

    if(respuest.status){
        cargarInpc()
        mensajeAlerta('Los datos se guardaron correctamente', 'success') 
        $('#modalNuevoInpc').modal('hide')
    }

}

async function cargarInpc(){

    const inpc = await ajax.get(`/inpc`)
    const incpArray = inpc.datos
    var htmlIncp = ''
    incpArray?.forEach(element => {
        htmlIncp +=  ` <tr><td class="text-center">${element.id}</td><td>${element.anio}</td>
        <td>${element.enero}</td>
        <td>${element.febrero}</td>
        <td>${element.marzo}</td>
        <td>${element.abril}</td>
        <td>${element.mayo}</td>
        <td>${element.junio}</td>
        <td>${element.julio}</td>
        <td>${element.agosto}</td>
        <td>${element.septiembre}</td>
        <td>${element.octubre}</td>
        <td>${element.noviembre}</td>
        <td>${element.diciembre}</td>
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

    document.getElementById('tbInpc').innerHTML = htmlIncp? htmlIncp: ''
}