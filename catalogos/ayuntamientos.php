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

<body id="bodyHome" onload="controlAyuntamientos()">
    <div class="d-flex" id="wrapper">
        <?php   include('../menu/menu.php'); ?>
        <!-- Page Content -->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <button class="btn btn-outline-primary" id="menu-toggle" onclick="ocultarMenu()"> <i id="icono"
                        class="fas fa-angle-double-left"></i> </button>
                        <h4 class="ml-2 mt-2">Ayuntamientos</h4>
                <!--Boton para ocultar Menu-->
            </nav>
            <div class="container-fluid ">
                <!-- <h3 class="mt-2">Lista de Clientes</h3>
                <hr> --> 

                <div class="card mt-2">
                    <div class="card-header bg-themes" id="headingOne">
                        <a  onclick="agregarAyuntamiento()"  class="btn btn-success float-right text-light" data-toggle="modal" data-target="#modalAyuntamientos">
                            <i class="fa fa-plus"></i> Nuevo Ayuntamiento
                        </a>
                        <h4 class="mb-0 bg-themes">
                            Ayuntamientos
                        </h4>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive-md">
                            <table class="table table-sm table-hover table-bordered table-striped small">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">ID</th>
                                        <th scope="col" class="text-center">Descripcion</th> 
                                        <th scope="col" class="text-center">Domicilio</th> 
                                        <th scope="col" class="text-center">Sucursal</th> 
                                        <th scope="col" class="text-center">Acciones</th> 
                                    </tr>
                                </thead>
                                <tbody id="tbAyuntamientos">
                                    

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
    <?php   include('../modals/modalAyuntamientos.php'); ?> 
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../js/lib/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="../js/utileria.js"></script>
    <script type="text/javascript" src="../js/main.js"></script> 
    <script type="text/javascript" src="../js/lib/popper.min.js"></script>
    <script type="text/javascript" src="../js/lib/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/lib/toastr.min.js"></script>
    <script type="text/javascript" src="../js/lib/sweetalert.js"></script>
    <script type="text/javascript" src="../js/fetch.js"></script> 
    <script type="text/javascript" src="../js/ayuntamientos.js"></script> 

</body>

</html>