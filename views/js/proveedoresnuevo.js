
function RegistrarNuevo(){
  var razonsocial   = document.getElementById("razonsocial").value;
  var ruc           = document.getElementById("ruc").value;
  var descripcion   = document.getElementById("descripcion").value;
  var direccion     = document.getElementById("direccion").value;
  var telefono      = document.getElementById("telefono").value;
  var email         = document.getElementById("email").value;
  
    if (razonsocial.length == 0) {
        $.Notify({
            caption: "Error:",
            content: "Debe de ingresar la razón social.",
            type   : "alert"
        });
        document.getElementById("razonsocial").focus();
        return;
    } 
     if (ruc.length == 0) {
        $.Notify({
            caption: "Error:",
            content: "Debe de ingresar el ruc de la empresa.",
            type   : "alert"
        });
        document.getElementById("ruc").focus();
        return;
    }
     if (telefono.length == 0) {
        $.Notify({
            caption: "Error:",
            content: "Debe de ingresar el teléfono.",
            type   : "alert"
        });
        document.getElementById("telefono").focus();
        return;
     }
  var param = {

    "action"      : "RegistrarProveedor",
    "id"          : "",
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
    url      : "controllers/BL/bl.proveedoresnuevo.php",
    dataType : 'JSON', 
    data     : param,
    
    success: function(data){
      if(data.aaData[0]==0){
          alert("Proveedor registrado con éxito");
          window.location.href = "?action=proveedores"                
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
