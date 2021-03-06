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
          <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-black w3-hover-grey" onclick="sisgat_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Cerrar Menu</a>
         <a href="?action=principal" class="w3-bar-item w3-button w3-padding w3-hover-blue"><i class="fa fa-star w3-xlarge"></i>  Principal</a>
          <a href="?action=proveedores" class="w3-bar-item w3-button w3-padding w3-hover-blue"><i class="fa fa-truck w3-xlarge"></i> Proveedores</a>
          <a href="?action=productos" class="w3-bar-item w3-button w3-padding w3-hover-blue"><i class="fa fa-flask w3-xlarge"></i>  Productos</a>
          <a href="?action=clientes" class="w3-bar-item w3-button w3-padding w3-hover-blue"><i class="fa fa-users w3-xlarge"></i>  Clientes</a>
          <a href="?action=recetas" class="w3-bar-item w3-button w3-padding w3-hover-blue"><i class="fa fa-clipboard w3-xlarge"></i>  Recetas</a>
          <a href="?action=reportes" class="w3-bar-item w3-button w3-amber w3-padding w3-hover-blue"><i class="fa fa-bar-chart w3-xlarge "></i>  Reportes</a>
          <a href="?action=mantenimientos" class="w3-bar-item w3-button w3-padding w3-hover-blue"><i class="fa fa-gears w3-xlarge"></i>  Mantenimiento</a>
          <a href="?action=cerrarsesion" class="w3-bar-item w3-button w3-padding w3-hover-blue"><i class="fa fa-power-off w3-xlarge"></i>  Salir del Sistema</a>
         <br><br>
        </div>
      </nav>

      <!-- Overlay effect when opening sidebar on small screens -->
      <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="sisgat_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

      <!-- CONTENIDO DE LA PAGINA-->
      <div class="w3-main" style="margin-left:300px;margin-top:43px;">
        <header class="w3-container" style="padding-top:22px">
        <h5><b><i class="fa fa-cubes"></i> REPORTES GENERALES </b></h5>
        <hr>
        </header>
        <div class="w3-row-padding w3-margin-bottom">
             
              <div class="w3-quarter">
                <div class="w3-container w3-red w3-hover-dark-grey w3-padding-16">
                  <div class="w3-left"><a href="?action=reportesproducciondiaria"><i class="fa fa-bar-chart w3-xxxlarge"></i></a>     
                  </div>
                  <div class="w3-clear"></div>
                  <h4>Producción diaria</h4>
                </div>
              </div>
               <!--<div class="w3-quarter">
                  <div class="w3-container w3-red w3-hover-dark-grey
                   w3-padding-16">
                    <div class="w3-left"><i class="fa fa-filter w3-xxxlarge"></i></div>
                    <div class="w3-clear"></div>
                      <h4>Producción por Cliente</h4>
                  </div>
                </div>
                 <div class="w3-quarter">
                  <div class="w3-container w3-teal w3-hover-dark-grey
                   w3-padding-16">
                    <div class="w3-left"><i class="fa fa-th w3-xxxlarge"></i></div>
                    <div class="w3-clear"></div>
                      <h4>Producción por Color</h4>
                  </div>
                </div>
                 <div class="w3-quarter">
                  <div class="w3-container w3-purple w3-hover-dark-grey w3-padding-16">
                    <div class="w3-left"><i class="fa fa-sitemap w3-xxxlarge"></i></div>
                    <div class="w3-clear"></div>
                    <h4>Producción por Máquina</h4>
                    </div>
                </div>-->
        </div> 
      </div>
    <script type="text/javascript" src="views/js/opcionesmenu.js"></script>
  </body> 
</html>