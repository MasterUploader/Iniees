<?php
session_start();
include('../../conexion.php');

if(isset($_POST['nombreUsuario']) && isset($_POST['contrasena'])){
	$nombreUsuario= $_POST['nombreUsuario'];
	$contrasena= $_POST['contrasena'];

$respuesta= array();

$query= "select IdUsuario, NombreUsuario, CodTipoUsuario, IdEntidad from usuario where NombreUsuario='$nombreUsuario' and contrasena='$contrasena'";
//$result = mysqli_query($link, $query);

//$query=mysql_query("select count(*) from usuario where NombreUsuario='$nombreUsuario' and contrasena='$contrasena'");
//$res=mysql_fetch_array($query);
if ($result = mysqli_query($link, $query)) {

	$newArr = array();
    while ($db_field = mysqli_fetch_assoc($result)) {
        $newArr[] = $db_field;
    }
     
}

//else{
//	echo "ingresar todos los datos";
//
if (count($newArr)==1) {
		//echo json_encode($newArr);
		//echo "Se agrego correctamente";
		//$respuesta= array('status' => 200,'mensaje'=>'Se agrego correctamente' );
		$respuesta["status"]=200;
		$respuesta["mensaje"]='El usuario existe';
		$respuesta["data"]= $newArr;	
		//$respuesta["user"]= $newArr[0]['NombreUsuario'];
		$_SESSION["usuario"] = $newArr[0]['NombreUsuario'];

  }
	else if( count($newArr)==0){
		//echo "Ocurrio un error";
		//$respuesta=array('status' => 500,'mensaje'=>'ocurrio un error' );
		$respuesta["status"]=401;
		$respuesta["mensaje"]='Datos invalidos o el usuario no existe ';
		$respuesta["data"]= null;

	}
	else{
		$respuesta["status"]=500;
		$respuesta["mensaje"]='Ocurrio un error';
		$respuesta["data"]= null;
	}
}
else{
	//echo "Valores Requeridos";
			//$respuesta=array('status' => 402,'mensaje'=>'Completar Campos' );
	   $respuesta["status"]=401;
		$respuesta["mensaje"]='Complete todos los campos';
		$respuesta["data"]= null;

}

echo json_encode($respuesta);
