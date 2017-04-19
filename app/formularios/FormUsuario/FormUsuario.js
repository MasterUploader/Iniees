$(document).ready(function(){

CargarEntidad();
CargarTipoUsuario();

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

   function CargarTipoUsuario(){
           $.getJSON('php/FormUsuario/selecTipoUsuario.php', function(data) {

            //alert(JSON.stringify(data));

             $.each(data, function( key, val ) {
                        $('#tipoUsuario').append('<option value="'+val.CodTipoUsuario+'">'+ val.NombreTipoUsuario+'</option>');
                });
            
        })
        .error(function(err) {
            error();
        })

     }  



$('#guardarUsuario').click(function(){
    var nombreUsuario= $('#nombreUsuario').val();
    var tipoUsuario= $('#tipoUsuario').val();
    var correo= $('#correo').val();
    var entidades= $('#entidades').val();
    var contrasena= $('#contrasena').val();
    var usuarioId= $('#usuarioId').val();

//    valor = document.getElementById("campo").value;
    if( nombreUsuario == null || nombreUsuario.length == 0 || typeof(nombreUsuario)== undefined ||
        tipoUsuario == null || tipoUsuario.length == 0 || typeof(tipoUsuario)== undefined 
      //descripcion == null || descripcion.length == 0 || typeof(descripcion)== undefined
      ) {
     alertify.error('Debe llenar todos los campos');
    
        return false;
    }
    else{
   
   //   inserta en tabla de unidad academica
    $.ajax({
      url: "php/FormUsuario/insertarUsuario.php",
      type: "post",
      dataType:"json",
      data: "usuarioId="+usuarioId+"&nombreUsuario="+nombreUsuario+"&tipoUsuario="+tipoUsuario+"&correo="+correo+"&entidades="+entidades+"&contrasena="+contrasena,
      success: function (response){
      alert(JSON.stringify(response));
      if(response.status==200){
        alertify.success(response.mensaje);
        $('#respuesta').html(response);
        $('#nombreUsuario').val("");
        $('#tipoUsuario').val("");
        $('#correo').val("");
        $('#entidades').val("");
        $('#contrasena').val("");
        $('#usuarioId').val("");
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
