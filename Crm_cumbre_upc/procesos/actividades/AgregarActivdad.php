<?php
require_once "../../clases/actividades.php";
$actividad  = new Actividades();
$datos = array(
        "id_contacto" => $_POST['id_contactoo'],
        "actividad"  => $_POST['select_actividad'],
        "resultado_llamada" => $_POST['select_resultad_llamada'],
        "fecha_siguiente" => $_POST['fecha'], 
        "tipo_actividad" => $_POST['select_tipo_actividad'],
        "estado" => $_POST['select_estadoo'],
        "descripcion" => $_POST['descripcion_actividad']
);

echo $actividad->agregarActividades($datos);
?>