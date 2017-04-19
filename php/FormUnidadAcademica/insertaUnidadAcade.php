<?php
include('../conexion.php');
$respuesta= array();

if (isset($_POST['nombreUnidad']) && isset($_POST['codUnidad']) && isset($_POST['descripcion'])) {
	$nombreUnidad=$_POST['nombreUnidad'];
	$codUnidad= $_POST['codUnidad'];
	$descripcion= $_POST['descripcion'];
	//$codLocalidad= $_POST['region'];

	$query2= "select count(*) res from unidad_academica where CodUnidadAcademica= '$codUnidad'";

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


				$query= mysqli_query($link, "INSERT INTO unidad_academica(CodUnidadAcademica, Nombre, Descripcion)
												 values('$codUnidad', '$nombreUnidad','$descripcion')"
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