<?php
/* Smarty version 3.1.30, created on 2017-12-19 02:27:06
  from "C:\wamp\www\SISGAT\views\templates\productosnuevo.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a386aeaa8fbe6_71723388',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '37e6f0bcca56c44f85a57464e40a7620baca2231' => 
    array (
      0 => 'C:\\wamp\\www\\SISGAT\\views\\templates\\productosnuevo.tpl',
      1 => 1512615994,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a386aeaa8fbe6_71723388 (Smarty_Internal_Template $_smarty_tpl) {
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
    <link rel="stylesheet" href="views/css/notify.css">

  </head>
  
  <body class="w3-light-grey" onload="javascript:cargarCombox();">
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
          <a href="?action=productos" class="w3-bar-item w3-button w3-amber w3-padding w3-hover-blue"><i class="fa fa-flask w3-xlarge"></i>  Productos</a>
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
    
    <!--NUEVO PRODUCTO-->
    <div class="w3-main" style="margin-left:300px;margin-top:43px;">
        <header class="w3-container" style="padding-top:50px">
        </header>
      <form  method="POST" class="w3-dark-grey w3-padding-32 w3-margin-bottom">
        <div class="w3-container">
              <h4>NUEVO <span class="w3-opacity w3-medium">Producto</span></h4>
              <div  class="w3-row" id="codigo"> </div>
              <br>
              <div class="w3-row">
                  <input type="text" name="producto" id="producto" class="w3-input w3-col m6" placeholder=" *Nombre del producto"  style="margin-right:3px;text-transform:lowercase " onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="150" autofocus />
                  <select class="w3-select w3-col m5" name="cboProveedor" style="" id="cboProveedores"></select> 
                  <div id="datos"></div>
              </div>
              <br>
              <div class="w3-row">
                  <select class="w3-select w3-col m2" name="cboTipoProducto" id="opcionesTipoProducto"></select>  
                  <select class="w3-select w3-col m2" name="cboTipoColorante" style="margin-right:3px;" id="cboTipoColorante"></select>
                  <input type="number" name="stock" id="stock" class="w3-input w3-col m3" placeholder="*Stock " maxlength="10" style="margin-right: 3px;">
                  <select class="w3-select w3-col m2" name="cboUnidades" style="margin-right:3px;" id="cboUnidades"></select> 
                  <input type="number" name="costounitario" id="costounitario" class="w3-input w3-col m2" placeholder="*Costo Unitario"  maxlength="10" style="margin-right:3px;">
              </div>
              <br>
              <h4><span class="w3-opacity w3-medium">(*) Campos Obligatorios</span></h4>
        </div> 
        <br>
        <button class="w3-button w3-green" type="button" id="generated" onclick="javascript:GenerarCodigo();" style="margin-left: 18px;">Generar Código <i class="fa fa-cogs"></i></button>
        <button class="w3-button w3-blue" type="button" id="save" onclick="javascript:GuardarProducto();">Guardar <i class="fa fa-save"></i></button>
        <button class="w3-button w3-red"  type="button" onclick="location.href='?action=productos'">Cancelar <i class="fa fa-exclamation-circle"></i></button>
      </form>
    </div>

      <?php echo '<script'; ?>
 type="text/javascript" src="views/js/productosnuevo.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 type="text/javascript" src="views/js/jquery-3.1.1.min.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 type="text/javascript" src="views/js/notify.js"><?php echo '</script'; ?>
> 
      <?php echo '<script'; ?>
 type="text/javascript" src="views/js/opcionesmenu.js"><?php echo '</script'; ?>
>  


  </body> 
</html><?php }
}
