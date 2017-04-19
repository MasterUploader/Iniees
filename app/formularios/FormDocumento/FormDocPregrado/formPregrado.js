$(document).ready(function(){

var tipoUsuario= sessionStorage.getItem('tipoUsuario');
var IdUsuario= sessionStorage.getItem('IdUsuario');
var IdEntidad= sessionStorage.getItem('IdEntidad');

cargarUnidadAcademica();
cargarLineaInvestigacion();
//cargarTipoDocumento();

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

/*
  function cargarTipoDocumento(){
           $.getJSON('php/FormDocumento/selecTipoDoc.php', function(data) {

            //alert(JSON.stringify(data));

             $.each(data, function( key, val ) {
                        $('#tipoDoc').append('<option value="'+val.CodTipoDocumento+'">'+ val.NombreTipoDoc+'</option>');
                });
            
        })
        .error(function(err) {
            error();
        })

     }
*/

function cargarLineaInvestigacion(){
           $.getJSON('php/FormDocumento/FormDocPregrado/selecLineaInvestigacion.php', function(data) {

            //alert(JSON.stringify(data));

             $.each(data, function( key, val ) {
                        $('#lineaInvestigacion').append('<option value="'+val.CodLineaInvestigacion+'">'+ val.NombreLinea+'</option>');
                });
            
        })
        .error(function(err) {
            error();
        })

     }
//metodo para agregar a la base de datos
// boton para agregar un documento pregrado
$('#guardarPregrado').click(function(){
    var codDoc= $('#codDoc').val();
    var tituloDoc= $('#tituloDoc').val();
    var nombreInvestigacion= $('#nombreInvestigacion').val();
    var fechaCreacion= $('#fechaCreacion').val();
    var fechaFinalizacion= $('#fechaFinalizacion').val();
    var unidadAcademica= $('#unidadAcademica').val();
    var lineaInvestigacion= $('#lineaInvestigacion').val();
    var descripcion= $('#descripcion').val();

//    valor = document.getElementById("campo").value;
    if( codDoc == null || codDoc.length == 0 || typeof(codDoc)== undefined ||
        tituloDoc == null || tituloDoc.length == 0 || typeof(tituloDoc)== undefined ||
        nombreInvestigacion == null || nombreInvestigacion.length == 0 || typeof(nombreInvestigacion)== undefined ||
        fechaCreacion== null || fechaCreacion.length == 0 || typeof(fechaCreacion)== undefined ||
        fechaFinalizacion== null || fechaFinalizacion.length == 0 || typeof(fechaFinalizacion)== undefined ||
        unidadAcademica== null || unidadAcademica.length == 0 || typeof(unidadAcademica)== undefined ||
        lineaInvestigacion== null || lineaInvestigacion.length == 0 || typeof(lineaInvestigacion)== undefined ||
        descripcion== null || descripcion.length == 0 || typeof(descripcion)== undefined
      ) 
    {
      alert('[ERROR] Debe llenar todos los campos');

        return false;
    }
    else{
      
    $.ajax({
      url: "php/FormDocumento/FormDocPregrado/insertarPregrado.php",
      type: "post",
      dataType:"json",
      data: "codDoc="+codDoc+"&tituloDoc="+tituloDoc+"&nombreInvestigacion="+nombreInvestigacion+"&descripcion="+descripcion+"&fechaCreacion="+fechaCreacion
            +"&fechaFinalizacion="+fechaFinalizacion+"&IdUsuario="+IdUsuario+"&IdEntidad="+IdEntidad+"&unidadAcademica="+unidadAcademica+"&lineaInvestigacion="+lineaInvestigacion
            ,
      success: function (response){
      if(response.status==200){
      
        alertify.success(response.mensaje);
        $('#respuesta').html(response);
        $('#codDoc').val("");
        $('#tituloDoc').val("");
        $('#nombreInvestigacion').val("");
        $('#fechaCreacion').val("");
        $('#fechaFinalizacion').val("");
        $('#unidadAcademica').val("");
        $('#lineaInvestigacion').val("");
        $('#descripcion').val("");
        //window.location.href='app/formularios/FormInvestigadores/FormInvestigadores.php';
        //window.load('#agregarInvestigadores');
        //$("#cargarformulario").load('app/formularios/FormInvestigadores/FormInvestigadores.php');  
        window.location.href='app/formularios/FormInvestigadores/FormInvestigadores.php';
        $('#agregarPregrado').hide();
        //$('#Inve').show();
      }
      else if(response.status==401){
        alertify.log(response.mensaje);
      }
      else{
        alertify.error(response.mensaje);
      }

      }
      ,
      error: function(jqXHR, textStatus, errorThrown) {
                   alertify.error('Ocurrio un error');
          }
      });
    }
 });

$('#guardarInves').click(function(){

});
  
  $('#cerrar').click(function(){
        $('#codDoc').val("");
        $('#tituloDoc').val("");
        $('#nombreInvestigacion').val("");
        $('#fechaCreacion').val("");
        $('#fechaFinalizacion').val("");
        $('#unidadAcademica').val("");
        $('#lineaInvestigacion').val("");
        $('#descripcion').val("");
        
  });

})
