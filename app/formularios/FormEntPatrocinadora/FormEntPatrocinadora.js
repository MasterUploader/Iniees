$(document).ready(function() {

CargarEntidades();
// boton para agregar una nueva entidad
$('#guardarEntPatrocinadora').click(function(){
		var nombre_entidad= $('#nombre_entidad').val();
		//var region= $('#region').val();
		var descripcion= $('#descripcion').val();

//		valor = document.getElementById("campo").value;
		if( nombre_entidad == null || nombre_entidad.length == 0 || typeof(nombre_entidad)== undefined 
			//descripcion == null || descripcion.length == 0 || typeof(descripcion)== undefined
			) {
		 alertify.error('Debe llenar todos los campos');
		
    		return false;
		}
		else{
			
		$.ajax({
			url: "php/FormEntPatrocinadora/insertarEntPatrocinadora.php",
			type: "post",
			dataType:"json",
			data: "nombre_entidad="+nombre_entidad+"&descripcion="+descripcion,
			success: function (response){
			
			if(response.status==200){
				alertify.success(response.mensaje);
				$('#respuesta').html(response);
				$('#nombre_entidad').val("");
				$('#descripcion').val("");
			}
			else if(response.status==401){
				alertify.log(response.mensaje);
			}
			else{
				alertify.error(response.mensaje);
			}
				/*$('#respuesta').html(response);
				$('#nombre_entidad').val("");
				$('#descripcion').val("");
					alertify.success("Visita nuestro <a href=\"http://blog.reaccionestudio.com/\" style=\"color:white;\" target=\"_blank\"><b>BLOG.</b></a>");*/ 
				
			},
			error: function(jqXHR, textStatus, errorThrown) {
                         alertify.error('Ocurrio un error');
              }
           });
		}
 });

/*/ boton para modificar una  entidad
$('#modificar').click(function(){
	$('#nombre_entidad').val();
	//var region= $('#region').val();
	var descripcion= $('#descripcion').val();	
});
*/
//mostrar las entidades registradas AUN FALTA
function CargarEntidades(){
           $.getJSON('php/FormEntidad/selecionar.php', function(data) {
           //alert(JSON.stringify(data));
                  $('#tablaEntidades').dataTable({
                        processing: true,
                        bDestroy: true,
                        data: data,
                        aoColumns: [
                                { data: "Nombre"},
                                { data: "Descripcion"}
                        ]
                    });
           
           // }
            
        })
        .error(function(err) {
            error();
        })

     }

})
