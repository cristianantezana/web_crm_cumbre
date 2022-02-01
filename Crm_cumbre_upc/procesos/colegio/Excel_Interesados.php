<?php
    header("content-type: application/xls");
    header("content-Disposition: attachment; filename=Interesados.xls ");
?>
<?php 
	require_once "../../clases/Conexion.php";
	$objCon = new Conexion();
	$conexion = $objCon->conectar();

	$sql = "SELECT  id_contacto,c.nombre, c.apellido, ca.carrera, c.telefono FROM `contactos` c INNER JOIN carrera_interesada ca ON c.carrera_interesada = ca.id_carrera WHERE instancia =5;";
	$result = mysqli_query($conexion, $sql); 
	echo '<tr></tr>';
  echo '<table border = 1>';
  echo '<tr>';
  echo '<th colspan=3> Contactos Interesados </th>';
  echo '</tr>';
  echo '<tr>
  			<th>Nombre</th>
			<th>Apellido</th>
			<th>Carrera</th>
			<th>Telefono</th>
         </tr>';
		 while($mostrar = mysqli_fetch_array($result)) {  
			$idCategoria = $mostrar['id_contacto']; 
          
        echo '<tr>';
            echo '<td text-center> '.$mostrar['nombre'].' </td>';
            echo '<td>' .$mostrar['apellido']. '</td>';
            echo '<td>' .$mostrar['carrera']. '</td>';
			echo '<td>' .$mostrar['telefono']. '</td>';
        echo '</tr>';
      }

  echo '</table>';

?>
