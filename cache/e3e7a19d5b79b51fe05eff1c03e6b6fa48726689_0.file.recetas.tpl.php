<?php
/* Smarty version 3.1.30, created on 2017-12-07 03:32:45
  from "C:\wamp\www\SISGAT\views\templates\recetas.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a28a84d8cf436_77032905',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e3e7a19d5b79b51fe05eff1c03e6b6fa48726689' => 
    array (
      0 => 'C:\\wamp\\www\\SISGAT\\views\\templates\\recetas.tpl',
      1 => 1512613964,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a28a84d8cf436_77032905 (Smarty_Internal_Template $_smarty_tpl) {
?>
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
          <a href="?action=recetas" class="w3-bar-item w3-button w3-amber w3-padding w3-hover-blue"><i class="fa fa-clipboard w3-xlarge"></i>  Recetas</a>
          <a href="?action=reportes" class="w3-bar-item w3-button w3-padding w3-hover-blue"><i class="fa fa-bar-chart w3-xlarge "></i>  Reportes</a>
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
        <h5><b><i class="fa fa-cubes"></i> MIS RECETAS </b></h5><hr>
        </header>
        <div class="w3-row-padding w3-margin-bottom">
             
              <div class="w3-quarter">
                <div class="w3-container w3-purple w3-hover-dark-grey w3-padding-16">
                  <div class="w3-left"><a href="?action=recetasnuevas"><i class="fa fa-pencil-square-o w3-xxxlarge"></i></a>                  
                  </div>
                  <div class="w3-clear"></div>
                  <h4>Nueva Receta</h4>
                </div>
              </div>
              <div class="w3-quarter">
                <div class="w3-container w3-orange w3-hover-dark-grey w3-padding-16">
                  <div class="w3-left"><a href="?action=recetaslistado"><i class="fa fa-table w3-xxxlarge"></i></a>                  
                  </div>
                  <div class="w3-clear"></div>
                  <h4>Listado de Recetas</h4>
                </div>
              </div>

        </div> 
      </div>

      <?php echo '<script'; ?>
 type="text/javascript" src="views/js/opcionesmenu.js"><?php echo '</script'; ?>
>
      
  </body> 
</html><?php }
}
