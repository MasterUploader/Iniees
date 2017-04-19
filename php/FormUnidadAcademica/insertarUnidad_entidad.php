<?php
include('../conexion.php');
$respuesta= array();

//$codUnidad= $_POST['codUnidad'];

//if (isset($_POST['entidades']) && isset($_POST['unidadesAcademicas'])) {
	$entidades=$_POST['entidades'];
	$unidadesAcademicas=$_POST['unidadesAcademicas'];
	//$descripcion= $_POST['descripcion'];
	//$codLocalidad= $_POST['region'];
	$query2= "select count(*) res from unidades_entidad where CodUnidadAcademica= '$unidadesAcademicas'
				and CodEntidad='$entidades'";

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

				$query= mysqli_query($link, "INSERT INTO unidades_entidad(CodUnidadAcademica, CodEntidad)
												 values('$unidadesAcademicas', '$entidades')"
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
	
echo json_encode($respuesta);