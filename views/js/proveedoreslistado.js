      
//MOSTRAR LISTADO DE PROVEEDORES 
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
      if(data.data.length>0)
      {
        var table = $('#tblistadoproveedores').DataTable({
            responsive: true,
            data: data.data,
              columns: [
                {
                  data:null,
                  "className":"button",
                  "defaultContent":"<button class='editar btn btn-primary btn-xs' data-title='Edit' data-toggle='modal' data-target='#edit' onClick='javascript:cargarDatosModal();'><i class='fa fa-pencil'></i></button>"
                },
                {
                  data:null,
                  "className":"button",
                  "defaultContent":"<button class='eliminar btn btn-danger btn-xs' data-title='Delete' data-toggle='modal' data-target='#delete' onClick='javascript:envioID();'><i class='fa fa-trash-o'></i></button>"
                },
                { title: 'Id',           data: 'id' },
                { title: 'Razón social', data: 'razonsocial' },
                { title: 'RUC',          data: 'ruc' },
                { title: 'Descripción',  data: 'descripcion' },
                { title: 'Dirección',    data: 'direccion' },
                { title: 'Teléfono',     data: 'telefono' },
                { title: 'Email',        data: 'email' },
                
              ],
        });

        $('#tblistadoproveedores tbody').on( 'click', 'button.editar', function () {
                 var data = table.row( $(this).parents('tr') ).data();
                 cargarDatosModal(data['id']);
        });  

        $('#tblistadoproveedores tbody').on( 'click', 'button.eliminar', function () {
                 var data = table.row( $(this).parents('tr') ).data();
                 envioID(data['id']);
        }); 


      }
    }
  });
}

//MODAL DE EDITADO
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
          divcargaDatosEditar += '    RUC: <input class="form-control " type="number"  name="ruc" id="ruc" value="' + data.aaData[i]["ruc"] + '"/>'
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

//ACTUALIZAR DATOS
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
      
      success: function(data)
      {
        if(data.aaData[0]==0)
        {
           // alert("Datos del proveedor actualizados con éxito ");
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

//ELIMINAR DATOS 
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
