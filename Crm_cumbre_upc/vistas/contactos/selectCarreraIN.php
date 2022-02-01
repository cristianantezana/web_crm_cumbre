<?php 
	
	require_once "../../clases/Conexion.php";
	$con = new Conexion();
	$conexion = $con->conectar();

	$sql = "SELECT id_carrera, carrera
	 				FROM carrera_interesada
	 				ORDER BY carrera";
	$result = mysqli_query($conexion, $sql);
 ?>
 	<label for="carrera_interesada">Selecciona una Carrera</label>
 	<select id="carrera_interesada" name="carrera_interesada" class="form-control">
 		<option value="0">Carrera</option>
 	<?php while($ver = mysqli_fetch_row($result)): ?>
 		<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
 	<?php endwhile; ?>
 	</select>