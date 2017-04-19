<?php
include('../conexion.php');
$respuesta= array();

if (isset($_POST['nombreLinea']) && isset($_POST['descripcion'])) {
	$nombreLinea=$_POST['nombreLinea'];
	$descripcion= $_POST['descripcion'];
	//$codLocalidad= $_POST['region'];

	$query= mysqli_query($link, "INSERT INTO linea_investigacion(NombreLinea, Descripcion)
									 values('$nombreLinea','$descripcion')"
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
else{
	//echo "Valores Requeridos";
			//$respuesta=array('status' => 402,'mensaje'=>'Completar Campos' );
	   $respuesta["status"]=401;
		$respuesta["mensaje"]='Complete todos los campos';

}

echo json_encode($respuesta);
