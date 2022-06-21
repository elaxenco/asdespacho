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

<body id="bodyHome" >
    <div class="d-flex" id="wrapper">
        <?php   include('../menu/menu.php'); ?>
        <!-- Page Content -->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <button class="btn btn-outline-primary" id="menu-toggle" onclick="ocultarMenu()"> <i id="icono"
                        class="fas fa-angle-double-left"></i> </button>
                        <h4 class="ml-2 mt-2">Mis clientes</h4>
                <!--Boton para ocultar Menu-->
            </nav> 
           <div class="container-fluid ">
                <!-- <h3 class="mt-2">Lista de Clientes</h3>
                <hr> --> 

                <div class="card mt-2">
                    <div class="card-header bg-themes" id="headingOne">  
                        <h4 class="mb-0 bg-themes">
                            Clientes asignados
                        </h4>
                    </div>

                    <div   id='fecha'>sss</div>

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
                                            <th class="text-center">Acciones</th>
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
    <?php   include('../modals/modalDocumentos.php'); ?> 
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../js/lib/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="../js/utileria.js"></script>
    <script type="text/javascript" src="../js/main.js"></script> 
    <script type="text/javascript" src="../js/lib/popper.min.js"></script>
    <script type="text/javascript" src="../js/lib/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/lib/toastr.min.js"></script>
    <script type="text/javascript" src="../js/lib/sweetalert.js"></script>
    <script type="text/javascript" src="../js/lib/fontawesome-free-5.13.1-all.js"></script>
    <script type="text/javascript" src="../js/lib/moment.js"></script>
    <script type="text/javascript" src="../js/fetch.js"></script>   
    <script type="text/javascript" src="../js/notificador.js"></script> 
    <script type="text/javascript" src="../js/file.js"></script> 

</body>

</html>