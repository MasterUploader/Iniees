$(document).ready(function() {

$('#guardarLineaInves').click(function(){
		var nombreLinea= $('#nombreLinea').val();
		//var region= $('#region').val();
		var descripcion= $('#descripcion').val();

//		valor = document.getElementById("campo").value;
		if( nombreLinea == null || nombreLinea.length == 0 || typeof(nombreLinea)== undefined 
			//descripcion == null || descripcion.length == 0 || typeof(descripcion)== undefined
			) {
		 alertify.error('Debe llenar todos los campos');
		
    		return false;
		}
		else{
			
		$.ajax({
			url: "php/FormLineaInves/insertarLineaInves.php",
			type: "post",
			dataType:"json",
			data: "nombreLinea="+nombreLinea+"&descripcion="+descripcion,
			success: function (response){
			
			if(response.status==200){
				alertify.success(response.mensaje);
				$('#respuesta').html(response);
				$('#nombreLinea').val("");
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


})
