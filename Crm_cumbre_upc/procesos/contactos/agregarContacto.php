<?php 

	require_once "../../clases/Contactos.php";
	$Contactos = new Contactos();

	$datos = array(
				
				"nombre" => $_POST['nombre'],
				"apellido" => $_POST['apellido'],
				"parentesco" => $_POST['parentesco'],
				"colegio" => $_POST['colegio'],
				"telefono" => $_POST['telefono'],
				"carrera" => $_POST['carrera_interesada'],
				"estado" => $_POST['estado'],
				"turno_llamada" => $_POST['turno_llamada'],
				"tipo_colegio" => $_POST['tipo_colegio'],
				"segunda_carrera" => $_POST['segunda_carrera'],
				"dato" => $_POST['dato'],
				"telefono_padre" => $_POST['telefono_padre'],
				"tipo" => $_POST['tipo'],
				"descripcion" => $_POST['descripcion']
				
					);

	echo $Contactos->agregarContacto($datos);
 ?>