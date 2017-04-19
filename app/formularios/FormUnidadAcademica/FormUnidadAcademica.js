$(document).ready(function(){

CargarEntidad();
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



$('#guardarUnidad').click(function(){
    var nombreUnidad= $('#nombreUnidad').val();
    var codUnidad= $('#codUnidad').val();
    var descripcion= $('#descripcion').val();
    var entidades= $('#entidades').val();

//    valor = document.getElementById("campo").value;
    if( nombreUnidad == null || nombreUnidad.length == 0 || typeof(nombreUnidad)== undefined ||
        codUnidad == null || codUnidad.length == 0 || typeof(codUnidad)== undefined
      //descripcion == null || descripcion.length == 0 || typeof(descripcion)== undefined
      ) {
     alertify.error('Debe llenar todos los campos');
    
        return false;
    }
    else{
   
   //   inserta en tabla de unidad academica
    $.ajax({
      url: "php/FormUnidadAcademica/insertaUnidadAcade.php",
      type: "post",
      dataType:"json",
      data: "codUnidad="+codUnidad+"&nombreUnidad="+nombreUnidad+"&descripcion="+descripcion,
      success: function (response){
      //var estado= response.status;
      if(response.status==200){
        alertify.success(response.mensaje);
        $('#respuesta').html(response);
        $('#nombreUnidad').val("");
        $('#codUnidad').val("");
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

    /*/inserta en unidades_entidad
    
      $.ajax({
      url: "php/FormUnidadAcademica/insertarUnidad_entidad.php",
      type: "post",
      dataType:"json",
      data: "codUnidad="+codUnidad+"&entidades="+entidades,
      success: function (response){
      
      if(response.status==200){
        alertify.success(response.mensaje);
        $('#entidades').val(0);
      }
      else if(response.status==402){
        alertify.log(response.mensaje);
      }
      else{
        alertify.error(response.mensaje);
      }
        /*$('#respuesta').html(response);
        $('#nombre_entidad').val("");
        $('#descripcion').val("");
          alertify.success("Visita nuestro <a href=\"http://blog.reaccionestudio.com/\" style=\"color:white;\" target=\"_blank\"><b>BLOG.</b></a>");
        
      },
      error: function(jqXHR, textStatus, errorThrown) {
                         alertify.error('Ocurrio un error');
              }
      });
      */
    //}
    }
 });


})
