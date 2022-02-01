<?php
    header("content-type: application/xls");
    header("content-Disposition: attachment; filename=contactos_de_Usuarios.xls");
    header('Pragma: no-cache');
    header('Expires: 0');
    
?>
 <?php
    require_once "../clases/Conexion.php";
    $objCon = new Conexion();
    $conexion = $objCon->conectar();

    $usuario = $_GET['no'];

    $sql = "SELECT a.id, c.nombre,c.apellido,c.descripcion,c.id_contacto
              FROM asignado a 
              INNER JOIN contactos c on a.contacto_id = c.id_contacto
              WHERE a.usuario_id= $usuario ORDER BY a.id DESC ";
    $result = mysqli_query($conexion, $sql);
    echo '<tr></tr>';
    echo '<table border = 1>';
    echo '<tr>';
    echo '<th colspan=3> Reporte de Contactos Asignados </th>';
    echo '</tr>';
    echo '<tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Descripcion</th>
           </tr>';
           while ($mostrar = mysqli_fetch_array($result)) {
            $idContacto = $mostrar['id'];
          echo '<tr>';
              echo '<td text-center> '.$mostrar['nombre'].' </td>';
              echo '<td>' .$mostrar['apellido']. '</td>';
              echo '<td>' .$mostrar['descripcion']. '</td>';
          echo '</tr>';
        }

    echo '</table>';
    ?>
  