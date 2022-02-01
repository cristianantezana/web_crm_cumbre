<?php 
	
	require_once "../../clases/Conexion.php";
	$con = new Conexion();
	$conexion = $con->conectar();

	$sql = "SELECT id, parentesco
	 				FROM parentesco 
	 				ORDER BY parentesco";
	$result = mysqli_query($conexion, $sql);
 ?>
 	<label for="parentesco">Selecciona una Parentesco</label>
 	<select id="parentesco" name="parentesco" class="form-control">
 		<option value="0">PARENTESCO</option>
 	<?php while($ver = mysqli_fetch_row($result)): ?>
 		<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
 	<?php endwhile; ?>
 	</select>