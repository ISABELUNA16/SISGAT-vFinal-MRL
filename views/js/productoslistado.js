function MostrarProductos(){
  
  var param = {
    "action":"ConsultarProductos",
    "tipo":1,
    "nombre":'',
    "id":''
   };
  $.ajax({
    type: "POST", 
    url: "controllers/BL/bl.productoslistado.php",
    dataType: 'JSON', 
    data: param, 

    success : function(data)
    {
      if(data.data.length>0)
      {
        var table = $('#tblistadoproductos').DataTable({
          responsive:true,
          data: data.data,
          columns: [
            {
              data:null,
              "className":"button",
              "defaultContent":"<button class='editar btn btn-primary btn-xs' data-title='Edit' data-toggle='modal' data-target='#edit'><i class='fa fa-pencil'></i></button>"
            },
            {
              data:null,
              "className":"button",
              "defaultContent":"<button class='eliminar btn btn-danger btn-xs' data-title='Delete' data-toggle='modal' data-target='#delete'><i class='fa fa-trash-o'></i></button>"
            },
            { title: 'Id',              data: 'id'},
            { title: 'Producto',        data: 'descripcion'},
            { title: 'Proveedor',       data: 'proveedor'},
            { title: 'Tipo',            data: 'tipoproducto'},
            { title: 'Especificación',  data: 'tipocolorante'},
            { title: 'Stock',           data: 'stock'},
            { title: 'Costo Unitario',  data: 'costounitario'},
            { title: 'última modificación',  data: 'fechamodificacion'},
          ],
        });

        $('#tblistadoproductos tbody').on( 'click', 'button.editar', function () {
           var data = table.row( $(this).parents('tr') ).data();
           cargarDatosModal(data['id']);
        });  
        $('#tblistadoproductos tbody').on( 'click', 'button.eliminar', function () {
           var data = table.row( $(this).parents('tr') ).data();
           envioID(data['id']);
        });
      }
    }
  });
}

function cargarDatosModal(xId){     
  var param = {
      "action":"ConsultarProductosIndividual",
      "tipo":3,
      "id":xId,   
      "nombre":''      
     };

    $.ajax({
      type: "POST", 
      url: "controllers/BL/bl.productoslistado.php",
      dataType: 'JSON', 
      data: param, 

      success : function(data)
      {
         for(i=0; i<data.aaData.length; i++){
          var divcargaDatosEditar ='';
          divcargaDatosEditar += '<div class="form-group">'
          divcargaDatosEditar += '<input type="hidden" name="id" id="id" value="'+data.aaData[i]["id"] +'">'
          divcargaDatosEditar += '    Producto <input class="form-control" type="text" name="descripcion" id="descripcion" value="' + data.aaData[i]["descripcion"] + '"/>'
          divcargaDatosEditar += '</div>'
          divcargaDatosEditar += '<div class="form-group">'
          divcargaDatosEditar += '     <input class="form-control " type="hidden" name="proveedor" id="proveedor" value="' + data.aaData[i]["proveedor"] + '"/>'
          divcargaDatosEditar += '</div>'
          divcargaDatosEditar += '<div class="form-group">'
          divcargaDatosEditar += '     <input class="form-control " type="hidden" name="tipoproducto" id="tipoproducto" value="' + data.aaData[i]["tipoproducto"] + '"/>'
          divcargaDatosEditar += '</div>'
          divcargaDatosEditar += '<div class="form-group">'
          divcargaDatosEditar += '     <input class="form-control " type="hidden" name="tipocolorante" id="tipocolorante" value="' + data.aaData[i]["tipocolorante"] + '"/>'
          divcargaDatosEditar += '</div>'
          divcargaDatosEditar += '<div class="form-group">'
          divcargaDatosEditar += '     Stock <input class="form-control " type="number" name="stock" id="stock" value="' + data.aaData[i]["stock"] + '"/>'
          divcargaDatosEditar += '</div>'
          divcargaDatosEditar += '<div class="form-group">'
          divcargaDatosEditar += '     <input class="form-control " type="hidden" name="und" id="und" value="' + data.aaData[i]["und"] + '"/>'
          divcargaDatosEditar += '</div>'
          divcargaDatosEditar += '<div class="form-group">'
          divcargaDatosEditar += '    Costo <input class="form-control " type="text" name="costo"  id="costo" value="'+ data.aaData[i]["costounitario"].toFixed(2) + '"/>'
          divcargaDatosEditar += '</div>'
        }
          $('#datosCargados').html(divcargaDatosEditar);  
       }
    });
}

