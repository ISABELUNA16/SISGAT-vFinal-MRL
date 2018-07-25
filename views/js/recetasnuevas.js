var idcli         = document.getElementById("cboCliente");
var idtenido      = document.getElementById("cboTenido");
var idtipotenido  = document.getElementById("cboTipoTenido");
var idmaquina     = document.getElementById("cboMaquina");

document.getElementById("td-partida").contentEditable=true;
document.getElementById("td-color").contentEditable=true;
document.getElementById("td-tela").contentEditable=true;
document.getElementById("td-rb").contentEditable=true;
document.getElementById("td-peso").contentEditable=true;
document.getElementById("td-volumen").contentEditable=true;
document.getElementById("td-rollo").contentEditable=true;
document.getElementById("td-curva").contentEditable=true;
document.getElementById("td-hidro").contentEditable=true;
document.getElementById("td-compactado").contentEditable=true;
document.getElementById("observaciones").disabled=false;
document.getElementById("save").disabled = true;
document.getElementById("print").disabled=true;
document.getElementById("salir").disabled=true;


//MOSTRAR DATOS EN LOS COMBOS BOX 
function cargarCombox()
{ 
  cargarDatos("MostrarTenido", 1 , "recetasnuevas.php","*Seleccione Teñido .... ", "#cboTenido", "descripcion");
  cargarDatos("MostrarTipoTenido", 1 ,"recetasnuevas.php","*Seleccione Tipo de Teñido ....  ", "#cboTipoTenido", "descripcion");
  cargarDatos("ConsultarClientes", 1 ,"recetasnuevas.php","*Seleccione Cliente .... ", "#cboCliente", "razonsocial");
  cargarDatos("MostrarMaquina", 1 ,"recetasnuevas.php","*N° Máquina ... ", "#cboMaquina", "nombre");
  MostrarProductos();
}

function cargarDatos($action, $tipo, $arch, $texto, $contenedor, $datos)
{
  var param = {
      "action":$action,
      "tipo":$tipo,
      "nombre":'',
      "id":''
    };
    $.ajax({
      type: "POST", 
      url: "controllers/BL/bl." + $arch,
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


function MostrarProductos()
{
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
              "defaultContent":"<button class='agregar btn w3-navy-btn btn-xs' ><i class='fa fa-plus'></i></button>"
            },
            { title: 'Id',              data: 'id'},
            { title: 'Producto',        data: 'descripcion'},
            { title: 'Proveedor',       data: 'proveedor'},
            { title: 'Stock',           data: 'stock'},
          ],
        });

        var cont=0;
        $('#tblistadoproductos tbody').on( 'click', 'button.agregar', function () {
              var data = table.row( $(this).parents('tr') ).data();
              var fila = '<tr class="selected" id="'+data['id']+'"><td><button class="quitar btn w3-red btn-xs"><i class="fa fa-close"></i></button></td><td>'+data['id']+'</td><td>'+data['descripcion']+'</td><td class="td-cantidad" data-orig="" contentEditable="true" id="cant" onblur="solution('+cont+');" ></td><td class="td-solucion"></td><td class="td-costo">'+data['costounitario'].toFixed(2)+'</td><td class="td-total"></td></tr>';
              if(data['stock'] != 0 ){
                  $('#tbCalculoProd').append(fila);
                  cont++;
              }else {
                  alert("El Producto no tiene STOCK ");
              }
        });    
      }
    }
  });//onKeyPress="return checkIt(event)"
}


//QUITAR LA FILA SELECCIONADA
$('#tbCalculoProd').on('click', '.quitar', function (event) {
    event.preventDefault();
    $(this).closest('tr').remove();
});

/*function quitarFila(boton) {
 var table = $("#tbCalculoProd").DataTable();
 table.row($(boton).parents('tr')).remove().draw();
};*/


//FUNCION SOLO PARA EL INGRESO DE NUMEROS
function checkIt(evt) {
    evt = (evt) ? evt : window.event
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        status = "Ingrese sólo números"
        return false
    }
    status = ""
    return true
}


