<?php
require_once "Conexion.php";
class Actividades extends Conexion {
    public function agregarActividades($datos){
        $conexcion = Conexion::conectar();

        $sql = "INSERT INTO `avtividades` (`actividad`,
                                             `resultado_llamada`,
                                              `fecha_sig_actividad`, 
                                              `tipo_actividad`, 
                                              `estado`,
                                               `descripcion`,
                                                `contacto_id`) 
                                                VALUES (?, ?, ?, ?, ?, ?, ?); ";
        $query = $conexcion->prepare($sql);
        $query->bind_param('iisiisi',
                                    $datos['actividad'],
                                    $datos['resultado_llamada'],
                                    $datos['fecha_siguiente'],
                                    $datos['tipo_actividad'],
                                    $datos['estado'],
                                    $datos['descripcion'],
                                    $datos['id_contacto']);
        $respuesta = $query->execute();
        return $respuesta;
    }
}

?>