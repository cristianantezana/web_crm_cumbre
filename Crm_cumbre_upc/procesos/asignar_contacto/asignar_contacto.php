<?php
require_once "../../clases/asignar.php";

$usuario = $_POST['id_usuario'];
$usuarioo = new Usuario();

echo json_encode($usuarioo->obtenerDatosUsuario($usuario));
// include('../../clases/conex.php');

// $a= $_POST['id_usuario'];

// foreach ($idRegistros as $Registro) {

// $DeleteRegistro = ("INSERT INTO `asignado` (`id`, `contacto_id`, `usuario_id`) VALUES (NULL, $Registro , $a);");
// mysqli_query($con, $DeleteRegistro); 

// } 

?>