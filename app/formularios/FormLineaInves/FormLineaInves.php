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
	<script src="app/formularios/FormLineaInves/FormLineaInves.js"></script>
</head>

<body>

 <div class="col-md-12">   

     <section class="content-header">
        <button type="submit" class="btn btn-success btn-ls" data-toggle="modal" data-target="#lineainves" align="right" >
        	  Linea Investigacion
        </button>
	 </section><br><br>
	 <!-- Tabla que muestra las entidades registradas -->
             <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lineas de Investigacion</h3>
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
                      	<button type="submit" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#lineainves">	Editar
                      	</button>
                      </td>
                  </table>
                </div>
              </div>


       <!--Formulario para agregar y editar-->      
        <div id="lineainves" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Linea Investigacion</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form">
                                <div class="box-body">
                                    <div class="form-group">
                                    <label>Nombre Linea Investigacion</label>
                                    <input type="text" class="form-control" id="nombreLinea" placeholder="Ingrese nombre">
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
                                </div>
                                <div class="box-footer" id="respuesta">
                                    
                                </div>
                                <div class="box-footer">
                                    <button type="button" class="btn btn-primary" id="guardarLineaInves">Guardar</button>
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