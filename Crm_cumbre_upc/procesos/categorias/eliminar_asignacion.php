<?php 

require_once "../../clases/Datos_clase.php";

$idCategoria = $_POST['idCategoria'];

$Categorias = new Categorias();
echo $Categorias->eliminaContacto($idCategoria);