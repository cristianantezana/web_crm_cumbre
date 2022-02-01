<?php 
	
	require_once "../../clases/Conexion.php";
	$con = new Conexion();
	$conexion = $con->conectar();

	$sql = "SELECT id_tipo, tipo
	 				FROM tipos
	 				ORDER BY tipo";
	$result = mysqli_query($conexion, $sql);
 ?>
 	<label for="tipo">Tipos</label>
 	<select id="tipo" name="tipo" class="form-control">
 		<option value="0">Tipos</option>
 	<?php while($ver = mysqli_fetch_row($result)): ?>
 		<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
 	<?php endwhile; ?>
 	</select>