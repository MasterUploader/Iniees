<?php
include('../conexion.php');
$respuesta= array();

if (isset($_POST['municipio']) && isset($_POST['direccion'])) {
	$entidades=$_POST['entidades'];
	$municipio= $_POST['municipio'];
	$direccion= $_POST['direccion'];

	$query= mysqli_query($link, "INSERT INTO localidad (Direccion, CodMunicipio, CodEntidad) 
								  values ('$direccion','$municipio', '$entidades')");
	
	//falta agregar la region y la entidad a la table localidad_entidad
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