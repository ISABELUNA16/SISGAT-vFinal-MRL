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
            {
              data:null,
              "className":"button",
              "defaultContent":"<button class='crear btn btn-primary btn-xs'> <i class='fa fa-pencil'></i> Crear receta</button>"
            },
            
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

        $('#tblistadorecetas tbody').on( 'click', 'button.crear', function () {
           var data = table.row( $(this).parents('tr') ).data();
           cargarDatosReceta(data['Cod_receta']);
           
        });  
      }
    }
  });
}

function cargarDatosReceta(xId){     
  
    if(xId != null){     
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
            console.log(data);
           // console.log("Redireccionando a Nueva recetas - cargadando los datos guardados")
            location.href ="?action=recetasnuevas";   
            
            //document.getElementById("td-partida").value = data.aaData["partida"];
         }
      });
    }else{
      alert("Error, no se ha podido cargar la página");
    }
    

  /*var param = {
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
          console.log(data);
          
          //$('#div_dinamico').html(data); 
       }
    });
  */

}

