function MostrarPersonal(){

  var param = {
    "action":"ListadoPersonal",
    "tipo":1 
   };

  $.ajax({
    type: "POST", 
    url: "controllers/BL/bl.personal.php",
    dataType: 'JSON', 
    data: param, 

    success : function(data)
    {
      if(data.data.length>0)
      {
        var table = $('#tblistapersonal').DataTable({
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
            { title: 'Id',            data: 'id'},
            { title: 'Nombres',       data: 'nombre'},
            { title: 'Apellido Paterno',  data: 'paterno'},
            { title: 'Apellido Materno',   data: 'materno'},
            { title: 'Área laboral',  data: 'cargo'},
            { title: 'DNI',           data: 'dni'},
            { title: 'Dirección',     data: 'direccion'},
            { title: 'Género',        data: 'sexo'},
            { title: 'Teléfono',      data: 'telefono'},
            { title: 'Fecha de Nacimiento',     data: 'fechanacimiento'},
            
          ],
        });

        $('#tblistapersonal tbody').on( 'click', 'button.editar', function () {
           var data = table.row( $(this).parents('tr') ).data();
           cargarDatosModal(data['id']);
        });  

        $('#tblistapersonal tbody').on( 'click', 'button.eliminar', function () {
           var data = table.row( $(this).parents('tr') ).data();
           envioID(data['id']);
        });


      }
    }
  });
}


$(function(){
  $('#Nuevo').click(function(){
    alert("Espere un momento ");
  });
})



function cargarDatosModal(xId){     
  var param = {
    "action":"ListadoPersonalIndividual",
    "tipo":2, 
    "id":xId
  };

  $.ajax({
    type: "POST", 
    url: "controllers/BL/bl.personal.php",
    dataType: 'JSON', 
    data: param, 

    success : function(data)
    {
      for(i=0; i<data.aaData.length; i++){

        var divcargaDatosEditar ='';
        divcargaDatosEditar += '<div class="form-group">'
        divcargaDatosEditar += '<input type="hidden" name="id" id="id" value="'+data.aaData[i]["id"] +'">'
        divcargaDatosEditar += '    Nombre <input class="form-control" type="text" name="nombre" id="nombre" value="' + data.aaData[i]["nombre"] + '"/>'
        divcargaDatosEditar += '</div>'
        divcargaDatosEditar += '<div class="form-group">'
        divcargaDatosEditar += '    Apellido Paterno <input class="form-control" type="text" name="paterno" id="paterno" value="' + data.aaData[i]["paterno"] + '"/>'
        divcargaDatosEditar += '</div>'
        divcargaDatosEditar += '<div class="form-group">'
        divcargaDatosEditar += '    Apellido Materno <input class="form-control" type="text" name="materno" id="materno" value="' + data.aaData[i]["materno"] + '"/>'
        divcargaDatosEditar += '</div>'
        divcargaDatosEditar += '<div class="form-group">'
        divcargaDatosEditar += '    DNI <input class="form-control " type="number"  name="dni" id="dni" value="' + data.aaData[i]["dni"] + '"/>'
        divcargaDatosEditar += '</div>'
        divcargaDatosEditar += '<div class="form-group">'
        divcargaDatosEditar += '     Dirección <input class="form-control " type="text" name="direccion" id="direccion" value="' + data.aaData[i]["direccion"] + '"/>'
        divcargaDatosEditar += '</div>'
        divcargaDatosEditar += '<div class="form-group">'
        divcargaDatosEditar += '    Teléfono <input class="form-control " type="number" name="telefono" id="telefono" value="' + data.aaData[i]["telefono"] + '"/>'
        divcargaDatosEditar += '</div>'
        divcargaDatosEditar += '<div class="form-group">'
        divcargaDatosEditar += '     Fecha de nacimiento <input class="form-control " type="date" name="fecha" id="fecha" value="' + data.aaData[i]["fechanacimiento"] + '"/>'
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

