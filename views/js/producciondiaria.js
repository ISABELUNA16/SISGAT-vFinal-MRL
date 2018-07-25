function MostrarRecetas(){
  
  var param = {
    "action":"ConsultarRecetas",
    "tipo":1,
    "cod" : "",
   };

  $.ajax({
    type: "POST", 
    url: "controllers/BL/bl.recetaslistado.php",
    dataType: 'JSON', 
    data: param, 

    success : function(data)
    {
  
      if(data.data.length>0)
      {
          var table = $('#tblistadorecetas').DataTable({
            responsive:true,
            data: data.data,
            columns: [
                        
              { title: 'Código Receta',  data: 'Cod_receta'},
              { title: 'Cliente',        data: 'cliente'},
              { title: 'Teñido',         data: 'tenido'},
              { title: 'Tipo de Teñido', data: 'tipotenido'},
              { title: 'Partida',        data: 'partida'},
              { title: 'Color',          data: 'color'},
              { title: 'Tela',           data: 'tela'},
              { title: 'Fecha creación', data: 'fecha'},
            ],

          });        
      }
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

//console.log(fechaActual())

/*function cargarDatosReceta(xId){     
  var param = {
      "action":"ConsultarRecetaIndividual",
      "tipo":2,
      "id":parseInt(xId),   
     };

    $.ajax({
      type: "POST", 
      url: "controllers/BL/bl.recetaslistado.php",
      dataType: 'JSON', 
      data: param, 

      success : function(data)
      {
         
          $('#div_dinamico').html(data); 
       }
    });
}*/

