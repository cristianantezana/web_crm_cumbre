<?php 

require_once "../../clases/colegios.php";

$idColegio = $_POST['idColegio'];
$Colegio = new Colegio();

echo json_encode($Colegio->obtenerDatosColegio($idColegio));
