

function RegistrarNuevoCliente(){

  var razonsocial = document.getElementById("razonsocial").value;
  var ruc         = document.getElementById("ruc").value;
  var contacto    = document.getElementById("contacto").value;
  var telefono    = document.getElementById("telefono").value;
  var email       = document.getElementById("email").value;
  var direccion   = document.getElementById("direccion").value;


  if (razonsocial.length == 0 ){
    $.Notify({
      caption: "Error: ",
      content: "Debe ingresar la razón social.",
      type:    "alert" 
    });
    document.getElementById("razonsocial").focus();
    return;
  }

  if (ruc.length == 0 ){
    $.Notify({
      caption: "Error: ",
      content: "Debe ingresar el RUC del cliente.",
      type:    "alert" 
    });
    document.getElementById("ruc").focus();
    return;
  }
  if (telefono.length == 0 ){
    $.Notify({
      caption: "Error: ",
      content: "Debe ingresar el teléfono del cliente",
      type:    "alert" 
    });
    document.getElementById("telefono").focus();
    return;
  }

  var param = {
    "action"      : "RegistrarCliente",
    "id"          : "",
    "razonsocial" : razonsocial,
    "ruc"         : ruc,
    "contacto"    : contacto,
    "telefono"    : telefono,
    "email"       : email,
    "direccion"   : direccion,
    "estado"      : 1
  }; 
   //console.log(param)
  $.ajax({
    type     : "POST",
    url      : "controllers/BL/bl.clientesnuevo.php",
    dataType : 'JSON', 
    data     : param,

    success: function(data){

      if(data.aaData[0]==0){
            alert("Cliente registrado con éxito");
            window.location.href = "?action=clientes"
      }else{
            alert("Error, contácte al Administrador del Servicio");
            window.location.href = "?action=clientesnuevo"
      }
    }

  });
}


