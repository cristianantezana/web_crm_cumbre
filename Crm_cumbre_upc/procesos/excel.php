<?php
    header("content-type: application/xls");
    header("content-Disposition: attachment; filename=Colegios.xls");
?>

<?php 
	require_once "../clases/Conexion.php";
	$objCon = new Conexion();
	$conexion = $objCon->conectar();

	$sql = "SELECT c.id, c.colegio,
	c.encargado,
	c.telefono_oficina,
	ti.tipo,
	c.descripcion 
FROM `colegios` c INNER JOIN tipo_colegio ti ON c.tipo  = ti.id_colegio";
	$result = mysqli_query($conexion, $sql); 

    echo '<table border = 1>';
    echo '<tr>';
    echo '<th colspan=3> Reporte de Contactos Asignados </th>';
    echo '</tr>';
    echo '<tr>
				<th>Nombre Colegio</th>
				<th>Encargada</th>
				<th>Telefono</th>
				<th>Tipo de colegio</th>
				<th>Descripcion</th>

         </tr>';
		 while($mostrar = mysqli_fetch_array($result)) {  
			$idCategoria = $mostrar['id']; 
          echo '<tr>';
              echo '<td text-center> '.$mostrar['colegio'].' </td>';
              echo '<td>' .$mostrar['encargado']. '</td>';
              echo '<td>' .$mostrar['telefono_oficina']. '</td>';
			  echo '<td>' .$mostrar['tipo']. '</td>';
			  echo '<td>' .$mostrar['descripcion']. '</td>';
          echo '</tr>';
        }

    echo '</table>';

?>
	