const url = '../img/docs/documentos/guardar_imagen.php' 
let GLOBAL_LAT = 0
let GLOBAL_LON = 0
async function cargarImagen(){
   
    const files = document.getElementById('documento').files   
    const solicitante_id = document.getElementById('id_d').value
    const nombredoc = document.getElementById('documento_d').value

    var docname = ''

    if( files.length == 0 ){ 
        mensajeAlerta('Favor de Seleccionar una documento valido', 'error') 
        return
    } 

    for (let i = 0; i < files.length; i++) {

        let file = files[i]; // Tomar el documento original

        var extension = '.'+file.type.split("/").pop(); // Obtener la extension del documento
        var tipo_ext = '';
        if(extension=='.pdf')tipo_ext='application/pdf'
        if(extension=='.png')tipo_ext='image/png'
        if(extension=='.jpg')tipo_ext='image/jpg'
        if(extension=='.jpeg')tipo_ext='image/jpeg'

        docname = solicitante_id+'_'+nombredoc+extension; //Crean el nuevo nombre

        // Crear un nuevo documento con el nombre nuevo //
        var filex = document.getElementById('documento');
        var blob = filex.files[0].slice(0, filex.files[0].size, tipo_ext)
        newFile = new File([blob], docname, {type: tipo_ext})
        // /Crear un nuevo documento con el nombre nuevo //
        
        file = newFile; //Reemplazar el documento original con el cdocumento del nombre nuevo
    }
    
    const formData = new FormData()                     // Crear un formData para enviar a PHP 
    formData.append('files[]', newFile)               // Agregar el documento al formData para enviar a PHP
    
    if( files[0].size<=1000000 ){   // VALIDAR QUE LA IMAGEN NO PESE MAS DE 1,000,000 bytes = 1 MB // 

        // REGISTRO EN CARPETA DE FOTOS //

    
      const r =  await fetch(url, {
            method: 'POST',
            body: formData,
        }).then(response => {
            return response
        })
        
        return {imagne:r ,extension,docname }
    }else{
        mensajeAlerta('El documento tiene un peso mayor a 1MB', 'error')  
        return false
        
    }
}

const guardarDocumento = async function(){ 
    //const file = document.getElementById('documento').files[0] 
    const contribuyente_id = document.getElementById('id_d').value
    const descripcion = document.getElementById('documento_d').value
     

    if(descripcion.trim()==''|| descripcion.length<=0){ 
        mensajeAlerta('Es necesario agregar un nombre para el documento', 'error') 
        return
    }
    const r = await cargarImagen() 

    const img =
    {
        estatus_id :5,
        capturista_id : USUARIO_ID,
        contribuyente_id : contribuyente_id,
        nombredocumento : r.docname,
        descripcion : descripcion,
        tipo : r.extension,
        geolocalizacion : GLOBAL_LAT+', '+GLOBAL_LON
    }

    const respuest = await ajax.post('/documento',img)
   

    if(respuest.codigo==200){

        if(r.tipo =='.pdf'){ 
            document.getElementById(`pdfCte`).setAttribute("src", r.docname)
            document.getElementById(`imgMagnifyCte`).classList.add('d-none')
            document.getElementById(`pdfCte`).classList.remove('d-none')
        }else{
            document.getElementById(`imgLargeCte`).setAttribute("style", `background: url('${ '../img/docs/documentos/' +r.docname}') no-repeat;`)
            document.getElementById(`imgSmallCte`).setAttribute("src", '../img/docs/documentos/' +r.docname)
            document.getElementById(`pdfCte`).classList.remove('d-none')
            document.getElementById(`pdfCte`).classList.add('d-none')
            document.getElementById(`imgMagnifyCte`).classList.remove('d-none')
        } 
    }
    else{
        mensajeAlerta('Ocurrio un error al guardar el documento intente nuevamente', 'error') 
    }
}

if (navigator.geolocation)
{
	// Código de la aplicación 
    
		navigator.geolocation.getCurrentPosition( function(objPosition)
		{
			GLOBAL_LON = objPosition.coords.longitude;
			GLOBAL_LAT = objPosition.coords.latitude;

			//console.log(GLOBAL_LAT,GLOBAL_LAT)
            controlesNotificador()

		}, function(objPositionError)
		{
			switch (objPositionError.code)
			{
				case objPositionError.PERMISSION_DENIED:
					console.log( "No se ha permitido el acceso a la posición del usuario.")
				break;
				case objPositionError.POSITION_UNAVAILABLE:
					console.log( "No se ha podido acceder a la información de su posición.")
				break;
				case objPositionError.TIMEOUT:
					console.log("El servicio ha tardado demasiado tiempo en responder.")
				break;
				default:
					console.log( "Error desconocido.")
			}
		}, {
			maximumAge: 75000,
			timeout: 15000
		}); 
}
else
{
	// No hay soporte para la geolocalización: podemos desistir o utilizar algún método alternativo
}