function MostrarClientes(){

  var param = {
    "action":"ConsultarClientes",
    "tipo":1,
    "nombre":'',
    "id":''
   };

  $.ajax({
    type: "POST", 
    url: "controllers/BL/bl.clienteslistado.php",
    dataType: 'JSON', 
    data: param, 

    success : function(data)
    {
      if(data.data.length>0)
      {
        var table = $('#tblistadoclientes').DataTable({
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
            { title: 'Razón Social',    data: 'razonsocial'},
            { title: 'RUC',             data: 'ruc'},
            { title: 'Contacto',        data: 'contacto'},
            { title: 'Teléfono',        data: 'telefono'},
            { title: 'Email',           data: 'email'},
            { title: 'Dirección',       data: 'direccion'},
          ],
        });

        $('#tblistadoclientes tbody').on( 'click', 'button.editar', function () {
           var data = table.row( $(this).parents('tr') ).data();
           cargarDatosModal(data['id']);
        });  

        $('#tblistadoclientes tbody').on( 'click', 'button.eliminar', function () {
           var data = table.row( $(this).parents('tr') ).data();
           envioID(data['id']);
        });


      }
    }
  });
}

function cargarDatosModal(xId){     
var param = {
    "action":"ConsultarClientesIndividual",
    "tipo":3,
    "id":xId,   
    "razonsocial":''      
   };

  $.ajax({
    type: "POST", 
    url: "controllers/BL/bl.clienteslistado.php",
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
        divcargaDatosEditar += '    Descripción <input class="form-control " type="text"  name="contacto" id="contacto" value="' + data.aaData[i]["contacto"] + '"/>'
        divcargaDatosEditar += '</div>'
        divcargaDatosEditar += '<div class="form-group">'
        divcargaDatosEditar += '    Teléfono <input class="form-control " type="number" name="telefono" id="telefono" value="' + data.aaData[i]["telefono"] + '"/>'
        divcargaDatosEditar += '</div>'
        divcargaDatosEditar += '<div class="form-group">'
        divcargaDatosEditar += '     Email <input class="form-control " type="text" name="email" id="email" value="' + data.aaData[i]["email"] + '"/>'
        divcargaDatosEditar += '</div>'
        divcargaDatosEditar += '<div class="form-group">'
        divcargaDatosEditar += '    Dirección <input class="form-control " type="text" name="direccion"  id="direccion" value="'+ data.aaData[i]["direccion"] + '"/>'
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
    var contacto      = document.getElementById("contacto").value;
    var telefono      = document.getElementById("telefono").value;
    var email         = document.getElementById("email").value;
    var direccion     = document.getElementById("direccion").value;
    var param = {
      "action"      : "ActualizarRegistro",
      "id"          : id,
      "razonsocial" : razonsocial,
      "ruc"         : ruc,
      "contacto"    : contacto,
      "telefono"    : telefono,
      "email"       : email,
      "direccion"   : direccion,
      "estado"      : 1
    };

    $.ajax({
      type     : "POST",
      url      : "controllers/BL/bl.clienteslistado.php",
      dataType : 'JSON', 
      data     : param,
      
      success: function(data){
        if(data.aaData[0]==0){
           window.location.href = "?action=clienteslistado"            
        }else{
           $.Notify({
            caption: "Error:",
            content: "No se ha podido actualizar los datos del cliente. Intente Nuevamente",
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
    "razonsocial" : '',
    "ruc"         : '',
    "contacto"    : '',
    "telefono"    : '',
    "email"       : '',
    "direccion"   : '',
    "estado"      : ''     
  };

  $.ajax({
    type: "POST", 
    url: "controllers/BL/bl.clienteslistado.php",
    dataType: 'JSON', 
    data: param, 
      success: function(data){
        if(data.aaData[0]==0){
            window.location.href = "?action=clienteslistado"            
        }else{
           $.Notify({
            caption: "Error:",
            content: "No se ha podido eliminar el registro del Cliente. Intente Nuevamente",
            type   : "alert"
          });
        }
      }
  });
}

