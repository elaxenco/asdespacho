 document.addEventListener('DOMContentLoaded', function() {
     //inciamos los tooltips
     $('[data-toggle="tooltip"]').tooltip();
 })

let menuTo = localStorage.getItem('estatusMenu');
let iconMenu = document.getElementById("icono");
if(menuTo!=="0"){
    $("#wrapper").addClass('toggled') 
    iconMenu.classList.remove('fa-angle-double-left'); // Si tiene la clase la remueve
    iconMenu.classList.add('fa-angle-double-right'); // Agregar una calse nueva al elemento
}
else{
    $("#wrapper").removeClass('toggled')
    iconMenu.classList.remove('fa-angle-double-right');
    iconMenu.classList.add('fa-angle-double-left');
}

 //funcion para permitir solo numeros
 function soloNumeros(e) {
     let key = window.Event ? e.which : e.keyCode
     return ((key >= 48 && key <= 57) || (key == 8) || (key == 46))
 }
 //funcion para permitir solo letras
 function soloLetras(e) {
     let key = window.Event ? e.which : e.keyCode
     return ((key >= 65 && key <= 90) || (key == 32) || (key == 8) || (key >= 97 && key <= 122) || (key >= 192 && key <= 250))
 }
 //funcion para leer cookies
 function leerCookie(name) {

     var nameEQ = name + "=";
     var ca = document.cookie.split(';');

     for (var i = 0; i < ca.length; i++) {

         var c = ca[i];
         while (c.charAt(0) == ' ') c = c.substring(1, c.length);
         if (c.indexOf(nameEQ) == 0) {
             return decodeURIComponent(c.substring(nameEQ.length, c.length));
         }
     }
     return null;
 }


 //funcion para buscar codigos postales
 function buscarCodigoPostal(cp) {
     var datos;
     if (cp.length < 5) {
         mensajeAlerta('El codigo postal no es valido!!.', 'error');
         return;
     }
     return new Promise(function(resolve, reject) {
         fetchFunctionGet(`mantenimiento/codigopostal/${cp}`, (data) => {
             datos = data;
             resolve(datos)
         });
     });
 }

 //mesnaje de alerta dinamico 
 function mensajeAlerta(mensaje, tipo) {
     swal({
         title: mensaje,
         icon: tipo,
         buttons: {
             cancel: false,
             confirm: true,
         }
     })
 }

//mensaje de decision dinamico 
function mensajeDecision(titulo, texto) {
    return new Promise(function(resolve, reject) {
        swal({
            title: titulo,
            text: texto,
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willOk) => {
            if (willOk) { resolve(true); } 
            else        { resolve(false); }
        });
    });
}

