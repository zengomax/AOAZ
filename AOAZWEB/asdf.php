<script>
    


// imprime tabla de reservas

function obtenerDatos(){
  $estado = $('input[name="estadoreserva"]:checked').val();

		$.ajax({

		url: 'gestionReserva.php?estado='+$estado+'',

		success:function(datos){


		$('#datos').fadeIn().html(datos);},
		error:function(){
			$('#datos').fadeIn().html('<p><strong>The server is not working</p>');
		}
			});

		
	
		}




//funciona para comprobar fechas y dias pasados
function fecha(){

 var fechainicioField = document.getElementById("fecha").innerText.split("-");
  var fechainicio = new Date(parseInt(fechainicioField[0]),parseInt(fechainicioField[1]-1),parseInt(fechainicioField[2]));
  var hoy = new Date();
  hoy.setHours(0,0,0);
  fechainicio.setHours(23,23,23);

  alert(hoy);
  alert(fechainicio);

  
     if(fechainicio<hoy) {
     	 alertify.error("You can't cancel because the day expired");
   
        return false;
    } else {
    	return true;
    }

    
		}


//accion de hacer click en el boton eliminar
//-------CANCELAR RESERVA--------
$(document).on("click","#eliminar",function(){
	if(confirm("Do you want to cancel this book?")){
	

  var fechainicioField = $(this).data("fecha").split("-");
  var fechainicio = new Date(parseInt(fechainicioField[0]),parseInt(fechainicioField[1]-1),parseInt(fechainicioField[2]));
  var hoy = new Date();
  hoy.setHours(0,0,0);
  fechainicio.setHours(23,23,23);


  if(fechainicio<hoy) {
     	 alertify.error("You can't cancel because the day expired");
   
    } else {
   		var id = $(this).data("id");
        var parametros = {
                "id" : id,
                
        };
        $.ajax({
                data:  parametros, 
                url:   'deleteBook.php', 
                type:  'post', 

		success:function(datos){
			alertify.success(datos);
			obtenerDatos();
		},
		
			});
    	
    	}
	}

	});

//-------------FINALIZAR RESERVA---------
$(document).on("click","#finalizar",function(){

	var id = $(this).data("id");
    var parametros = {"idreserva" : id,};

$.ajax({
		data:  parametros, 
        url:   'finalizarReservaForm.php', 
        type:  'post',
		

		beforeSend:function(){
			
		$('#datos').html('<div><img src="img/abeja.gif" width="400"/></div>')},


		success:function(datos){


		$('#datos').fadeIn().html(datos);},
		error:function(){
			$('#datos').fadeIn().html('<p><strong>The server is not working</p>');
		}
			});




});


//GENERAR DEUDA FORM

$(document).on("click","#finalizar",function(){

	var id = $(this).data("id");
    var parametros = {"kilos" : id,};

$.ajax({
		data:  parametros, 
        url:   'finalizarReservaForm.php', 
        type:  'post',
		

		beforeSend:function(){
			
		$('#datos').html('<div><img src="img/abeja.gif" width="400"/></div>')},


		success:function(datos){


		$('#datos').fadeIn().html(datos);},
		error:function(){
			$('#datos').fadeIn().html('<p><strong>The server is not working</p>');
		}
			});




});

	





  </script>