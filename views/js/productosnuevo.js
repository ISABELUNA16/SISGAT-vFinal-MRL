
var idprov    = document.getElementById("cboProveedores");
var idtprdc   = document.getElementById("opcionesTipoProducto");
document.getElementById("save").disabled = true;
//var newCodigo;

//MOSTRAR DATOS EN LOS COMBOS BOX 
function cargarCombox(){
 
  cargarDatos("MostrarTipoProducto", 1 ,"*Tipo de Producto", "#opcionesTipoProducto", "descripcion");
  cargarDatos("MostrarProveedor", 4 ,"*Proveedor ", "#cboProveedores", "razonsocial");
  cargarDatos("MostrarTipoColorante", 4 ,"*Especificación ", "#cboTipoColorante", "descripcion");
  cargarDatos("MostrarUnidades", 1 ,"*Unidades ", "#cboUnidades", "descripcion");
}

function cargarDatos($action, $tipo, $texto, $contenedor, $datos){
  var param = {
      "action":$action,
      "tipo":$tipo,
      "descripcion":''
    };
    $.ajax({
      type: "POST", 
      url: "controllers/BL/bl.productosnuevo.php",
      dataType: 'JSON', 
      data: param, 

      success : function(data)
      {
          var opcCombo = '';
          if(data.aaData.length>0){
            opcCombo+='<option selected> '+$texto +' </option>'
            for(i=0; i<data.aaData.length; i++){
              opcCombo+='<option value="'+data.aaData[i]['id']+'">'+ data.aaData[i]['id'] +' - '+ data.aaData[i][$datos] +'</option>'
            }
          }
           $($contenedor).html(opcCombo); 
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

//GENERANDO CORRELATIVOS PARA EL CODIGO DE LOS PRODUCTOS
//debugger
function GenerarCodigo()
{
   
   if (idprov.selectedIndex == "" || idtprdc.selectedIndex == ""){
    alert("ERROR: escoger proveedor o  tipo de producto ")
     
   }else{

     var indice = (idprov.value + idtprdc.value)
     var param = {
      "action":"maxReg",
      "tipo":1,
      "indice":indice
    }

    $.ajax({
      type:"POST", 
      url: "controllers/BL/bl.productosnuevo.php",
      dataType: 'JSON', 
      data: param, 
      success : function(data)
      {
        var input = '';
        if(data.aaData[0]['maxRegistro']!= null)
        {
          var codeProd = parseInt(data.aaData[0]['maxRegistro']) + 1;
          input+='<input type="text" class="w3-input w3-col m1" id="nuevocodigo" value="'+codeProd+'" disabled>'
        }else{
          //var indice   = (idprov.value + idtprdc.value);
          var codeProd   = parseInt(indice + '0001');
          input+='<input type="text" class="w3-input w3-col m1" id="nuevocodigo" value="'+codeProd+'" disabled>';
        }
         $('#codigo').html(input); 
      }
    });
    document.getElementById("save").disabled = false;
    document.getElementById("generated").disabled = true; 
    idprov.disabled = true;
    idtprdc.disabled = true
  }
}

//REGISTRAR UN NUEVO PRODUCTO
function GuardarProducto(){

  var codigo          = document.getElementById("nuevocodigo").value;
  var descripcion     = document.getElementById("producto").value;
  var idproveedor     = document.getElementById("cboProveedores").value;
  var idtipoproducto  = document.getElementById("opcionesTipoProducto").value;
  var idtipocolorante = document.getElementById("cboTipoColorante").value;
  var stock           = document.getElementById("stock").value;
  var idunidad        = document.getElementById("cboUnidades").value;
  var costo           = document.getElementById("costounitario").value;
  var fecha           = fechaActual(); 

  //console.log("el codigo es: " + codigo);

  if (descripcion.length == 0 ){
    $.Notify({
      caption: "Error: ",
      content: "Debe ingresar el nombre del producto.",
      type:    "alert" 
    });
    document.getElementById("producto").focus();
    return;
  }

  if(stock.length == 0){
    $.Notify({
      caption: "Error: ",
      content: "Debe ingresar el Stock del producto.",
      type:    "alert"
    });
    document.getElementById("stock").focus();
    return;
  }

  if(costo.length == 0){
    $.Notify({
      caption: "Error: ",
      content: "Debe ingresar el costo del producto.",
      type:    "alert"
    });
    document.getElementById("costounitario").focus();
    return;
  }

   var param = {
      "action"          : "registrarProd",
      "idproducto"      : codigo,
      "descripcion"     : descripcion,
      "idproveedor"     : idproveedor,
      "idtipoproducto"  : idtipoproducto,
      "idtipocolorante" : idtipocolorante,
      "stock"           : stock,
      "idunidad"        : idunidad,
      "costo"           : costo,
      "fecha"           : fecha,
      "estado"          : 1,
    }; 
   // console.log(param);
    $.ajax({
      type     : "POST",
      url      : "controllers/BL/bl.productosnuevo.php",
      dataType : 'JSON', 
      data     : param,

      success: function(data){

        if(data.aaData[0]==0){
              alert("Producto registrado con éxito");
              window.location.href = "?action=productos"
        }else{
              alert("Error, contácte al Administrador del Servicio");
              window.location.href = "?action=productosnuevo"
        }
      }

    });
}

//PROMISE 

/*function Registrar(){
  var promise = new Promise(function(done, reject){  
      done(retornaMaxRegistro())
  }) 
  //return promise 
}
 // promise.then(function(){
  //console.log(done);
//})
//}

/*function ProductoPromise(){
  
    var promise = new Promise(function(resolve, reject){
        var indice   = (idprov.value + idtprdc.value);
        var param = {
         "action":"maxReg",
          "tipo":1,
          "indice":indice
      };

      $.ajax({
        type:"POST", 
        url: "controllers/BL/bl.productosnuevo.php",
        dataType: 'JSON', 
        data: param, 
        success : function(data)
        {
          //if(data.aaData[0]['maxRegistro']!= null)
          //{
            //var codeProd = parseInt(data.aaData[0]['maxRegistro']) + 1;
            //console.log("Codigo: " + codeProd); 
            //return codeProd;
            resolve('Hola')
          //}else{
           // reject('Chau');
         // }
        }
      });
    })

    promise.then(function(){
        console.log(resolve);
    })

    promise.then(function(){
         console.log(err)
    })

}*/






