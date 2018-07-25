<?php
/* Smarty version 3.1.30, created on 2017-11-29 17:25:58
  from "C:\wamp\www\SISGAT\views\templates\recetasnuevas.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a1edf96e59845_20675626',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4a0da472c7b801fec0407439fcac8c739883b755' => 
    array (
      0 => 'C:\\wamp\\www\\SISGAT\\views\\templates\\recetasnuevas.tpl',
      1 => 1511972321,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a1edf96e59845_20675626 (Smarty_Internal_Template $_smarty_tpl) {
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
  
  <body class="w3-light-grey" onload="javascript:cargarCombox();">
      <!--Menu de Opciones-->
      <div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
        <span class="w3-bar-item w3-right"><img src="views/images/logo.png" width="120px" height="40px"></span>
      </div>

      <!-- CONTENIDO DE LA PAGINA-->
      <div class="w3-main">
        <div class="panel panel-default">
          <div class="panel-heading">
             <br><br><br>
             <h4>NUEVA<span class="w3-opacity w3-medium"> RECETA </span></h4>
          </div>
          <br> 
            <button class="w3-button w3-red w3-btnheader w3-left" type="button" id="cancel" name="cancel" onclick="location.href='?action=recetas'">Cancelar <i class="fa fa-exclamation-circle"></i></button>
             <button class="w3-button w3-amber w3-btnheader" type="button" id="generated" onclick="javascript:GenerarCodigo();">Generar Código <i class="fa fa-cogs"></i></button>
            <button class="w3-button w3-blue w3-btnheader" name="save" type="button" id="save" onclick="javascript:guardarRecetaHead();"> Guardar <i class="fa fa-save"></i></button>
            <button class="w3-button w3-green w3-btnheader" name="print" type="button" id="print" onclick="HTMLtoPDF()"> Imprimir <i class="fa fa-print"></i></button>
            <button class="w3-button w3-vino w3-btnheader" name="salir" type="button" onclick="location.href='?action=recetas'" id="salir"> Salir <i class="fa fa-angle-double-left "></i></button>
        </div>
        
    
        <!-- CODIGO DE LA RECETA-->
        <h5 class="w3-left"> <strong>N° - COD. RECETA </strong></h5>
        <div class="w3-left" id="codigo"></div> 
        
        <!--OPCIONES DE TEÑIDO - RECETA INICIAL -->
        <div class="w3-container w3-light-grey">
          <br><br>
           <div class="w3-row">
             <span> <strong>OPCIONES DE TEÑIDO</strong></span> 
             <br><br>
             <select class="w3-select w3-col m3 w3-right-cbx" name="cboCliente" id="cboCliente"> </select>
             <select class="w3-select w3-col m2 w3-right-cbx" name="cboTenido" id="cboTenido" ></select> 
             <select class="w3-select w3-col m3 w3-right-cbx" name="cboTipoTenido" id="cboTipoTenido"> </select>
             <select class="w3-select w3-col m2 w3-right-cbx" name="cboMaquina" id="cboMaquina"> </select>
            <!-- <input class="w3-input w3-col m2" type="date" name="fecha" value="" />-->
          </div>
          <br>
          <br>
        </div>
   
        <div class="panel-body w3-white">
            <table width="100%" class="table table-striped table-bordered table-hover w3-colorgrey" id="dataTables-example">
                <thead>
                    <tr>
                        <th colspan="6" class=""></th>
                    </tr>
                    <tr>
                      <td class="w3-light-grey"> PARTIDA </td>
                      <td width="20%" id="td-partida" name="td-partida"></td>
                      <td class="w3-light-grey"> COLOR </td>
                      <td width="20%" id="td-color" name="td-color"></td>
                      <td class="w3-light-grey"> TELA </td>
                      <td width="20%" id="td-tela" name="td-tela"></td>
                    </tr>
                    <tr>
                      <td class="w3-light-grey"> R.B </td>
                      <td id="td-rb" name="td-rb"></td>
                      <td class="w3-light-grey"> PESO (Kg) </td>
                      <td id="td-peso" name="td-peso"></td>
                      <td class="w3-light-grey" > VOLUMEN (L) </td>
                      <td id="td-volumen" name="td-volumen"></td>
                    </tr>
                    <tr>
                      <td class="w3-light-grey"> ROLLOS </td>
                      <td id="td-rollo" name="td-rollo"></td>
                      <td class="w3-light-grey"> CURVA</td>
                      <td id="td-curva" name="td-curva" ></td>
                      <td  colspan = "2" class="w3-light-grey"></td>
                    </tr>
                    <tr>
                        <th colspan="6" >
                        </th>
                    </tr>
                </thead>
            </table> 
      
            <div class="w3-right">
               <button id="btn-product" name="btn-product" class="w3-button w3-blue-grey" style="margin-bottom:5px;" data-toggle='modal' data-target='#product'> Agregar Producto <i class="fa fa-search"></i></button>
            </div>
            <table width="100%" class="table table-striped table-bordered table-hover w3-colorgrey" id="tbCalculoProd">
              <thead class="w3-navy" style="text-align: center">
                    <tr>
                      <td></td>
                      <td>Código</td>  
                      <td>Producto</td>  
                      <td>Cantidad</td>  
                      <td>Solución</td>  
                      <td>Costos</td>  
                      <td>Total</td>
                    </tr>
              </thead>
              <tbody></tbody>
            </table>
            <br>
            <div class="w3-right">
              Total Costo:  <input type="text" name="total" id="total" disabled="true"> 
            </div>
            
            <br>
            <textarea name="observaciones" id="observaciones" style="width: 100%; height: 80px" ></textarea>
            <table width="100%" class="table table-striped table-bordered table-hover w3-colorgrey" id="dataTables-example">
                <tbody>
                   <tr>
                <th class="w3-light-grey">OPERACIONES</th>
                <th class="w3-light-grey">ANCHO ACABADO</th>
                <th colspan="4" rowspan="3" class="w3-light-grey"> <center>PONER SUAVIZANTE PREPARADO PARA MLR</center></th>
              </tr>
              <tr>
                <td class="w3-light-grey">Hidro</td>
                <td id="td-hidro" name="td-hidro"></td>
              </tr>
              <tr>
                <td class="w3-light-grey">Compactado</td>
                <td id="td-compactado" name="td-compactado"></td>
              </tr>
               <tr>
                  <th class="w3-light-grey">FECHA</th>
                  <th class="w3-light-grey">HORA (Inicio/Fin)</th>
                  <th class="w3-light-grey">OPERACIÓN</th>
                  <th class="w3-light-grey">ENTRADA</th>
                  <th class="w3-light-grey">SALIDA</th>
                  <th class="w3-light-grey">OPERARIO</th>
              </tr>
              <tr>
                  <td></td>
                  <td></td>
                  <td>REMALLADO</td>
                  <td></td>
                  <td></td>
                  <td></td>
              </tr>
              <tr>
                  <td></td>
                  <td></td>
                  <td>TENIDO</td>
                  <td></td>
                  <td></td>
                  <td></td>
              </tr>
              <tr>
                  <td></td>
                  <td></td>
                  <td>HIDRO</td>
                  <td></td>
                  <td></td>
                  <td></td>
              </tr>
              <tr>
                  <td></td>
                  <td></td>
                  <td>SECADO</td>
                  <td></td>
                  <td></td>
                  <td></td>
              </tr>
              <tr>
                  <td></td>
                  <td></td>
                  <td>COMPACTADO</td>
                  <td></td>
                  <td></td>
                  <td></td>
              </tr>
               <tr>
                  <td></td>
                  <td></td>
                  <td>SPEROTO</td>
                  <td></td>
                  <td></td>
                  <td></td>
              </tr>
             </tbody>
            </table>                      
        </div>
    
    </div>

      <div class="modal fade" id="product" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header"> 
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align w3-color" id="Heading"><i class="fa fa-search"></i>  Agregar Producto </h4>
              </div>
              <br>
              <div class="modal-body" >
                  <table id="tblistadoproductos" class="table table-striped table-bordered table-hover w3-color" style="font-size:13px" width="100%"></table>
              </div>
             
            </div>
         </div>
     </div>

        <?php echo '<script'; ?>
 src="views/js/jquery-3.1.1.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="views/js/bootstrap.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="views/js/jquery.dataTables.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="views/js/dataTables.bootstrap.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="views/js/dataTables.responsive.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
  src="views/js/recetasnuevas.js" type="text/javascript"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="views/js/notify.js"><?php echo '</script'; ?>
>

        <?php echo '<script'; ?>
 type="text/javascript" src="views/js/jspdf.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="views/js/pdfFromHTML.js"><?php echo '</script'; ?>
>

  </body> 
</html>
<?php }
}
