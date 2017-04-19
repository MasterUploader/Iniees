$(document).ready(function() {

//select option para regiones



CargarDepto();
CargarEntidad();

  function CargarDepto(){
           $.getJSON('php/FormRegion/selecDepto.php', function(data) {

           	//alert(JSON.stringify(data));

           	 $.each(data, function( key, val ) {
                        $('#departamento').append('<option value="'+val.codDepartamento+'">'+ val.nombreDepartamento+'</option>');
                });
            
        })
        .error(function(err) {
            error();
        })

     }

   $('#departamento').change(function(){
   		var codDepartamento= $('#departamento').val();
   		//alert(codDepartamento);
   		CargarMunicipio(codDepartamento);
   });
  
  function CargarMunicipio(codDepartamento){
           $.getJSON('php/FormRegion/selecMuni.php?codDepartamento='+codDepartamento, function(data) {

           	//salert(JSON.stringify(data));
           	
           	 $.each(data, function( key, val ) {
                        $('#municipio').append('<option value="'+val.codMunicipio+'">'+ val.nombreMunicipio+'</option>');
                });
            
        })
        .error(function(err) {
            error();
        })

     }

    

////////////////cargar la entidad
     function CargarEntidad(){
           $.getJSON('php/FormRegion/selecEntidad.php', function(data) {

           	//alert(JSON.stringify(data));

           	 $.each(data, function( key, val ) {
                        $('#entidades').append('<option value="'+val.CodEntidad+'">'+ val.Nombre+'</option>');
                });
            
        })
        .error(function(err) {
            error();
        })

     }


     

// boton para agregar una nueva entidad
$('#guardar').click(function(){
		var entidades= $('#entidades').val();
		var municipio= $('#municipio').val();
		var direccion= $('#direccion').val();

//		valor = document.getElementById("campo").value;
		if( direccion == null || direccion.length == 0 || typeof(direccion)== undefined ) {
		  alertify.error('Debe llenar todos los campos');
      
    		return false;
		}
		else{
			
		$.ajax({
			url: "php/FormRegion/insertarRegion.php",
			type: "post",
      dataType:"json",
			data: "direccion="+direccion+"&municipio="+municipio+"&entidades="+entidades,
			success: function (response){
      
			if(response.status==200){
        alertify.success(response.mensaje);
        $('#respuesta').html(response);
				$('#direccion').val("");
				$('#entidades').val(0);
				$('#municipio').val(0);
				$('#departamento').val(0);
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
      
})