//CALCULO DE LA SOLUCION (%)
function solution(cont){
  //Captura de datos desde el TPL
  console.log("valor de cont: "  + cont);
  var volumen = document.getElementById("td-volumen");

  //Captura de datos del Td 
  var cantidad= document.getElementsByClassName("td-cantidad");
  var costo= document.getElementsByClassName("td-costo");
  var solucion= document.getElementsByClassName("td-solucion");
  var total= document.getElementsByClassName("td-total");

 
  if(cantidad[cont].innerHTML != cantidad[cont].dataset.orig) {
    //Cambiar los id de c/td
    //cantidad[cont].dataset.orig = cantidad[cont].innerHTML;

    //CALCULO DE LA SOLUCIÓN en porcentaje
    var result_solucion = parseFloat(volumen.innerHTML)*parseFloat(cantidad[cont].innerHTML);
    solucion[cont].innerHTML = result_solucion.toFixed(2);
    //console.log(cantidad[cont].innerHTML);
    
    //CALCULO DEL TOTAL
    var result_total = parseFloat(result_solucion)*parseFloat(costo[cont].innerHTML);
    total[cont].innerHTML = result_total.toFixed(2);
  }
}


//AGREGAR FILAS EN BLANCO

/*$(document).ready(function(){
    $('#bt-add').click(function(){
        AgregarFila();
    });
});*/

//var cont = 0;
/*function AgregarFila(){
  cont++;
  var fila = '<tr class="selected" id="fila'+cont+'"><td colspan="7" contentEditable="true"></td></tr>';
  $('#tbCalculoProd').append(fila);
}*/


//GENERANDO CODIGO PARA LA RECETA

