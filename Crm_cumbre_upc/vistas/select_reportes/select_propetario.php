<?php 
	
	require_once "../../clases/Conexion.php";
	$con = new Conexion();
	$conexion = $con->conectar();

	$sql = "SELECT id_usuario, nombre FROM usuario_cumbre ORDER BY nombre; ";
	$result = mysqli_query($conexion, $sql);
 ?>
 	<label for="dato">Selecciona un propietario</label>
 	<select id="propietario" name="propietario" class="form-control">
 		<option value="0">Selecciona un Dato</option>
 	<?php while($ver = mysqli_fetch_row($result)): ?>
 		<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
 	<?php endwhile; ?>
 	</select>