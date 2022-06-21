<!-- Sidebar -->
<div class="border-right bg-theme " id="sidebar-wrapper" > 
  <div class="sidebar-heading" style="display: none">
  </div>
  <div class="list-group list-group-flush  bg-theme ">
    <a  href="../home/" class="  bg-theme " style="width: 100%;padding: 0;margin: 0;" >
      <img style="width: 100%; height: 80px; padding: 0;margin: 0;"   src="../img/Logo.jpg" />
    </a>
    <a  id='userName' class=" list-group-item list-group-item-action bg-theme menu-pading menu-pading"></a> 
    <a id="m_inicio" href="../home/" class=" list-group-item list-group-item-action bg-theme menu-pading"><i class="fa fa-list-ul"></i> Inicio</a> 
    <a id="m_notificadores" href="../notificador/" class=" list-group-item list-group-item-action bg-theme menu-pading"><i class="fa fa-list-ul"></i> Notificador</a>  
    <a id="m_registro" href="../registro/" class=" list-group-item list-group-item-action bg-theme menu-pading"><i class="fa fa-list-ul"></i> Registro de Bases</a>  
    <a id="m_asignacion" href="../asignacion/" class=" list-group-item list-group-item-action bg-theme menu-pading"><i class="fa fa-list-ul"></i> Asignacion Contribuyentes</a>  
    

    <!-- CATALOGOS --> 
      <a  id="m_catalogos" href="#collapsCatalogos" role="button" class="  list-group-item list-group-item-action bg-theme   dropdown-toggle menu-pading" data-toggle="collapse" aria-haspopup="true" aria-expanded="false" ><i class="fa fa-list-ul"></i>     
        Catalogos
      </a> 

      <div class="collapse" id="collapsCatalogos">   
        <a id="m_ayuntamientos" href="../catalogos/ayuntamientos.php" class=" list-group-item list-group-item-action sm-bg-theme menu-pading"><i class="fa fa-list-ul"></i> Ayuntamientos</a>
      </div> 
    <!-- /CATALOGOS -->

    <!-- ADMINISTRACION --> 
      <a  id="m_administracion" href="#collapsAdmin" role="button" class="  list-group-item list-group-item-action  bg-theme  dropdown-toggle menu-pading" data-toggle="collapse" aria-haspopup="true" aria-expanded="false" ><i class="fa fa-list-ul"></i>     
        Administracion
      </a> 
      <div class="collapse" id="collapsAdmin" >  
        <a id="m_sucursales" href="../mantenimiento/sucursales.php" class=" list-group-item list-group-item-action sm-bg-theme menu-pading"><i class="fa fa-list-ul"></i> Sucursales</a>
        <a id="m_zonas" href="../mantenimiento/zonas.php" class=" list-group-item list-group-item-action sm-bg-theme menu-pading"><i class="fa fa-list-ul"></i> Zonas</a>
        <a id="m_tip" href="../mantenimiento/tip.php" class=" list-group-item list-group-item-action sm-bg-theme menu-pading"><i class="fa fa-list-ul"></i> TIP</a>
        <a id="m_inpc" href="../mantenimiento/inpc.php" class=" list-group-item list-group-item-action sm-bg-theme menu-pading"><i class="fa fa-list-ul"></i> INPC</a>
     </div> 
    <!-- /ADMINISTRACION -->

    <a href="#" onclick="cerrarSesion()" class="list-group-item list-group-item-action bg-theme h4"><i class="fas fa-times-circle "></i> Cerrar Sesión</a> 

  </div>
</div>
<!-- /#sidebar-wrapper