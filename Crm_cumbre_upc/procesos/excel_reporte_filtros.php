<?php

    header("content-type: application/xls");
    header("content-Disposition: attachment; filename=Reportes.xls");
?>
<?php
require_once "../clases/Conexion.php";
    $objCon = new Conexion();
    $conexion = $objCon->conectar();
    $dato = $_GET['no'];
    $usuario = $_GET['no2'];
    $instancia = $_GET['no3'];
    $f_inicial = $_GET['no4'];
    $f_final = $_GET['no5'];
    $incial = $f_inicial . ' 00:00:00';
    $final = $f_final . ' 23:59:59';
    
    $where= " WHERE c.id_usuario = $usuario AND o.id_dato= $dato AND c.created_at BETWEEN '$incial' AND '$final' ";

    if (($_GET['no3'] == 0) && ($_GET['no'] ==0)) {
      
        $sql="SELECT c.id_contacto,u.nombre AS propietario, c.nombre,c.apellido,c.telefono,c.created_at,o.datos,i.instancia 
        FROM `contactos` c INNER JOIN origen_dato o ON c.origen_contacto = o.id_dato INNER JOIN instancias i 
        ON c.instancia = i.id_instancia INNER JOIN usuario_cumbre u ON c.id_usuario = u.id_usuario 
        WHERE c.id_usuario = $usuario AND c.created_at BETWEEN '$incial' AND '$final'";
        $result = mysqli_query($conexion, $sql);
    } else if ($_GET['no'] == 0) {
        $sql = "SELECT c.id_contacto,u.nombre AS propietario, c.nombre,c.apellido,c.telefono,c.created_at,o.datos,i.instancia FROM `contactos` c INNER JOIN origen_dato o ON c.origen_contacto = o.id_dato INNER JOIN instancias i ON c.instancia = i.id_instancia INNER JOIN usuario_cumbre u ON c.id_usuario = u.id_usuario WHERE c.id_usuario = $usuario AND i.id_instancia = $instancia  AND c.created_at BETWEEN '$incial' AND '$final'";
        $result = mysqli_query($conexion, $sql);

    } else if ( $_GET['no3'] ==0){
       

        $sql="SELECT c.id_contacto,u.nombre AS propietario, c.nombre,c.apellido,c.telefono,c.created_at,o.datos,i.instancia FROM `contactos` c INNER JOIN origen_dato o ON c.origen_contacto = o.id_dato INNER JOIN instancias i ON c.instancia = i.id_instancia INNER JOIN usuario_cumbre u ON c.id_usuario = u.id_usuario WHERE c.id_usuario = $usuario AND  o.id_dato= $dato AND c.created_at BETWEEN '$incial' AND '$final'";

    }else

        $sql = "SELECT c.id_contacto,u.nombre AS propietario, c.nombre,c.apellido,c.telefono,c.created_at,o.datos,i.instancia FROM `contactos` c INNER JOIN origen_dato o ON c.origen_contacto = o.id_dato INNER JOIN instancias i ON c.instancia = i.id_instancia INNER JOIN usuario_cumbre u ON c.id_usuario = u.id_usuario WHERE c.id_usuario = $usuario AND i.id_instancia = $instancia AND o.id_dato= $dato AND c.created_at BETWEEN '$incial' AND '$final'";
    $result = mysqli_query($conexion, $sql);

    echo '<tr></tr>';
    echo '<table border = 1>';
    
    echo '<tr>';
    echo '<th colspan=7> Reportes Del Usuario  </th>';
    echo '</tr>';
    echo '<tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Telefono</th>
                <th>Propietario</th>
                <th>Fecha de Creacion</th>
                <th>Datos</th>
                <th>Instancia</th>
                
           </tr>';
           while ($mostrar = mysqli_fetch_array($result)) {
            $idContacto = $mostrar['id_contacto'];
            
          echo '<tr>';
              echo '<td text-center> '.$mostrar['nombre'].' </td>';
              echo '<td>' .$mostrar['apellido']. '</td>';
              echo '<td>' .$mostrar['telefono']. '</td>';
              echo '<td>' .$mostrar['propietario']. '</td>';
              echo '<td>' .$mostrar['created_at']. '</td>';
              echo '<td>' .$mostrar['datos']. '</td>';
              echo '<td>' .$mostrar['instancia']. '</td>';
              
          echo '</tr>';
        }
  
    echo '</table>';

?>
