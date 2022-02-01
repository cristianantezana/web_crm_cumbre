<?php 
	
	require_once "../../clases/Conexion.php";
	$con = new Conexion();
	$conexion = $con->conectar();

	$sql = "SELECT id_secundario, carrera_secundaria
	 				FROM producto_secundario
	 				ORDER BY carrera_secundaria";
	$result = mysqli_query($conexion, $sql);
 ?>
 	<label for="segunda_carrera">Segunda Carrea</label>
 	<select id="segunda_carrera" name="segunda_carrera" class="form-control">
 		<option value="0">Segunda Carrera</option>
 	<?php while($ver = mysqli_fetch_row($result)): ?>
 		<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
 	<?php endwhile; ?>
 	</select>