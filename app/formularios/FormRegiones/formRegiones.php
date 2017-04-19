<?php
session_start(); 
 if(isset($_SESSION['usuario'])) 
 { 
        
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<meta charset="utf-8" />
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
	<!--<script src="app/formularios/FormEntidad/FormEntidad.js"></script>-->

	
	<script src="app/formularios/FormRegiones/formRegiones.js"></script>
	
</head>

<body>

 <div class="col-md-12">   

     <section class="content-header">
        <button type="submit" class="btn btn-success btn-ls" data-toggle="modal" data-target="#agregarRegion" align="right" >
        	  Agregar Region
        </button>
	 </section><br><br>
	 <!-- Tabla que muestra las entidades registradas -->
             <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Entidades</h3>
                </div>
                <div class="box-body no-padding">
                  <table class="table table-bordered table-hover table-striped" id="tablaEntidades">
                   <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Descripcion</th>
                      <th>Estado</th>
                      <th>Opciones</th>
                    </tr>
                    </thead> 
                    <tr>
                      <td>Escuelas</td>
                      <td>Descripccion</td>
                      <td>Activo</td>                     
                      <td>
                      	<button type="submit" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#agregarRegion">	Editar
                      	</button>
                      </td>
                  </table>
                </div>
              </div>


       <!--Formulario para agregar y editar-->      
        <div id="agregarRegion" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Region Entidad</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form">
                                <div class="box-body">
                                    <div class="form-group">
                                    <!--
                                    <label>Nombre Entidad</label>
                                    <input type="text" class="form-control" id="nombre_entidad" placeholder="Ingrese nombre">
                                    <label>Descripción</label>
                                    <textarea type="text" class="form-control" id="descripcion" placeholder="Ingrese descripción"></textarea>
                                    </div>
                                
                                
                                <label>Estado</label>
                                    <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> Activo
                                    </label>
                                    <label>
                                        <input type="checkbox"> Inactivo
                                    </label>
                                    </div>
                                    -->
                                </div>
                <label>Entidades</label>
									<select class="form-control" id="entidades">
										<option  value="0"> Seleccione </option>
									</select>
									<br>
								<label>Departamento</label>
									<select class="form-control" id="departamento">
										<option value="0">Seleccione</option>
									</select>
									<br>
								<label>Municipio</label>
									<select class="form-control" id="municipio">
										<option value="0">Seleccione</option>
									</select>
									<br>
								<label>Direccion</label> 
									<br>
										<textarea class="form-control" id="direccion" rows="4" cols="50"></textarea>
										<br>
                                <div class="box-footer" id="respuesta">
                                    
                                </div>
                                <div class="box-footer">
                                    <button type="button" class="btn btn-primary" id="guardar">Guardar</button>
                                </div>
                         </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="cerrar">Cerrar</button>
                    </div>
                    </div>

                </div>
        </div>
</div>
<script src="js/dataTables/jquery.dataTables.min.js"></script>
</body>
</html>	
<?php
}else{
  echo '<script> location.href= "error.html" </script>';
}
?>