function GenerarCodigo(){
   
   if (idcli.selectedIndex == "" || idtenido.selectedIndex == "" || idtipotenido.selectedIndex==""){
    alert("ERROR: Debe indicar (Cliente/Teñido/ Tipo de teñido) ")
     
   }else{

     var indice = (idcli.value + idtenido.value + idtipotenido.value)
     var param = {
      "action":"maxReg",
      "tipo":2,
      "indice":indice
   }

      $.ajax({
        type:"POST", 
        url: "controllers/BL/bl.recetasnuevas.php",
        dataType: 'JSON', 
        data: param, 
        success : function(data)
        {
          var input = '';
          if(data.aaData[0]['maxRegistro']!= null)
          {
            var codReceta = parseInt(data.aaData[0]['maxRegistro']) + 1;
            var correlativo = parseInt(data.aaData[0]['correlativo']) + 1;
            input+='<div class="w3-row">'
            input+='<input type="text" class="form-control w3-col m2" id="correlativo" value="'+correlativo+'" disabled>'
            input+='<input type="text" class="form-control w3-col m4" id="nuevocodigo" value="'+codReceta+'" disabled>';
            input+='</div>'
          }else{
            var codReceta   = parseInt(indice + '1');
            var correlativo = 1;
            input+='<div class="w3-row">'
            input+='<input type="text" class="form-control w3-col m2" id="correlativo" value="'+correlativo+'" disabled>'
            input+='<input type="text" class="form-control w3-col m4" id="nuevocodigo" value="'+codReceta+'" disabled>';
            input+='</div>'
          }
           $('#codigo').html(input); 
        }
      });
    
    document.getElementById("save").disabled = false;
    document.getElementById("generated").disabled = true;
    document.getElementById("print").disabled=false; 
    
    idcli.disabled = true;
    idtenido.disabled = true;
    idtipotenido.disabled= true;
  }
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


//ITERANDO LA TABLA PRODUCTOS 

 
//GUARDANDO DATOS
function guardarRecetaHead(){

  var codigoHead   = parseInt(document.getElementById("nuevocodigo").value);
  var correlativo  = parseInt(document.getElementById("correlativo").value);
  var idcliente    = parseInt(document.getElementById("cboCliente").value);
  var idtenido     = parseInt(document.getElementById("cboTenido").value);
  var idtipotenido = parseInt(document.getElementById("cboTipoTenido").value);
  var idmaquina    = parseInt(document.getElementById("cboMaquina").value);
  var partida      = parseInt(document.getElementById("td-partida").innerHTML);
  var color        = document.getElementById("td-color").innerHTML;
  var tela         = document.getElementById("td-tela").innerHTML;
  var rb           = parseInt(document.getElementById("td-rb").innerHTML);
  var peso         = parseFloat(document.getElementById("td-peso").innerHTML);
  var volumen      = parseFloat(document.getElementById("td-volumen").innerHTML);
  var rollo        = parseInt(document.getElementById("td-rollo").innerHTML);
  var curva        = document.getElementById("td-curva").innerHTML;
  var hidro        = parseInt(document.getElementById("td-hidro").innerHTML);
  var compactado   = parseInt(document.getElementById("td-compactado").innerHTML);
  var total        = parseFloat(document.getElementById("total").value);
  var observaciones= document.getElementById("observaciones").value;
  var fecha        = fechaActual();
  var estado       = 1;

  var param = {
      "action"        :"registrarRecetaHead",
      "id_receta"     : codigoHead,
      "indice"        : correlativo,
      "partida"       : partida,
      "color"         : color,
      "tela"          : tela,
      "rb"            : rb,
      "peso"          : peso,
      "volumen"       : volumen,
      "rollo"         : rollo,
      "curva"         : curva,
      "fecha"         : fecha,
      "total"         : total,
      "hidro"         : hidro,
      "compactado"    : compactado,
      "observaciones" : observaciones,
      "id_tenido"     : idtenido,
      "id_tipotenido" : idtipotenido,
      "id_cliente"    : idcliente,
      "id_maquina"    : idmaquina,
      "estado"        : 1,
  };

  //console.log(param);

  $.ajax({

    type     : "POST",
    url      : "controllers/BL/bl.recetasnuevas.php",
    dataType : 'JSON', 
    data     : param,

    success: function(data){
    //  console.log(data);
      if(data.aaData[0]==0){

        //alert("GUARDADO");
          document.getElementById("btn-product").disabled = true;
          document.getElementById("cancel").disabled=true;
          document.getElementById("save").disabled=true; 
          document.getElementById("cboMaquina").disabled=true; 
          document.getElementById("salir").disabled=false;
          document.getElementById("td-partida").contentEditable=false;
          document.getElementById("td-color").contentEditable=false;
          document.getElementById("td-tela").contentEditable=false;
          document.getElementById("td-rb").contentEditable=false;
          document.getElementById("td-peso").contentEditable=false;
          document.getElementById("td-volumen").contentEditable=false;
          document.getElementById("td-rollo").contentEditable=false;
          document.getElementById("td-curva").contentEditable=false;
          document.getElementById("td-hidro").contentEditable=false;
          document.getElementById("td-compactado").contentEditable=false;
          document.getElementById("observaciones").disabled=true;
      //    RecetaDetalle();

      }else{
          
         alert("Error, No se puedo guardar los datos de LA CABECERA");
           // window.location.href = "?action=recetasnuevas"
      }
    }

  });

}


//GUARDAR DETALLE DE PRODUCTOS
//function RecetaDetalle(){
  $(function(){
    $('#save').click(function(){
      //arreglo productos
      var productos = [];
      //Se itera cada fila de la tabla
      $("#tbCalculoProd tbody tr").each(function(el){
        
        //var productoOrden ={};

        if(parseInt(document.getElementById("nuevocodigo").value) != 0)
        {
            var tds = $(this).find("td");
            var param = {
              "action"          : "registrarRecetaDetalle",
              "id_receta"       : parseInt(document.getElementById("nuevocodigo").value),
              "id_producto"     : parseInt(tds.filter(":eq(1)").text()),
              "cantidad"        : parseFloat(tds.filter(":eq(3)").text()),
              "solucion"        : parseFloat(tds.filter(":eq(4)").text()),
              "costo"           : parseFloat(tds.filter(":eq(5)").text()),
              "total"           : parseFloat(tds.filter(":eq(6)").text()),
              "estado"          : 1
            }; 

            console.log(param);
            $.ajax({
              type     : "POST",
              url      : "controllers/BL/bl.recetasnuevas.php",
              dataType : 'JSON', 
              data     : param,

              success: function(data){
                console.log(data);
                if(data.aaData[0]==0){
                      //alert("Producto registrado con éxito");
                      //window.location.href = "?action=productos"
                      
                }else{
                      alert("Error, RECETA DETALLE");
                     // window.location.href = "?action=recetasnuevas"
                }
              }
            });
        
        }else{
        
          alert("No ha generado el codigo de receta");
        }
       
      });
      var Orden = {};
      Orden.productos = productos;
      var total = 0;

      //Usamos $.each para iterar un arreglo comun y corriente
      $.each(productos, function(index, value){
        //CALCULAR EL VALOR TOTAL 
        total += value.total;
      });

      Orden.total = total.toFixed(2);
      document.getElementById('total').value = Orden.total;

    });
  });

//}





/*function Imprimir(tipo)
{
  var ficha   = document.getElementById(tipo);
  var ventimp = window.open(' ','popimpr');
  ventimp.document.write(ficha.innerHTML);
  ventimp.document.close();
  ventimp.print();
  ventimp.close();
} 

function createPdf()
{
  var docDefinition = { content: 'This is an sample PDF printed with pdfMake' };
  pdfMake.createPdf(docDefinition).open();
  pdfMake.createPdf(docDefinition).print();
  pdfMake.createPdf(docDefinition).download('optionalName.pdf');
}

*/