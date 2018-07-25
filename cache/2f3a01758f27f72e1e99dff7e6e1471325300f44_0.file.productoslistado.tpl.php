<?php
/* Smarty version 3.1.30, created on 2017-12-19 02:56:11
  from "C:\wamp\www\SISGAT\views\templates\productoslistado.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a3871bbb5cd36_58359684',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2f3a01758f27f72e1e99dff7e6e1471325300f44' => 
    array (
      0 => 'C:\\wamp\\www\\SISGAT\\views\\templates\\productoslistado.tpl',
      1 => 1512615980,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a3871bbb5cd36_58359684 (Smarty_Internal_Template $_smarty_tpl) {
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
    <link href="views/css/bootstrap.min.css" rel="stylesheet">
    <link href="views/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="views/css/dataTables.responsive.css" rel="stylesheet">
  </head>

  <body class="w3-light-grey" onload="javascript:MostrarProductos();"> 
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
    
      <!--TABLA BOOTSTRAP -->
           
      <div class="w3-main" style="margin-left:280px;margin-top:30px;">
        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-default">
              <div class="panel-heading">
              <br>
                 <h4>LISTADO <span class="w3-opacity w3-medium"> PRODUCTOS </span></h4>
              </div> <br>
              
              <div class="w3-row">    
               <br>     
               <button class="w3-button w3-red" style="margin-bottom: 20px; margin-right: 5px; margin-left: 15px;" onclick="location.href='?action=productos'">Salir <i class="fa fa-exclamation-circle"></i></button>
                <button class="w3-button w3-blue" style="margin-bottom: 20px;" onclick="javascript:Imprimir('productos');" >Imprimir en Formato PDF  <i class="fa fa-print"></i></button>
              </div>
              <!--Table-->
              <div class="panel-body">
                <table id="tblistadoproductos" class="table table-striped table-bordered table-hover" style="color:grey; font-size:14px"  width="100%"> </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      
       <!--FORMULARIOS MODALES -->
      <!--EDITAR-->
     <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header"> 
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">EDITAR PRODUCTO</h4>
              </div>
              <div class="modal-body" id="datosCargados">
              </div>
              <div class="modal-footer ">
                    <button type="button" class="btn btn-lg w3-green" onclick="javascript: actualizarDatos();" style="width: 100%;"><span class=""></span>Actualizar Datos</button>
              </div>
            </div>
          </div>
     </div>
    <!--ELIMINAR-->
      <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true"></span></button>
              <h4 class="modal-title custom_align" id="Heading">ELIMINAR PRODUCTO</h4>
            </div>
            <div class="modal-body">
              <div class="alert alert-danger"><span class=""></span> Está seguro que desea eliminar este Registro ?? </div>
            </div>
            <div class="modal-footer" id="opcionesEliminar">
            </div>
          </div>
        </div>
      </div>


      <!--<div id="productos" name="productos" class="print Impresion">
              <p><img src="views/images/logo.png" width="100px;" height="50px;" /> </p>
              <div class="titulo"><center><b>LISTADO DE PRODUCTOS</b></center></div>
              <br>
              <br>
              <p><b><u>PRODUCTO</u></b></p>
              <p>Nombres y Apellidos&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp; CLIENTES</p>
              <p>Teléfono&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp; 991-588-248</p>
              <br>
              <br>
              <p><b><u>CLIENTES</u></b></p>
              <p>Carrera&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp; QUIMICA SUIZA</p>
              <p>Fecha de Matrícula&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp; 09/08/2016</p>
              <br>
              <br>
              <p><b><u>DESCRIPCION</u></b></p>
              <p>Color&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp; AZUL</p>
              <p>Tipo de TELA &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;Caballero Aviación Comercial</p>
              <br>
              <br>
        <p>Firma de Solicitud :</p>
        <div class="firma">#####</div>
              <br>
              <br>
        <p>Firma de Entrega </p>
        <div class="firma">####</div>
              <br>
              <br>
              <p class="nota">El uniforme se entregará a los 30 dias calendarios, luego de haber cancelado la totalidad y de haber realizado la toma de tallas.</p>
      </div>-->

     
    <?php echo '<script'; ?>
 type="text/javascript" src="views/js/jquery-3.1.1.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="views/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="views/js/jquery.dataTables.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="views/js/dataTables.bootstrap.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="views/js/dataTables.responsive.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="views/js/opcionesmenu.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="views/js/productoslistado.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="views/js/notify.js"><?php echo '</script'; ?>
>
     
  </body> 
</html><?php }
}
