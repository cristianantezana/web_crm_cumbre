<?php 

	require_once "../../clases/Contactos.php";
	$Contactos = new Contactos();

	$datos = array(
		"idContacto" => $_POST['idContacto2'],
		"nombre" => $_POST['nombre2'],
		"apellido" => $_POST['apellido2'],
		"parentesco" => $_POST['idCategoriaSelectU'],
		"colegio" => $_POST['colegio2'],
		"telefono" => $_POST['telefono2'],
		"carrera" => $_POST['carrera2'],
		"estado" => $_POST['instancia2'],
		"turno_llamada" => $_POST['Turno2'],
		"tipo_colegio" => $_POST['tipo_colegio2'],
		"segunda_carrera" => $_POST['segunda_carrera2'],
		"dato" => $_POST['dato2'],
		"telefono_padre" => $_POST['telefono_padre2'],
		"tipo" => $_POST['tipo2'],
		"descripcion" => $_POST['descripcion2'],
		
			);

	echo $Contactos->actualizarContacto($datos);
 ?>