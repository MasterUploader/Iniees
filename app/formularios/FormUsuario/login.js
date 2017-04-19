$(document).ready(function() {
  $("#ingresar").click(function() {
  var nombreUsuario=$('#nombreUsuario').val();
  var contrasena=$('#contrasena').val();
  
     if(nombreUsuario=='' || contrasena==''){
      $('#res').html('');
      $('#res').append('<font color="red"> Complete todo Los Campos</font>');
     
     }else{
         $.ajax({
                 url: "php/FormDocumento/FormInicioSesion/selecInicioSesion.php",
                 type: "post",
                 
                 data: "nombreUsuario="+nombreUsuario+"&contrasena="+contrasena,
                 dataType:"json",
                success: function (response){
                //alert( response.data[0].CodTipoUsuario);
                //alert(JSON.stringify(response));

                    if (response.status==200 && response.data!=null ) {
                        //alertify.success(response.mensaje);
                        //$('#administracion').attr('display', 'block');
                        sessionStorage.setItem('tipoUsuario', response.data[0].CodTipoUsuario);
                        sessionStorage.setItem('IdEntidad', response.data[0].IdEntidad);
                        sessionStorage.setItem('IdUsuario', response.data[0].IdUsuario);
                        //var prueba= response.data[0].CodTipoUsuario;
                        window.location.href='index.php';
                        //$('#administracion').hide();
                    }
                    else if(response.status==401) {
                        alertify.log(response.mensaje);
                      }
                      else{
                          alertify.error(response.mensaje);

                      }
                    },
                   error: function(jqXHR, textStatus, errorThrown) {
                           alertify.error('Ocurrio un error'+textStatus+errorThrown+jqXHR);
                    }
              });
     
     }
        
       

  });
      
});      