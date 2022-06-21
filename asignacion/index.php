<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache"> 

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title id="paginaTittle"></title>

    <!-- Bootstrap core CSS -->
    <link href="../css/lib/toastr.min.css" rel="stylesheet"> 
    <link href="../css/lib/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../css/simple-sidebar.css" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


</head>

<body id="bodyHome"  onload="controlesAsignacion()">
    <div class="d-flex" id="wrapper">
        <?php   include('../menu/menu.php'); ?>
        <!-- Page Content -->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <button class="btn btn-outline-primary" id="menu-toggle" onclick="ocultarMenu()"> <i id="icono"
                        class="fas fa-angle-double-left"></i> </button>
                        <h4 class="ml-2 mt-2">Asignacion a notificador</h4>
                <!--Boton para ocultar Menu-->
            </nav>
            <div class="container-fluid ">
            <div class="accordion mt-1" id="accordionExample">
                    <div class="card">
                        <div class="card-header p-1" id="headingOne">
                            <div class="container d-flex justify-content-end">
                                <a href="" class="btn btn-light btn-block text-primary mb-0 collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false" aria-controls="collapse" onclick="mostrarFiltros()">
                                    <svg id="icoFiltro" class="svg-inline--fa fa-angle-double-up fa-w-10" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="angle-double-up" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M177 255.7l136 136c9.4 9.4 9.4 24.6 0 33.9l-22.6 22.6c-9.4 9.4-24.6 9.4-33.9 0L160 351.9l-96.4 96.4c-9.4 9.4-24.6 9.4-33.9 0L7 425.7c-9.4-9.4-9.4-24.6 0-33.9l136-136c9.4-9.5 24.6-9.5 34-.1zm-34-192L7 199.7c-9.4 9.4-9.4 24.6 0 33.9l22.6 22.6c9.4 9.4 24.6 9.4 33.9 0l96.4-96.4 96.4 96.4c9.4 9.4 24.6 9.4 33.9 0l22.6-22.6c9.4-9.4 9.4-24.6 0-33.9l-136-136c-9.2-9.4-24.4-9.4-33.8 0z"></path></svg><!-- <i id="icoFiltro" class="fa fa-angle-double-down "></i> --> Filtros
                                </a>
                            </div>
                        </div>

                        <div id="collapse" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                            <div class="card-body">
                                <div class="row">
                                    
                                    <div class="col-12 col-md-6">
                                        <label for="cboBases">Base</label>
                                        <select class="custom-select" id="cboBases">
                                            <option value="0">Seleccione una Base.</option> 
                                        </select>
                                    </div> 

                                    <div class="col-12 col-md-6">
                                        <label for="txtDireccion">Direccion</label>
                                        <input type="text" class="form-control" id="txtDireccion" placeholder="Direccion" >
                                    </div> 
                                </div>

                                <div class="container d-flex justify-content-end">
                                    <div class="row">
                                        <div class="col-12 mt-2 mb-2">
                                            <button onclick=" document.getElementById('cboBases').value = 0;document.getElementById('txtDireccion').value = '';" class="btn btn-outline-secondary mr-2">Limpiar</button>
                                            <button onclick="aplicarFiltros()" class="btn btn-success">Filtrar</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
           <div class="container-fluid ">
                <!-- <h3 class="mt-2">Lista de Clientes</h3>
                <hr> --> 

                <div class="card mt-2">
                    <div class="card-header bg-themes" id="headingOne"> 
                    <a    onclick="cargarNotificadores()"  class="btn btn-success float-right text-light" data-toggle="modal" data-target="#modalNotificadores">
                            <i class="fa fa-plus"></i> Asignar
                        </a>
                        <h4 class="mb-0 bg-themes">
                            Asignacion
                        </h4>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive-md">
                            <table class="table table-sm table-hover table-bordered table-striped small" id="tbAsignable">
                                <thead>
                                        <tr>
                                            <th class="text-center">Cve Catastral</th>
                                            <th class="text-center">Nombre</th>
                                            <th class="text-center">Dom Ubicacion</th>
                                            <th class="text-center">Dom Notificar</th>
                                            <th class="text-center">Sup Terreno</th>
                                            <th class="text-center">Sup Construc</th>
                                            <th class="text-center">Val Gravable</th>
                                            <th class="text-center">PS Dscto</th>
                                            <th class="text-center">Val Catastral</th>
                                            <th class="text-center">Val Terreno</th>
                                            <th class="text-center">Val Construccion</th>
                                            <th class="text-center">Notificador</th>
                                            <th class="text-center">
                                            <input type="checkbox" name="selectAll" value="selectAll" id="selectAll">    
                                            </th>
                                        </tr>
                                </thead>
                                <tbody id="tbContribuyentes">
                                    

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- /#page-content-wrapper --> 
    </div>
    <!-- /#wrapper -->  
    <?php   include('../modals/modalNotificadores.php'); ?> 
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../js/lib/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="../js/utileria.js"></script>
    <script type="text/javascript" src="../js/main.js"></script> 
    <script type="text/javascript" src="../js/lib/popper.min.js"></script>
    <script type="text/javascript" src="../js/lib/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/lib/toastr.min.js"></script>
    <script type="text/javascript" src="../js/lib/sweetalert.js"></script>
    <script type="text/javascript" src="../js/lib/fontawesome-free-5.13.1-all.js"></script>
    <script type="text/javascript" src="../js/fetch.js"></script>   
    <script type="text/javascript" src="../js/asignacion.js"></script> 

</body>

</html>