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
	<script src="app/formularios/FormUsuario/FormUsuario.js"></script>
</head>

<body>

 <div class="col-md-12">   

     <section class="content-header">
        <button type="submit" class="btn btn-success btn-ls" data-toggle="modal" data-target="#usuario" align="right" >
        	  Nuevo Usuario
        </button>
	 </section><br><br>
	 <!-- Tabla que muestra las entidades registradas -->
             <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Usuarios</h3>
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
                      	<button type="submit" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#usuario">	Editar
                      	</button>
                      </td>
                  </table>
                </div>
              </div>


       <!--Formulario para agregar y editar-->      
        <div id="usuario" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Nuevo Usuario</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form">
                                <div class="box-body">
                                    <div class="form-group">
                                    <label>ID Usuario</label>
                                        <input type="text" class="form-control" id="usuarioId" placeholder="Ingrese nombre">
                                      <br>
                                      <label>Entidad</label>
                                        <select class="form-control" id="entidades">
                                          <option  value="0"> Seleccione </option>
                                        </select>
                                      <br>
                                      <label>Nombre Usuario</label>
                                      <input type="text" class="form-control" id="nombreUsuario" placeholder="Ingrese nombre">
                                      <br>
                                      <label>Contrasena</label>
                                      <input type="password" class="form-control" id="contrasena" placeholder="Ingrese contrasena">
                                      <br>
                                      <label>Tipo Usuario</label>
                                        <select class="form-control" id="tipoUsuario">
                                          <option  value="0"> Seleccione </option>
                                        </select>
                                      <br>
                                      <label>Correo</label>
                                      <input type="email" class="form-control" id="correo" placeholder="ejemplo@dominio.com">
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
                                </div>
                                <div class="box-footer" id="respuesta">
                                    
                                </div>
                                <div class="box-footer">
                                    <button type="button" class="btn btn-primary" id="guardarUsuario">Guardar</button>
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