<?php 

	require_once "../../clases/colegios.php";
	$Contactos = new Colegio();

	$datos = array(
				"tipo" => $_POST['tipo_colegio2'],
				"nombre" => $_POST['nombre_colegio2'],
				"encargada" => $_POST['encargada2'],
				"telefono" => $_POST['telefono_cole2'],
				"telefono_oficina" => $_POST['telefono_o2'],
				"direccion" => $_POST['direccion2'],
				"descripcion"=> $_POST['descripcion_colegio2'],
				"idContacto" => $_POST['idColegio'],
					);

	echo $Contactos->actualizarColegio($datos);
 ?>