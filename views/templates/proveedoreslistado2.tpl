<!DOCTYPE html>
<html>
  
  <head>
    <title>SISGAT</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="32x32" href="views/images/logo.png" alt="icono">
    <link href="views/css/principal.css" rel="stylesheet" type="text/css" >
    <link href="views/css/font-awesome.css" rel="stylesheet"> 
    <link href="views/css/bootstrap.min.css" rel="stylesheet">
    <link href="views/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="views/css/dataTables.responsive.css" rel="stylesheet">
  </head>
 
  <body class="w3-light-grey" onload="javascript:MostrarProveedores();"> 
      <!--BOTON DEL MENU-->
      <div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
        <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="sisgat_open();"><i class="fa fa-bars"></i>  Menu</button>
       <span class="w3-bar-item w3-right"><img src="views/images/logo.png" width="120px" height="40px"></span>
      </div>

      <!--MENU -->
      <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar">
        <hr>
        <div class="w3-container">
          <span><strong> MENU DE OPCIONES</strong></span>
        </div>
        <hr>
        <div class="w3-bar-block">
          <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="sisgat_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Cerrar Menu</a>
          <a href="?action=principal" class="w3-bar-item w3-button w3-padding w3-hover-blue"><i class="fa fa-star "></i>  Principal</a>
          <a href="?action=proveedores" class="w3-bar-item w3-button w3-amber w3-padding w3-hover-blue"><i class="fa fa-truck"></i>  Proveedores</a>
          <a href="?action=productos" class="w3-bar-item w3-button w3-padding w3-hover-blue"><i class="fa fa-flask"></i>  Productos</a>
          <a href="?action=clientes" class="w3-bar-item w3-button w3-padding w3-hover-blue"><i class="fa fa-users fa-fw"></i>  Clientes</a>
          <a href="?action=recetas" class="w3-bar-item w3-button w3-padding w3-hover-blue"><i class="fa fa-clipboard fa-fw"></i> Recetas</a>
          <a href="?action=reportes" class="w3-bar-item w3-button w3-padding w3-hover-blue"><i class="fa fa-bar-chart "></i>  Reportes</a>
          <a href="?action=mantenimientos" class="w3-bar-item w3-button w3-padding w3-hover-blue"><i class="fa fa-cog fa-fw"></i>  Mantenimiento</a>
          <a href="?action=cerrarsesion" class="w3-bar-item w3-button w3-padding w3-hover-blue"><i class="fa fa-power-off fa-fw"></i>  Salir del Sistema</a>
         <br><br>
        </div>
      </nav>

      <!-- Overlay effect when opening sidebar on small screens -->
      <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="sisgat_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

      <!-- CONTENIDO DE LA PAGINA-->
      <div class="w3-main" style="margin-left:300px;margin-top:43px;">
        <header class="w3-container">  
        </header>
      <!--TABLA -->
          <div  class="w3-padding-32 w3-margin-bottom">    
              <div class="row">
                <div class="col-lg-12">
                  <div class="panel panel-default">
                      <div class="panel-heading">
                          <h4>LISTADO <span class="w3-opacity w3-medium"> PROVEEDORES </span></h4>
                      </div> <br>
                      <div class="w3-container">
                       <div class="w3-row">    
                         <br>     
                          <button class="w3-button w3-red" style="margin-bottom: 20px; margin-right: 5px;" onclick="location.href='?action=proveedores'">Salir <i class="fa fa-exclamation-circle"></i></button>
                          <button class="w3-button w3-blue" style="margin-bottom: 20px; margin-right: 5px;">Imprimir en Formato PDF  <i class="fa fa-print"></i></button>
                       </div>
                      </div>
                      <!-- /.panel-heading -->
                      <div class="panel-body">         
                           
                          

                        <table width="100%" class="table table-striped table-bordered table-hover"  id="listadoProveedores" style="color: grey">
                          <thead>
                              <tr>
                                <th></th>
                                <th></th>
                                <th>Id</th>
                                <th>Razón Social</th>
                                <th>N° RUC </th>
                                <th>Descripción</th>
                                <th>Dirección</th>
                                <th>Teléfono</th>
                                <th>Email</th>
                                <th>Estado</th>
                              </tr>
                          </thead>
                          <tbody id="tablaProveedores">
                            
                          </tbody>
                          <tfoot>
                          <tr>
                                <th></th>
                                <th></th>
                                <th>Id</th>
                                <th>Razón Social</th>
                                <th>N° RUC </th>
                                <th>Descripción</th>
                                <th>Dirección</th>
                                <th>Teléfono</th>
                                <th>Email</th>
                                <th>Estado</th>
                          </tr>
                          </tfoot>  
                        </table>
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
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Editar registro seleccionado</h4>
              </div>
              <div class="modal-body" id="datosCargados">
              </div>
              <div class="modal-footer ">
                    <button type="button" class="btn btn-lg w3-blue" onclick="javascript: actualizarDatos();" style="width: 100%;"><span class=""></span>Actualizar Datos</button>
              </div>
            </div>
          </div>
     </div>
    <!--ELIMINAR-->
      <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="" aria-hidden="true"></span></button>
              <h4 class="modal-title custom_align" id="Heading">Eliminar registro seleccionado</h4>
            </div>
            <div class="modal-body">
              <div class="alert alert-danger"><span class=""></span> Está seguro que desea eliminar este Registro ?? </div>
            </div>
            <div class="modal-footer" id="opcionesEliminar">
               
            </div>
          </div>
        </div>
      </div>

    <script src="views/js/jquery-3.1.1.min.js"></script>
    <script src="views/js/bootstrap.min.js"></script>
    <script src="views/js/jquery.dataTables.min.js"></script>
    <script src="views/js/dataTables.bootstrap.min.js"></script>
    <script src="views/js/dataTables.responsive.js"></script>

