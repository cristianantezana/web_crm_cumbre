<?php 

	require_once "../../clases/Datos_clase.php";

	$datos = array(
				"idCategoria" => $_POST['idCategoria'],
				"nombre" => $_POST['nombreCategoriaU']
				);
	$Categorias = new Categorias();
	echo $Categorias->actualizarCategoria($datos);
 ?>