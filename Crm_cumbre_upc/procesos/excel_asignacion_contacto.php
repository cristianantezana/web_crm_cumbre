<?php
    header("content-type: application/xls");
    header("content-Disposition: attachment; filename=Contacto_asignados.xls");
?>
<?php
	session_start();
  require_once '../clases/Conexion.php';
	$con = new Conexion();
	$conexion = $con->conectar();

	

			
        $id = $_SESSION['id'];

  $sql = "SELECT a.id, c.nombre,c.apellido,c.descripcion,c.id_contacto
	FROM asignado a 
	INNER JOIN contactos c on a.contacto_id = c.id_contacto
	WHERE a.usuario_id= $id ORDER BY a.id DESC";
	$result = mysqli_query($conexion, $sql);
	$mostrar = array();
  
while( $rows = mysqli_fetch_assoc($result) ) {

  $mostrar[] = $rows;
  
  }
  echo '<tr></tr>';
  echo '<table border = 1>';
  echo '<tr>';
  echo '<th colspan=3> Contactos Asignados </th>';
  echo '</tr>';
  echo '<tr>
  <th>Nombre</th>
  <th>Apellido</th>
  <th>Descripcion</th>
         </tr>';
         foreach($mostrar as $datos)   {
          
        echo '<tr>';
            echo '<td text-center> '.$datos['nombre'].' </td>';
            echo '<td>' .$datos['apellido']. '</td>';
            echo '<td>' .$datos['descripcion']. '</td>';
        echo '</tr>';
      }

  echo '</table>';

	
	
?>

     