<!--MENU DE OPCIONES - OCULTAR Y MOSTRAR-->
    
      <script>
          var mySidebar = document.getElementById("mySidebar");
          var overlayBg = document.getElementById("myOverlay");
          
          function sisgat_open() {
              if (mySidebar.style.display === 'block') {
                  mySidebar.style.display = 'none';
                  overlayBg.style.display = "none";
              } else {
                  mySidebar.style.display = 'block';
                  overlayBg.style.display = "block";
          
              }
          }
          function sisgat_close() {
              mySidebar.style.display = "none";
              overlayBg.style.display = "none";
          }
      </script>

<!--GENERAR TABLA DEL LISTADO DE PROVEEDORES-->
        
     <script type="text/javascript">
      
      function MostrarProveedores(){
        var param = {
          "action":"ConsultarProveedores",
          "tipo":1,
          "id":'',
          "razonsocial":''
         };

        $.ajax({
          type: "POST", 
          url: "controllers/BL/bl.proveedoreslistado.php",
          dataType: 'JSON', 
          data: param, 

          success : function(data)
          {
            var divTabProveedores = '';

            if(data.aaData.length>0){   
             
        
            // divTabProveedores+='       <tbody>'

              for(i=0; i<data.aaData.length; i++){

                if (data.aaData[i]['estado']=='1'){
                  data.aaData[i]['estado'] = 'Activo';
                  
                  divTabProveedores+=  '<tr class="odd gradeX">'
                  divTabProveedores+=       '<td>  <p data-placement="top" data-toggle="tooltip" title="Editar"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" onclick="javascript:cargarDatosModal('+data.aaData[i]["id"]+');"><i class="fa fa-pencil"></i></button></p> </td>'
                  divTabProveedores+=       '<td> <p data-placement="top" data-toggle="tooltip" title="Eliminar"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" onclick="javascript:envioID('+data.aaData[i]["id"]+');" > <i class="fa fa-trash-o"></i></button></p> </td>'
                  divTabProveedores+=       '<td>'+ data.aaData[i]["id"] +'</td>'
                  divTabProveedores+=       '<td>'+ data.aaData[i]["razonsocial"] +'</td>'
                  divTabProveedores+=       '<td>'+ data.aaData[i]["ruc"] +'</td>'
                  divTabProveedores+=       '<td>'+ data.aaData[i]["descripcion"] +'</td>'
                  divTabProveedores+=       '<td>'+ data.aaData[i]["direccion"] +'</td>'
                  divTabProveedores+=       '<td>'+ data.aaData[i]["telefono"] +'</td>'
                  divTabProveedores+=       '<td>'+ data.aaData[i]["email"] +'</td>'
                  divTabProveedores+=       '<td>'+ data.aaData[i]["estado"] +'</td>'
                 
                  divTabProveedores+=   '</tr>'
                } else {
                    data.aaData[i]['estado'] = 'Desactivo';

                }
              }
              //  divTabProveedores+=  '</tbody>'
                 $('#tablaProveedores').html(divTabProveedores);  
                        
            }
          }
        });
      }
   </script>

    <script type="text/javascript">

    function cargarDatosModal(xId){     
      var param = {
          "action":"ConsultarProveedorIndividual",
          "tipo":2,
          "id":xId,   
          "razonsocial":''      
         };

        $.ajax({
          type: "POST", 
          url: "controllers/BL/bl.proveedoreslistado.php",
          dataType: 'JSON', 
          data: param, 

          success : function(data)
          {
             for(i=0; i<data.aaData.length; i++){

              var divcargaDatosEditar ='';

                divcargaDatosEditar += '<div class="form-group">'
                divcargaDatosEditar += '<input type="hidden" name="id" id="id" value="'+data.aaData[i]["id"] +'">'
                divcargaDatosEditar += '    Razón social <input class="form-control" type="text" name="razonsocial" id="razonsocial" value="' + data.aaData[i]["razonsocial"] + '"/>'
                divcargaDatosEditar += '</div>'
                divcargaDatosEditar += '<div class="form-group">'
                divcargaDatosEditar += '    Número de ruc: <input class="form-control " type="number"  name="ruc" id="ruc" value="' + data.aaData[i]["ruc"] + '"/>'
                divcargaDatosEditar += '</div>'
                divcargaDatosEditar += '<div class="form-group">'
                divcargaDatosEditar += '    Descripción <input class="form-control " type="text"  name="descripcion" id="descripcion" value="' + data.aaData[i]["descripcion"] + '"/>'
                divcargaDatosEditar += '</div>'
                divcargaDatosEditar += '<div class="form-group">'
                divcargaDatosEditar += '    Dirección <input class="form-control " type="text" name="direccion"  id="direccion" value="'+ data.aaData[i]["direccion"] + '"/>'
                divcargaDatosEditar += '</div>'
                divcargaDatosEditar += '<div class="form-group">'
                divcargaDatosEditar += '    Teléfono <input class="form-control " type="number" name="telefono" id="telefono" value="' + data.aaData[i]["telefono"] + '"/>'
                divcargaDatosEditar += '</div>'
                divcargaDatosEditar += '<div class="form-group">'
                divcargaDatosEditar += '     Email <input class="form-control " type="text" name="email" id="email" value="' + data.aaData[i]["email"] + '"/>'
                divcargaDatosEditar += '</div>'
            }
         $('#datosCargados').html(divcargaDatosEditar);  
       }

     });
    }

    function actualizarDatos(){

          var id            = document.getElementById("id").value;
          var razonsocial   = document.getElementById("razonsocial").value;
          var ruc           = document.getElementById("ruc").value;
          var descripcion   = document.getElementById("descripcion").value;
          var direccion     = document.getElementById("direccion").value;
          var telefono      = document.getElementById("telefono").value;
          var email         = document.getElementById("email").value;


           var param = {

            "action"      : "ActualizarRegistro",
            "id"          : id,
            "ruc"         : ruc,
            "razonsocial" : razonsocial,
            "descripcion" : descripcion,
            "direccion"   : direccion,
            "telefono"    : telefono,
            "email"       : email,
            "estado"      : 1

          };

          $.ajax({
            type     : "POST",
            url      : "controllers/BL/bl.proveedoreslistado.php",
            dataType : 'JSON', 
            data     : param,
            
            success: function(data){

              if(data.aaData[0]==0){

                  alert("Datos del proveedor actualizados con éxito ");
                  MostrarProveedores();
                  window.location.href = "?action=proveedoreslistado"
                                
              }else{

                 $.Notify({
                  caption: "Error:",
                  content: "No se ha podido registrar los datos del proveedor. Intente Nuevamente",
                  type   : "alert"
                });
              }
            }

          });
         
    }

    function envioID(xId){
        var divOpciones = '';
               divOpciones+='<button type="button" class="btn btn-success" onclick="javascript: eliminarRegistro('+xId+');"> Si </button>'
               divOpciones+='<button type="button" class="btn btn-default" data-dismiss="modal"> No</button>'

        $('#opcionesEliminar').html(divOpciones); 
    }

    function eliminarRegistro(xId){
  
      var param = {

          "action":"EliminarRegistro",
          "tipo"        :1,
          "id"          :xId,   
          "ruc"         : '',
          "razonsocial" : '',
          "descripcion" : '',
          "direccion"   : '',
          "telefono"    : '',
          "email"       : '',
          "estado"      : ''     
         };

        $.ajax({
          type: "POST", 
          url: "controllers/BL/bl.proveedoreslistado.php",
          dataType: 'JSON', 
          data: param, 

            success: function(data){

              if(data.aaData[0]==0){
                  MostrarProveedores();
                  window.location.href = "?action=proveedoreslistado"
              }else{

                 $.Notify({
                  caption: "Error:",
                  content: "No se ha podido eliminar los datos del proveedor. Intente Nuevamente",
                  type   : "alert"
                });
              }
            }
        });
    }

    </script>
    
    <!--TABLA RESPONSIVA -->

    <script type="text/javascript">
       $(document).ready(function() {
            $('#listadoProveedores').DataTable({
                responsive: true
            });
       })
    </script>

   

   
  </body> 
</html>

