$(document).ready(function(){

 cargarTipoDoc();
 //$("#formularioPregrado").hide();
  
  function cargarTipoDoc(){
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

      function error(){
     	alert('ocurio un error');
     }

     $('#tipoDoc').change(function(){
   		var CodTipoDocumento= $('#tipoDoc').val();
   		//alert(codDepartamento);
   		
      if (CodTipoDocumento==1) {
   			CargarFormPostgrado();
   		}
   		if (CodTipoDocumento==2) {
   			CargarFormPregrado();
   		}
   		
   });

     function CargarFormPregrado(){
     	$("#cargarformulario").load('app/formularios/FormDocumento/FormDocPregrado/formPregrado.php');	
     }
     function CargarFormPostgrado(){
     	$("#cargarformulario").load('app/formularios/FormDocumento/FormPostgrado/FormPostgrado.php');	
     }
  

})