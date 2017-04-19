$(document).ready(function(){

//**cargar variables globales en el navegador
var tipoUsuario= sessionStorage.getItem('tipoUsuario');
var IdUsuario= sessionStorage.getItem('IdUsuario');
var IdEntidad= sessionStorage.getItem('IdEntidad');

cargarUnidadAcademica();
cargarLineaInvestigacion();
cargarEntidadPatrociandora();

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

function cargarEntidadPatrociandora(){
           $.getJSON('php/FormDocumento/FormDocPregrado/selecEntidadPatrocinadora.php', function(data) {

            //alert(JSON.stringify(data));

             $.each(data, function( key, val ) {
                        $('#entidadPatrocinadora').append('<option value="'+val.CodEntidadPatrocinadora+'">'+ val.NombreEntidad+'</option>');
                });
            
        })
        .error(function(err) {
            error();
        })

     }

// boton para agregar un documento postgrado
// boton para agregar un documento pregrado
$('#guardarPostgrado').click(function(){
    var codDoc= $('#codDoc').val();
    var tituloDoc= $('#tituloDoc').val();
    var nombreInvestigacion= $('#nombreInvestigacion').val();
    var fechaCreacion= $('#fechaCreacion').val();
    var fechaFinalizacion= $('#fechaFinalizacion').val();
    var unidadAcademica= $('#unidadAcademica').val();
    var lineaInvestigacion= $('#lineaInvestigacion').val();
    var descripcion= $('#descripcion').val();
    var monto= $('#monto').val();

//    valor = document.getElementById("campo").value;
    if( codDoc == null || codDoc.length == 0 || typeof(codDoc)== undefined ||
        tituloDoc == null || tituloDoc.length == 0 || typeof(tituloDoc)== undefined ||
        nombreInvestigacion == null || nombreInvestigacion.length == 0 || typeof(nombreInvestigacion)== undefined ||
        fechaCreacion== null || fechaCreacion.length == 0 || typeof(fechaCreacion)== undefined ||
        fechaFinalizacion== null || fechaFinalizacion.length == 0 || typeof(fechaFinalizacion)== undefined ||
        unidadAcademica== null || unidadAcademica.length == 0 || typeof(unidadAcademica)== undefined ||
        lineaInvestigacion== null || lineaInvestigacion.length == 0 || typeof(lineaInvestigacion)== undefined ||
        descripcion== null || descripcion.length == 0 || typeof(descripcion)== undefined ||
        monto== null || monto.length == 0 || typeof(monto)== undefined
      ) 
    {
        alert('debe llenar');
    }
    else{
      
    $.ajax({
      url: "php/FormDocumento/FormDocPregrado/insertarPostgrado.php",
      type: "post",
      dataType:"json",
      data: "codDoc="+codDoc+"&tituloDoc="+tituloDoc+"&nombreInvestigacion="+nombreInvestigacion+"&descripcion="+descripcion+"&fechaCreacion="+fechaCreacion
            +"&fechaFinalizacion="+fechaFinalizacion+"&monto="+monto+"&IdUsuario="+IdUsuario+"&IdEntidad="+IdEntidad+"&unidadAcademica="+unidadAcademica+"&lineaInvestigacion="+lineaInvestigacion
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
        $('#monto').val("");
        //falta hacer el formulario
        $('#entidadPatrocinadora').val("");
      }
      else if(response.status==401){
        alertify.log(response.mensaje);
      }
      else{
        alertify.error(response.mensaje);
      }

      },
      error: function(jqXHR, textStatus, errorThrown) {
             alertify.error('Ocurrio un error');
        }
      });
    }
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
        $('#monto').val("");
        //falta hacer el formulario
        $('#entidadPatrocinadora').val("");
  });
  
})
