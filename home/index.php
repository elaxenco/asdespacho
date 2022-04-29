<!DOCTYPE html>
<html lang="es">

<head> 
  <meta http-equiv="Expires" content="0">
  <meta http-equiv="Last-Modified" content="0">
  <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
  <meta http-equiv="Pragma" content="no-cache">
  <link rel="icon" type="image/png" href="../img/icon.png" />
   
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

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


</head>

<body id="bodyHome"> 
  <div class="d-flex" id="wrapper"> 
   <?php   include('../menu/menu.php'); ?> 
    <!-- Page Content -->
    <div id="page-content-wrapper">
    
      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom"> 
        <button class="btn btn-outline-primary" id="menu-toggle" onclick="ocultarMenu()"> <i id="icono" class="fas fa-angle-double-left"></i> </button> <!--Boton para ocultar Menu-->  
      </nav> 
      <div class="container-fluid text-center"  >
            <h1 class="mt-3">Bienvenido</h1>
            <!-- <h2 class="mt-2"><?php /*echo $_COOKIE ['nombre']*/?></h2> -->
            <h2 id='userNameHome' class="mt-2"></h2>
            <h2 class="mt-2"><?php echo date("Y-m-d")?></h2>
      </div>
    </div>
    <!-- /#page-content-wrapper --> 
  </div>
  <!-- /#wrapper --> 
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="../js/lib/jquery-3.2.1.js"></script>  
  <script type="text/javascript" src="../js/utileria.js"></script> 
  <script type="text/javascript" src="../js/main.js"></script>   
  <script type="text/javascript" src="../js/lib/popper.min.js"></script>  
  <script type="text/javascript" src="../js/lib/bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/lib/toastr.min.js"></script>
  <script type="text/javascript">document.getElementById('userNameHome').innerHTML = `${NOMBRE}`</script>

</body>

</html>
