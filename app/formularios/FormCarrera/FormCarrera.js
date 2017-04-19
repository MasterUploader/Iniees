$(document).ready(function(){

cargarUnidadAcademica();

  function cargarUnidadAcademica(){
           $.getJSON('php/FormDocumento/FormDocPregrado/selecUnidadAcademica.php', function(data) {

           	//alert(JSON.stringify(data));

           	 $.each(data, function( key, val ) {
                        $('#unidadAcademica').append('<option value="'+val.CodUnidadAcademica+'">'+ val.Nombre+'</option>');
                });
            
        })
        .error(function(err) {
            error();
        })

     }


$('#guardarCarrera').click(function(){
    var nombreCarrera= $('#nombreCarrera').val();
    var codCarrera= $('#codCarrera').val();
    var unidadAcademica= $('#unidadAcademica').val();

//    valor = document.getElementById("campo").value;
    if( nombreCarrera == null || nombreCarrera.length == 0 || typeof(nombreCarrera)== undefined 
      //descripcion == null || descripcion.length == 0 || typeof(descripcion)== undefined
      ) {
     alertify.error('Debe llenar todos los campos');
    
        return false;
    }
    else{
      
    $.ajax({
      url: "php/FormCarrera/insertarCarrera.php",
      type: "post",
      dataType:"json",
      data: "codCarrera="+codCarrera+"&nombreCarrera="+nombreCarrera+"&unidadAcademica="+unidadAcademica,
      success: function (response){
      
      if(response.status==200){
        alertify.success(response.mensaje);
        $('#respuesta').html(response);
        $('#nombreCarrera').val("");
        $('#codCarrera').val("");
        $('#unidadAcademica').val(0);
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
