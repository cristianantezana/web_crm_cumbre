<?php 
	
	require_once "../../clases/Conexion.php";
	$con = new Conexion();
	$conexion = $con->conectar();

	$sql = "SELECT id_llamada, turno
	 				FROM turno_llamada
	 				ORDER BY turno";
	$result = mysqli_query($conexion, $sql);
 ?>
 	<label for="turno_llamada">Seleccione Turno LLamada</label>
 	<select id="turno_llamada" name="turno_llamada" class="form-control">
 		<option value="0">Turno LLamada</option>
 	<?php while($ver = mysqli_fetch_row($result)): ?>
 		<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
 	<?php endwhile; ?>
 	</select>