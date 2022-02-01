<?php 

	require_once "../../clases/colegios.php";
	$Contactos = new Colegio();

	$datos = array(
				"tipo" => $_POST['tipo_colegio'],
				"nombre" => $_POST['nombre_colegio'],
				"encargada" => $_POST['encargada'],
				"telefono" => $_POST['telefono_cole'],
				"telefono_oficina" => $_POST['telefono_o'],
				"direccion" => $_POST['direccion'],
				"descripcion"=> $_POST['descripcion_colegio']

					);

	echo $Contactos->agregarColegio($datos);
 ?>