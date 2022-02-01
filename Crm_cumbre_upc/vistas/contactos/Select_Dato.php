<?php 
	
	require_once "../../clases/Conexion.php";
	$con = new Conexion();
	$conexion = $con->conectar();

	$sql = "SELECT id_dato, datos
	 				FROM origen_dato 
	 				ORDER BY datos";
	$result = mysqli_query($conexion, $sql);
 ?>
 	<label for="dato">Selecciona un Dato</label>
 	<select id="dato" name="dato" class="form-control">
 		<option value="0">Selecciona un Dato</option>
 	<?php while($ver = mysqli_fetch_row($result)): ?>
 		<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
 	<?php endwhile; ?>
 	</select>