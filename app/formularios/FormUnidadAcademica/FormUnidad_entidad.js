$(document).ready(function(){

//var CodUnidad= sessionStorage.getItem('codUnidad');
CargarEntidad();
CargarUnidadAcademica();

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

function CargarUnidadAcademica(){
      $.getJSON('php/FormUnidadAcademica/selecUnidadAcademica.php', function(data) {

            //alert(JSON.stringify(data));

             $.each(data, function( key, val ) {
                        $('#unidadesAcademicas').append('<option value="'+val.CodUnidadAcademica+'">'+ val.Nombre+'</option>');
                });
            
        })
        .error(function(err) {
            error();
        })
}


$('#guardarUnidadEntidad').click(function(){
    var unidadesAcademicas= $('#unidadesAcademicas').val();
    var entidades= $('#entidades').val();

//    valor = document.getElementById("campo").value;
    if( entidades == null || entidades.length == 0 || typeof(entidades)== undefined ||
        unidadesAcademicas == null || unidadesAcademicas.length == 0 || typeof(unidadesAcademicas)== undefined
      ) {
     alertify.error('Debe llenar todos los campos');
    
        return false;
    }
    else{
   
   
    //inserta en unidades_entidad
   
      $.ajax({
      url: "php/FormUnidadAcademica/insertarUnidad_entidad.php",
      type: "post",
      dataType:"json",
      data: "unidadesAcademicas="+unidadesAcademicas+"&entidades="+entidades,
      success: function (response){
      //alert(JSON.stringify(response));
      if(response.status==200){
        $('#entidades').val(0);
        $('#unidadesAcademicas').val(0);
        alertify.success(response.mensaje);
        //$('#entidades').val(0);
      }
      else if(response.status==402){
        alertify.log(response.mensaje);
      }
      else{
        alertify.error(response.mensaje);
      }
      /*
        $('#respuesta').html(response);
        $('#nombre_entidad').val("");
        $('#descripcion').val("");
          alertify.success("Visita nuestro <a href=\"http://blog.reaccionestudio.com/\" style=\"color:white;\" target=\"_blank\"><b>BLOG.</b></a>");
        */
      },
      error: function(jqXHR, textStatus, errorThrown) {
                         alertify.error('Ocurrio un error');
              }
      });
      
    //}
    }
 });


})
