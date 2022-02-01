<?php
require_once "clases/Conexion.php";
$con = new Conexion();
$conexion = $con->conectar();

$idRegistros = $_REQUEST['ids_array'];
$id = $_POST['id'];

foreach ($idRegistros as $Registro) {
	$sql = ("INSERT INTO `asignado` (`id`, `contacto_id`, `usuario_id`) VALUES (NULL, $Registro , $id);");
	$result = mysqli_query($conexion, $sql);
}