// fecha actual dd/mm/aaaa
function fechaActualAMD() {
    //fecha completa
    let fecha_actual = new Date();
    //año
    let y = fecha_actual.getFullYear();
    //Mes
    let m = fecha_actual.getMonth() + 1;
    //Día
    let d = fecha_actual.getDate();
    //si la fecha es menor al dia 10 le agregamos 0
    if (m < 10)
     m = `0${m}`
     //si la fecha es menor al dia 10 le agregamos 0
    if (d < 10)
     d = `0${d}`
     //fecha generada   
    let fecha = `${y}-${m}-${d}`
    return fecha;
}

 // fecha actual
 function fechaActual() {
     //fecha completa
     let fecha_actual = new Date();
     //año
     let y = fecha_actual.getFullYear();
     //Mes
     let m = fecha_actual.getMonth() + 1;
     //Día
     let d = fecha_actual.getDate();
     //si la fecha es menor al dia 10 le agregamos 0
     if (m < 10)
         m = `0${m}`
         //si la fecha es menor al dia 10 le agregamos 0
     if (d < 10)
         d = `0${d}`
         //fecha generada   
     let fecha = `${y}/${m}/${d}`
     return fecha;
 }

 // hora actual
 function horaActual() {
     let hora_actual = new Date();
     let hh = hora_actual.getHours();
     let mm = hora_actual.getMinutes();
     let ss = hora_actual.getSeconds();
     if (hh < 10) hh = `0${hh}`;
     if (mm < 10) mm = `0${mm}`;
     if (ss < 10) ss = `0${ss}`;
     hora_actual = `${hh}:${mm}:${ss}`;
     return hora_actual;
 }

 function ocultarMenu() {

    let menu = localStorage.getItem('estatusMenu');
    let estado = 0

    if(!menu)
        menu=0

     
    if(menu==0){
        estado = 0
        localStorage.setItem('estatusMenu', 1);
    }
    else{
        localStorage.setItem('estatusMenu', 0);
        estado = 1
    }    
        

     document.getElementById("wrapper").classList.toggle('toggled'); // Activa la clase toggled al elemento wrapper(menu) para ocultarlo

     let icon = document.getElementById("icono");

     if (icon.classList.contains('fa-angle-double-left')) // classList para manipular las clases de un elemento, verifica si el elemento contiene la clase 
     {
         icon.classList.remove('fa-angle-double-left'); // Si tiene la clase la remueve
         icon.classList.add('fa-angle-double-right'); // Agregar una calse nueva al elemento
     } else {
         icon.classList.remove('fa-angle-double-right');
         icon.classList.add('fa-angle-double-left');
     }
 }
//carga de zonas
function cargarZonas(){
    fetchFunctionGet(`mantenimiento/zonas/`, (data) => {
        var htmlZonas = '<option value="0">Seleccione una zona.</option>';
            for (var datos in data) {
                htmlZonas += ` <option value="${data[datos].id}">${data[datos].descripcion}</option> `;
            }
        document.getElementById('cboZonas').innerHTML = htmlZonas;
    });
}
 //carga de sucursales
 function cargarSucursales(combo = 'cboSucursales') {
     fetchFunctionGet(`mantenimiento/sucursales/${USUARIO_ID}`, (data) => {
         var htmlSucursales = '<option value="0">Seleccione una sucursal.</option>';
         for (var datos in data) {
             htmlSucursales += ` <option value="${data[datos].sucursal_id}">${data[datos].sucursal}</option> `;
         }
         document.getElementById(combo).innerHTML = htmlSucursales;
     });
 }
