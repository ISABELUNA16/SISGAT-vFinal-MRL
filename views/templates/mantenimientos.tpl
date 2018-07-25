<!DOCTYPE html>
<html>
  <head>
     <title>SISGAT</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="32x32" href="views/images/logo.jpeg" alt="icono">
    <link rel="stylesheet" type="text/css" href="views/css/principal.css">
    <link rel="stylesheet" href="views/css/font-awesome.css"> 
  </head>
  <body class="w3-light-grey">
      <!--Menu de Opciones-->
      <div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
        <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="sisgat_open();"><i class="fa fa-bars"></i>  Menu</button>
       <span class="w3-bar-item w3-right"><img src="views/images/logo.png" width="120px" height="40px"></span>
      </div>

      <!--MENU -->
      <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:270px;" id="mySidebar">
      <hr>
        <div class="w3-container">
          <span><strong> MENU DE OPCIONES</strong></span>
        </div>
        <hr>
        <div class="w3-bar-block">
          <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="sisgat_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Cerrar Menu</a>
          <a href="?action=principal" class="w3-bar-item w3-button w3-padding w3-hover-blue"><i class="fa fa-star w3-xlarge"></i>  Principal</a>
          <a href="?action=proveedores" class="w3-bar-item w3-button w3-padding w3-hover-blue"><i class="fa fa-truck w3-xlarge"></i> Proveedores</a>
          <a href="?action=productos" class="w3-bar-item w3-button w3-padding w3-hover-blue"><i class="fa fa-flask w3-xlarge"></i>  Productos</a>
          <a href="?action=clientes" class="w3-bar-item w3-button  w3-padding w3-hover-blue"><i class="fa fa-users w3-xlarge"></i>  Clientes</a>
          <a href="?action=recetas" class="w3-bar-item w3-button w3-padding w3-hover-blue"><i class="fa fa-clipboard w3-xlarge"></i>  Recetas</a>
          <a href="?action=reportes" class="w3-bar-item w3-button w3-padding w3-hover-blue"><i class="fa fa-bar-chart w3-xlarge "></i>  Reportes</a>
          <a href="?action=mantenimientos" class="w3-bar-item w3-button w3-amber w3-padding w3-hover-blue"><i class="fa fa-gears w3-xlarge"></i>  Mantenimiento</a>
          <a href="?action=cerrarsesion" class="w3-bar-item w3-button w3-padding w3-hover-blue"><i class="fa fa-power-off w3-xlarge"></i>  Salir del Sistema</a>
         <br><br>
        </div>
      </nav>
      <!-- Overlay effect when opening sidebar on small screens -->
      <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="sisgat_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

      <!-- CONTENIDO DE LA PAGINA-->
      <div class="w3-main" style="margin-left:300px;margin-top:43px;">
        <header class="w3-container" style="padding-top:22px">
        <h5><b><i class="fa fa-cubes"></i> PRIVILEGIOS DEL ADMINISTRADOR </b></h5><hr>
        </header>
        <div class="w3-row-padding w3-margin-bottom">
            <div class="w3-quarter">
              <div class="w3-container w3-pink w3-hover-dark-grey w3-padding-16">
                <div class="w3-left"><a href="?action=usuariosnuevo"><i class="fa fa-key w3-xxxlarge"></i></a>                  
                </div>
                <div class="w3-clear"></div>
                <h4>Nuevo Usuario</h4>
              </div>
            </div>
            <div class="w3-quarter">
              <div class="w3-container w3-amber w3-hover-dark-grey w3-padding-16">
                <div class="w3-left"><a href="?action=usuarioslistado"><i class="fa fa-files-o w3-xxxlarge"></i></a>                  
                </div>
                <div class="w3-clear"></div>
                <h4>Listado de Usuarios</h4>
              </div>
            </div>
        </div> 
        <div class="w3-row-padding w3-margin-bottom">
           <div class="w3-quarter">
                <div class="w3-container w3-purple w3-hover-dark-grey w3-padding-16">
                  <div class="w3-left"><a href="?action="><i class="fa fa-users w3-xxxlarge"></i></a></div>
                  <div class="w3-clear"></div>
                  <h4>Nuevo Empleado</h4>
                </div>
            </div>
            <div class="w3-quarter">
                <div class="w3-container w3-orange w3-hover-dark-grey w3-padding-16">
                  <div class="w3-left"><a href="?action=personal"><i class="fa fa-th-large w3-xxxlarge"></i></a></div>
                  <div class="w3-clear"></div>
                  <h4>Listado de Empleados</h4>
                </div>
            </div>
        </div>
      </div>
       <script type="text/javascript" src="views/js/opcionesmenu.js"></script>
  </body> 
</html>