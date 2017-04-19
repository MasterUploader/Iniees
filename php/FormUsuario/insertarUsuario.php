<?php
include('../conexion.php');
$respuesta= array();

if (isset($_POST['nombreUsuario'])  && isset($_POST['correo'])) {
	$nombreUsuario=$_POST['nombreUsuario'];
	$tipoUsuario= $_POST['tipoUsuario'];
	//$cargo= $_POST['cargo'];
	$correo= $_POST['correo'];
	$entidades= $_POST['entidades'];
	$contrasena= $_POST['contrasena'];
	$usuarioId= $_POST['usuarioId'];


	$query= mysqli_query($link, "INSERT INTO usuario(IdUsuario, NombreUsuario, IdEntidad, Correo, CodTipoUsuario, contrasena)
									 values('$usuarioId', '$nombreUsuario', '$entidades', '$correo', '$tipoUsuario' ,'$contrasena' )"
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