// BUSCAR LAS CARTERAS QUE LE PERTENECEN A LA SUCURSAL SELECCIONADA //
function cargarCarteras(sucursal_id) {
    fetchFunctionGet(`reporte/colocado/carteras/${sucursal_id}`, (data) => {
        var htmlCarteras = '<option value="0">Seleccione una opcion</option>';
        for (var datos in data) {
            htmlCarteras += ` <option value="${data[datos].cartera_id}">${data[datos].cartera}</option> `;
        }
        document.getElementById('cboCarteras').innerHTML = htmlCarteras;
    });
}
 //carga de coordinadores
 function cargarCoordinadores() {
     fetchFunctionGet(`mantenimiento/coordinadores`, (data) => {
         var htmlCoordinadores = '<option value="0">Seleccione un coordinador.</option>';
         for (var datos in data) {
             htmlCoordinadores += ` <option value="${data[datos].coordinador_id}">${data[datos].coordinador}</option> `;
         }
         document.getElementById('cboCoordinadores').innerHTML = htmlCoordinadores;
     });
 }
 //carga de documentos
 function cargarDocumentos() {
     fetchFunctionGet(`distribuidoras/documentos/`, (data) => {
         var htmlDocumentos = '<option value="0">Seleccione un documento.</option>';
         for (var datos in data) {
             htmlDocumentos += ` <option value="${data[datos].documento_id}">${data[datos].documento}</option> `;
         }
         document.getElementById('cboDocumentos').innerHTML = htmlDocumentos;
     });
 }

 function number_format(amount, decimals) {

     amount += ''; // por si pasan un numero en vez de un string
     amount = parseFloat(amount.replace(/[^0-9-\.]/g, '')); // elimino cualquier cosa que no sea numero o punto

     decimals = decimals || 0; // por si la variable no fue fue pasada

     // si no es un numero o es igual a cero retorno el mismo cero
     if (isNaN(amount) || amount === 0)
         return parseFloat(0).toFixed(decimals);

     // si es mayor o menor que cero retorno el valor formateado como numero
     amount = '' + amount.toFixed(decimals);

     var amount_parts = amount.split('.'),
         regexp = /(\d+)(\d{3})/;

     while (regexp.test(amount_parts[0]))
         amount_parts[0] = amount_parts[0].replace(regexp, '$1' + ',' + '$2');

     return amount_parts.join('.');
 }

 function mostrarFiltros() {
     //document.getElementById("wrapper").classList.toggle('toggled'); // Activa la clase toggled al elemento wrapper(menu) para ocultarlo

     let icon = document.getElementById("icoFiltro");

     if (icon.classList.contains('fa-angle-double-down')) // classList para manipular las clases de un elemento, verifica si el elemento contiene la clase 
     {
         icon.classList.remove('fa-angle-double-down'); // Si tiene la clase la remueve
         icon.classList.add('fa-angle-double-up'); // Agregar una calse nueva al elemento
     } else {
         icon.classList.remove('fa-angle-double-up');
         icon.classList.add('fa-angle-double-down');
     }
 }

 function ExportExcel(tabla, nombre_excel = 'descarga') {
     let f_a = fechaActual().replace(/\//g, '');
     let h_a = horaActual().replace(/:/g, '');
     let fecha = f_a + '_' + h_a;

     $("#" + tabla).table2excel({
         filename: nombre_excel + ' ' + fecha + ".xls"
     });
 }


 //mesnaje de alerta dinamico 
 function guardarBeneficiario(flag) {
     let asegurado_id = document.getElementById('asegurado_id').value
     let nombre_benef = document.getElementById('nombre_beneficiario').value
     let app_benef = document.getElementById('apellido_paterno_benef').value
     let parentesco_benef = document.getElementById('parentesco_benef').value
     let pc_benef = document.getElementById('pc_benef').value


     var ben = new FormData(formBeneficiario);
     if (nombre_benef == '' || app_benef == '' || parentesco_benef == '' || pc_benef < 0) {
         mensajeAlerta('Es necesario ingresar un beneficiario correcto', 'error');
     } else {
         fetchFunctionForms(`beneficiarios/guardar/${USUARIO_ID}/${flag}`, ben, (data) => {

             if (data.respuesta == 2)
                 mensajeAlerta('El porcentaje sobrepasa al 100% ', 'error');
             else
                 mensajeAlerta('Los datos se registraron correctamente', 'success');

             reiniciarDatosBenef();
             cargarBeneficiarios(asegurado_id, flag)
         })
     }
 }

 function reiniciarDatosBenef() {
     document.getElementById('beneficiario_id').value = '0'
     document.getElementById('nombre_beneficiario').value = ''
     document.getElementById('apellido_paterno_benef').value = ''
     document.getElementById('apellido_materno_benef').value = ''
     document.getElementById('fecha_nacimiento_benef').value = ''
     document.getElementById('parentesco_benef').value = ''
     document.getElementById('num_telefono_benef').value = ''
     document.getElementById('pc_benef').value = ''
 }


 function cargarBeneficiarios(asegurado_id, flag) {

     fetchFunctionGet(`beneficiarios/${asegurado_id}/${flag}`, (data) => {
         var htmltbenef = '';
         for (var i in data) {
             htmltbenef += `<tr >
                        <td >${data[i].id}</td>
                        <td >${data[i].nom_completo}</td>
                        <td >${data[i].parentesco}</td>
                        <td >${data[i].num_telefono}</td>
                        <td >${data[i].estatus}</td> 
                        <td >${data[i].pc}%</td> 
                        <td class="text-center" >
                            <div class="btn-group btn-group-sm mr-2" role="group" aria-label="First group">
                                <button  ${data[i].estatus_id=='ACTIVO' ? 'disabled' : ''}  onclick="editarBenef(${data[i].id},'${data[i].nombre}','${data[i].apellido_paterno}','${data[i].apellido_materno}','${data[i].fecha_nacimiento}'
                                                      ,'${data[i].parentesco}','${data[i].num_telefono}',${data[i].pc})" type="button" class="btn  border border-secondary"
                                    data-toggle="tooltip" title="" data-original-title="Actualizar"><i
                                        class="fa fa-edit"></i></button>
                                <button onclick="cambiarEstatusBeneficiario(${data[i].id},5,${flag},${asegurado_id})" type="button" class="  btn  border border-secondary"
                                    data-toggle="tooltip" title="" data-original-title="Habilitar"
                                      ${data[i].estatus_id==5 ? 'disabled' : ''}><i class="fa fa-check"></i></button>
                                <button  onclick="cambiarEstatusBeneficiario(${data[i].id},6,${flag},${asegurado_id})"" ${data[i].estatus_id==6 ? 'disabled' : ''} type="button" class="btn  border border-secondary"
                                    data-toggle="tooltip" title="" data-original-title="Deshabilitar"><i
                                        class="fa fa-times"></i></button>
                            </div>
                        </td>
                    </tr>`;
         }
         document.getElementById('tbBeneficiarios').innerHTML = htmltbenef;
     });
 }

 function editarBenef(id, nombre, apellido_paterno, apellido_materno, fecha_nacimiento, parentesco, num_telefono,pc) {

     document.getElementById('beneficiario_id').value = id
     document.getElementById('nombre_beneficiario').value = nombre
     document.getElementById('apellido_paterno_benef').value = apellido_paterno
     document.getElementById('apellido_materno_benef').value = apellido_materno
     document.getElementById('fecha_nacimiento_benef').value = fecha_nacimiento
     document.getElementById('parentesco_benef').value = parentesco
     document.getElementById('num_telefono_benef').value = num_telefono
     document.getElementById('pc_benef').value = pc
 }

 function cambiarEstatusBeneficiario(beneficiario_id, estatus_id, flag, asegurado_id) {

     fetchFunctionGet(`beneficiarios/estatus/${beneficiario_id}/${estatus_id}/${flag}`, () => {
         mensajeAlerta('El cambio se realizo correctamente.', 'success')
         cargarBeneficiarios(asegurado_id, flag)
     })
 }

// Cargando //
function btnCargarOut(btn){
    document.getElementById(btn).removeAttribute("disabled");
    document.getElementById('iconNoLoadImg').classList.remove('d-none');
    document.getElementById('iconLoadImg').classList.add('d-none');
}
function btnCargarIn(btn){
    document.getElementById(btn).setAttribute("disabled", "");
    document.getElementById('iconNoLoadImg').classList.add('d-none');
    document.getElementById('iconLoadImg').classList.remove('d-none');
}

//carga de roles
function cargarRoles(combo) {
    fetchFunctionGet(`mantenimiento/roles/`, (data) => {
        var html = '<option value="0">Seleccione un rol.</option>';
        for (var datos in data) {
            html += ` <option value="${data[datos].rol_id}">${data[datos].rol}</option> `;
        }
        document.getElementById(combo).innerHTML = html;
    });
}
//carga de horarios
function cargarHorarios(combo) {
    fetchFunctionGet(`catalogos/horarios/`, (data) => {
        var html = '<option value="0">Seleccione una sucursal.</option>';
        for (var datos in data) {
            html += ` <option value="${data[datos].id}">${data[datos].descripcion}</option> `;
        }
        document.getElementById(combo).innerHTML = html;
    });
}
// CARGAR LOS BANCOS GENERAL //
function cargarBancosGen() { 
    return new Promise(function(resolve, reject) { 
        fetchFunctionGet(`mantenimiento/bancos/`, (data) => {
            resolve(data)
        });
    });
}
