<?php 
	require_once "../../clases/Datos_clase.php";

	$datos = array(
				"nombre" => $_POST['nombreCategoria'],
				
					);
	$Categorias = new Categorias();
	echo $Categorias->agregarCategoria($datos);
 ?>