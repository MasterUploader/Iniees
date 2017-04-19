<?php
session_start(); 
 if(isset($_SESSION['usuario'])) 
 { 
        
?>

<html>
<head>
	<meta charset="utf-8" />
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
	<script src="app/formularios/FormEntidad/FormEntidad.js"></script>
	<script src="app/formularios/FormInvestigadores/FormInvestigadores.js"></script>
  <script src="app/formularios/FormDocumento/FormDocPregrado/formPregrado.js"></script>
</head>
<body>

            <div class="modal-body" id="Inve">
              <form role="form">
                <div class="box-body">
                                    
                	<label >ID Investigador</label>
									<input class="form-control" type="text" id="IdInves1">
									<br>
									<label>Nombres</label>
									<input class="form-control" type="text" id="nombres1">
									<br>
									<label>Apellidos</label>
									<input class="form-control" type="text" id="apellidos1">
									<br>
									<label>Tipo Investigador</label>
									<select class="form-control" id="tipoInvestigador1">
										<option  value="0"> Seleccione </option>
									</select>
									<br>
				
                      <div class="box-footer" id="respuesta">
                          
                      </div>
                      <div class="box-footer">
                          <button type="button" class="btn btn-primary" id="guardarInves">Guardar Investigadores</button>
                      </div>
                  </div>   
               </form>
            </div>
</body>
</html>
<?php
}else{
  echo '<script> location.href= "error.html" </script>';
}
?>