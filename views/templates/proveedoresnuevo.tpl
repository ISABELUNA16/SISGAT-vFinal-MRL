<!DOCTYPE html>
<html>
 
  <head>
    <title>SISGAT</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="32x32" href="views/images/logo.jpeg" alt="icono">
    <link rel="stylesheet" type="text/css" href="views/css/principal.css">
    <link rel="stylesheet" href="views/css/notify.css"> 
    <link rel="stylesheet" href="views/css/font-awesome.css"> 
 </head>

  <body class="w3-light-grey">

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
          <a href="?action=proveedores" class="w3-bar-item w3-button  w3-amber w3-padding w3-hover-blue"><i class="fa fa-truck w3-xlarge"></i> Proveedores</a>
          <a href="?action=productos" class="w3-bar-item w3-button w3-padding w3-hover-blue"><i class="fa fa-flask w3-xlarge"></i>  Productos</a>
          <a href="?action=clientes" class="w3-bar-item w3-button w3-padding w3-hover-blue"><i class="fa fa-users w3-xlarge"></i>  Clientes</a>
          <a href="?action=recetas" class="w3-bar-item w3-button w3-padding w3-hover-blue"><i class="fa fa-clipboard w3-xlarge"></i>  Recetas</a>
          <a href="?action=reportes" class="w3-bar-item w3-button w3-padding w3-hover-blue"><i class="fa fa-bar-chart w3-xlarge "></i>  Reportes</a>
          <a href="?action=mantenimientos" class="w3-bar-item w3-button w3-padding w3-hover-blue"><i class="fa fa-gears w3-xlarge"></i>  Mantenimiento</a>
          <a href="?action=cerrarsesion" class="w3-bar-item w3-button w3-padding w3-hover-blue"><i class="fa fa-power-off w3-xlarge"></i>  Salir del Sistema</a>
         <br><br>
        </div>
      </nav>

      <!-- Overlay effect when opening sidebar on small screens -->
      <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="sisgat_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

      <!-- CONTENIDO DE LA PAGINA-->
      <!--NUEVO PROVEEDOR -->

    <div class="w3-main" style="margin-left:300px;margin-top:43px;">
        <header class="w3-container" style="padding-top:50px">
        </header>

      <form class="w3-dark-grey w3-padding-32 w3-margin-bottom">
        <div class="w3-container">
          <h4>NUEVO <span class="w3-opacity w3-medium">Proveedor</span></h4>
          <div class="w3-row">
          <input type="text" name="razonsocial" id="razonsocial" class="w3-input w3-col m7" placeholder=" *Razón social " style="margin-right: 3px;" maxlength="20" autofocus>  
          <input type="number" name="ruc" id="ruc" class="w3-input w3-col m4" placeholder=" *RUC" maxlength="11">  
          </div>
          <br>        
          <div class="w3-row">
            <input type="text" name="descripcion" id="descripcion" class="w3-input w3-col m5" placeholder=" Descripción " style="margin-right: 3px;" maxlength="70">
            <input type="text" name="direccion" id="direccion" class="w3-input w3-col m6" placeholder=" Dirección" maxlength="150">
          </div>  
           <br>
          <div class="w3-row">  
            <input type="email" name="email" id="email" class="w3-input w3-col m5" placeholder=" Email" style="margin-right: 3px;" maxlength="50">      
            <input type="number" name="telefono" id="telefono" class="w3-input w3-col m2" placeholder="*Teléfono "> 
          </div>
            <h4><span class="w3-opacity w3-medium">(*) Campos Obligatorios</span></h4>
        </div> 
        <br>
          <button class="w3-button w3-blue" type="button" onclick="javascript:RegistrarNuevo();" style="margin-left: 15px;">Guardar <i class="fa fa-save"></i></button>
          
          <button class="w3-button w3-red"  type="button" onclick="location.href='?action=proveedores'" >Cancelar <i class="fa fa-exclamation-circle"></i></button>
      </form>
    </div>

     <script src="views/js/jquery-3.1.1.min.js"></script>
     <script src="views/js/proveedoresnuevo.js" type="text/javascript"></script>
     <script src="views/js/notify.js"></script>     
     <script type="text/javascript" src="views/js/opcionesmenu.js"></script>   

  </body> 
</html>