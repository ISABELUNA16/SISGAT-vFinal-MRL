<!DOCTYPE html>
<html>
  <head>
      <title>SISGAT</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="icon" type="image/png" sizes="32x32" href="views/images/logo.jpeg" alt="icono">
      <link rel="stylesheet" type="text/css" href="views/css/principal.css">
      <link rel="stylesheet" href="views/css/font-awesome.css"> 
      <link href="views/css/bootstrap.min.css" rel="stylesheet">
   
  </head>
  <body>

      <!--Menu de Opciones-->
      <div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
          <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="sisgat_open();">
          <i class="fa fa-bars"></i>  Menu</button>
          <span class="w3-bar-item w3-right"><img src="views/images/logo.png" width="120px" height="40px"></span>
      </div>
      <!--MENU -->
      <nav class="w3-sidebar w3-collapse w3-deep-blue w3-animate-left" style="z-index:3;width:270px;" id="mySidebar"><br>
      <!--BIENVENIDA-->
        <div class="w3-container">
          <br>
             <center> <i class="fa fa-user w3-xxxlarge"></i>
          <br>
            <span>Bienvenid@, <strong>Admin</strong></span><br></center>
        </div>
        <hr>
        <div class="w3-container">
            <center><span> <h5>MENU DE OPCIONES</h5></span></center>
        </div>
        <hr>
        <div class="w3-bar-block">
          <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-black w3-hover-grey" onclick="sisgat_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Cerrar Menu</a>
          <a href="?action=proveedores" class="w3-bar-item w3-button w3-padding w3-hover-deep-blue"><i class="fa fa-truck w3-xlarge"></i> Proveedores</a>
          <a href="?action=productos" class="w3-bar-item w3-button w3-padding w3-hover-deep-blue"><i class="fa fa-flask w3-xlarge"></i>  Productos</a>
          <a href="?action=clientes" class="w3-bar-item w3-button w3-padding w3-hover-deep-blue"><i class="fa fa-users w3-xlarge"></i>  Clientes</a>
          <a href="?action=recetas" class="w3-bar-item w3-button w3-padding w3-hover-deep-blue"><i class="fa fa-clipboard w3-xlarge"></i>  Recetas</a>
          <a href="?action=reportes" class="w3-bar-item w3-button w3-padding w3-hover-deep-blue"><i class="fa fa-bar-chart w3-xlarge "></i>  Reportes</a>
          <a href="?action=mantenimientos" class="w3-bar-item w3-button w3-padding w3-hover-deep-blue"><i class="fa fa-gears w3-xlarge"></i>  Mantenimiento</a>
          <a href="?action=cerrarsesion" class="w3-bar-item w3-button w3-padding w3-hover-deep-blue"><i class="fa fa-power-off w3-xlarge"></i>  Salir del Sistema</a>
         <br><br>
        </div>
      </nav>

      <!-- Overlay effect when opening sidebar on small screens -->
      <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="sisgat_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

      <!-- CONTENIDO DE LA PAGINA-->
      
      <div class="w3-main" style="margin-left:300px;margin-top:43px;">
        <header class="panel-heading " style="padding-top:30px; margin-left: 10px">
        </header>
        <div class="w3-fondo34" style="margin-left:100px; width: 100%; height:500px; float: center">
        </div>
      </div>
      <script type="text/javascript" src="views/js/opcionesmenu.js"></script>
  </body> 
</html>