//CAPTURA DE FECHA ACTUAL
function fechaActual(){
  var fecha = new Date();
  var yyyy  = fecha.getFullYear();
  var mm    = fecha.getMonth()+1;
  var dd    = fecha.getDate();

  if(dd<10) {
      dd='0'+dd
  } 
  if(mm<10) {
      mm='0'+mm
  } 
  var actual = (yyyy+"-"+mm+"-"+dd);
  return actual;
}

//ACTUALIZAR DATOS DEL LISTADO DE PRODUCTOS 

function actualizarDatos(){
    var id            = document.getElementById("id").value;
    var descripcion   = document.getElementById("descripcion").value;
    var proveedor     = parseInt(document.getElementById("proveedor").value);
    var tipoproducto  = parseInt(document.getElementById("tipoproducto").value);
    var tipocolorante = parseInt(document.getElementById("tipocolorante").value);
    var stock         = document.getElementById("stock").value;
    var und           = parseInt(document.getElementById("und").value);
    var costo         = document.getElementById("costo").value;
    var fecha         = fechaActual();

   // console.log(id , descripcion, proveedor,tipoproducto, tipocolorante, stock, und, costo, fecha)
   // console.log("Mostrar: "+ tipoproducto);
    console.log("Hola");
    var param = {
      "action"        : "ActualizarRegistro",
      "id"            : id,
      "descripcion"   : descripcion,
      "proveedor"     : proveedor,
      "tipoproducto"  : tipoproducto,
      "tipocolorante" : tipocolorante,
      "stock"         : stock,
      "und"           : und,
      "costo"         : costo,
      "fecha"         : fecha, 
      "estado"        : 1
    };

    console.log(param);
    console.log("bye");

    $.ajax({
      type     : "POST",
      url      : "controllers/BL/bl.productoslistado.php",
      dataType : 'JSON', 
      data     : param,
      
      success: function(data){
        if(data.aaData[0]==0){
           window.location.href = "?action=productoslistado"            
        }else{
           $.Notify({
            caption: "Error:",
            content: "No se ha podido actualizar los datos del producto. Intente Nuevamente",
            type   : "alert"
          });
        }
      }
    });
}

function envioID(xId){
   var divOpciones = '';
   divOpciones+='<button type="button" class="btn btn-success" onclick="javascript: eliminarRegistro('+xId+');"> Sí </button>'
   divOpciones+='<button type="button" class="btn btn-default" data-dismiss="modal"> No</button>'
   $('#opcionesEliminar').html(divOpciones); 
}

function eliminarRegistro(xId){
  var param = {
    "action":"EliminarRegistro",
    "tipo"            :1,
    "idproducto"      :xId,   
    "descripcion"     : '',
    "idproveedor"     : '',
    "idtipoproducto"  : '',
    "idtipocolorante" : '',
    "stock"           : '',
    "idunidad"        : '',
    "costo"           : '',
    "fecha"           : '',
    "estado"          : '',
  };

  $.ajax({
    type: "POST", 
    url: "controllers/BL/bl.productoslistado.php",
    dataType: 'JSON', 
    data: param, 
      success: function(data){
        if(data.aaData[0]==0){
            window.location.href="?action=productoslistado"            
        }else{
           $.Notify({
            caption: "Error:",
            content: "No se ha podido eliminar el registro del Producto. Intente Nuevamente",
            type   : "alert"
          });
        }
      }
  });
}

function Imprimir(tipo)
{
  var ficha   = document.getElementById(tipo);
  var ventimp = window.open(' ','popimpr');

  ventimp.document.write(ficha.innerHTML);
  ventimp.document.close();
  ventimp.print();
  ventimp.close();
} 


function createPdf(){

 // var docDefinition = { content: 'This is an sample PDF printed with pdfMake' };

  //pdfMake.createPdf(docDefinition).open();
  //pdfMake.createPdf(docDefinition).print();
  //pdfMake.createPdf(docDefinition).download('optionalName.pdf');
}
