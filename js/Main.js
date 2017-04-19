$(document).ready(function(){
   var tipoUsuario= sessionStorage.getItem('tipoUsuario');
   //alert(tipoUsuario);
  
   //prueba
      if(tipoUsuario!=1){
         $('#administracion').css('display', 'none');  

      }
   //
   
      $('#cargarEntidad').click(function(){
               $('#cargarPaginas').load('app/formularios/FormEntidad/FormEntidad.php');
      });
   
      $('#regionEntidad').click(function(){
               $('#cargarPaginas').load('app/formularios/FormRegiones/formRegiones.php');
      });
   
      $('#docPostgrado').click(function(){
       
            $('#cargarPaginas').load('app/formularios/FormDocumento/FormPostgrado/FormPostgrado.php');
      });
   
      $('#docPregrado').click(function(){
            $('#cargarPaginas').load('app/formularios/FormDocumento/FormDocPregrado/formPregrado.php');
      });
   
      $('#docInves').click(function(){
            $('#cargarPaginas').load('app/formularios/FormDocumento/FormDocInstitucional/FormDocInstitucional.php');
      });
   
      $('#docInter').click(function(){
            $('#cargarPaginas').load('app/formularios/FormDocumento/FormDocInterIns/FormDocInterIns.php');
      });
   
      $('#entPatrocinadora').click(function(){
            $('#cargarPaginas').load('app/formularios/FormEntPatrocinadora/FormEntPatrocinadora.php');
      });
   
      $('#lineaInves').click(function(){
            $('#cargarPaginas').load('app/formularios/FormLineaInves/FormLineaInves.php');
      });   
   
      $('#carrera').click(function(){
            $('#cargarPaginas').load('app/formularios/FormCarrera/FormCarrera.php');
      });   
   
      $('#unidadAca').click(function(){
            $('#cargarPaginas').load('app/formularios/FormUnidadAcademica/FormUnidadAcademica.php');
      });  

      $('#entidadUni').click(function(){
            $('#cargarPaginas').load('app/formularios/FormUnidadAcademica/FormUnidadEntidad.php');
      });
   
      $('#registrUsuario').click(function(){
            $('#cargarPaginas').load('app/formularios/FormUsuario/FormUsuario.php');
      });  
      

})