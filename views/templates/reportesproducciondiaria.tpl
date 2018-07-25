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
    <link href="views/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="views/css/dataTables.responsive.css" rel="stylesheet">
  </head>

  <body class="w3-light-grey" onload="javascript:MostrarRecetas();"> 
      <!--BOTON DEL MENU-->
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
            <a href="?action=productos" class="w3-bar-item w3-button  w3-padding w3-hover-blue"><i class="fa fa-flask w3-xlarge"></i>  Productos</a>
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
    
      <!--TABLA BOOTSTRAP -->
      <div class="w3-main" style="margin-left:280px;margin-top:30px;">
        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-default">
              <div class="panel-heading">
              <br>
                 <h4>REPORTES <span class="w3-opacity w3-medium"> PRODUCCION DIARIA </span></h4>
              </div> <br>
              
              <div class="w3-row">    
               <br>     
               <button class="w3-button w3-red" style="margin-bottom: 20px; margin-right: 5px; margin-left: 15px;" onclick="location.href='?action=reportes'">Salir <i class="fa fa-exclamation-circle"></i></button>
                <button class="w3-button w3-blue" style="margin-bottom: 20px;" onclick="" >Imprimir en Formato PDF  <i class="fa fa-print"></i></button>
              </div>
              <!--Table-->
              <div class="panel-body">
                <table id="tblistadorecetas" class="table table-striped table-bordered table-hover" style="color:grey; font-size:14px"  width="100%"> </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      

    <script type="text/javascript" src="views/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="views/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="views/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="views/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="views/js/dataTables.responsive.js"></script>
    <script type="text/javascript" src="views/js/opcionesmenu.js"></script>
    <script type="text/javascript" src="views/js/producciondiaria.js"></script>
    <script type="text/javascript" src="views/js/notify.js"></script>
     
  </body> 
</html>