<?php 
	require_once "../../clases/Conexion.php";
	$con = new Conexion();
	$conexion = $con->conectar();

	$idDatos = $_GET['idDatos'];

	$sql = "SELECT id_dato,datos FROM origen_dato; ";
	$result = mysqli_query($conexion, $sql);
 ?>
 	<label for="dato2">Nuevo Dato</label>
 	<select id="dato2" name="dato2" class="form-control">
 	<?php 
 		while($ver = mysqli_fetch_row($result)): 
 			if ($ver[0] == $idDatos) {
 	?>
 			<option selected="" value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
 	<?php  
 			} else {
 	?>
 			<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
 	<?php  
 			}
 	?>	
 	<?php endwhile; ?>
 	</select>