<?php
include('../../conexion.php');
$respuesta= array();

if (isset($_POST['codDoc']) && isset($_POST['tituloDoc']) && isset($_POST['nombreInvestigacion']) 
		&& isset($_POST['descripcion']) && isset($_POST['fechaCreacion']) && isset($_POST['fechaFinalizacion']) 
		&& isset($_POST['unidadAcademica']) && isset($_POST['lineaInvestigacion']) && isset($_POST['monto']) 
		){

	$codDoc=$_POST['codDoc'];
	$tituloDoc= $_POST['tituloDoc'];
	$nombreInvestigacion= $_POST['nombreInvestigacion'];
	$fechaCreacion= $_POST['fechaCreacion'];
	$fechaFinalizacion= $_POST['fechaFinalizacion'];
	$unidadAcademica= $_POST['unidadAcademica'];
	$lineaInvestigacion= $_POST['lineaInvestigacion'];
	$descripcion= $_POST['descripcion'];
	$monto= $_POST['monto'];
	$CodEntidad= $_POST['IdEntidad'];
	$IdUsuario= $_POST['IdUsuario'];


	$query2= "select count(*) res from documento where CodDocumento= '$codDoc'";

	if ($result = mysqli_query($link, $query2)) {

		    //$newArr = array();
		    while ($db_field = mysqli_fetch_assoc($result)) {
		        $newArr[] = $db_field;
		    }
		    if (($newArr[0]['res'])>0) {
				$respuesta["status"]=402;
				$respuesta["mensaje"]='El Codigo ya existe';
			}
         	else{


				$query= mysqli_query($link, "INSERT INTO documento (CodDocumento, TituloDocumento, NombreInvestigacion, Descripcion, 							FechaCreacion, FechaFinalizacion, MontoFinanciado, IdUsuario, CodEntidad, CodUnidadAcademica, CodLineaInvestigacion, CodTipoDocumento) 
									values
										('$codDoc','$tituloDoc', '$nombreInvestigacion', '$descripcion', '$fechaCreacion',
										'$fechaFinalizacion', '$monto',  '$IdUsuario', '$CodEntidad', '$unidadAcademica', '$lineaInvestigacion', '3')"
									);
				if ($query==true) {
					//echo json_encode($newArr);
					//echo "Se agrego correctamente";
					//$respuesta= array('status' => 200,'mensaje'=>'Se agrego correctamente' );
					$respuesta["status"]=200;
					$respuesta["mensaje"]='Se agrego correctamente';
				}
				else{
					//echo "Ocurrio un error";
					//$respuesta=array('status' => 500,'mensaje'=>'ocurrio un error' );
					$respuesta["status"]=500;
					$respuesta["mensaje"]='Ocurrio un error';

				}
			}

	}

	else{
		$respuesta["status"]=402;
		$respuesta["mensaje"]='No se pudo verificar si el Codigo Existe';
	}

}
else{
		//echo "Valores Requeridos";
				//$respuesta=array('status' => 402,'mensaje'=>'Completar Campos' );
		   $respuesta["status"]=402;
			$respuesta["mensaje"]='Complete todos los campos';
	
}
echo json_encode($respuesta);