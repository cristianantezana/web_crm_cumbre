<?php 
	
	require_once "../../clases/Conexion.php";
	$con = new Conexion();
	$conexion = $con->conectar();

	$sql = "SELECT id_colegio, tipo
	 				FROM tipo_colegio
	 				ORDER BY tipo";
	$result = mysqli_query($conexion, $sql);
 ?>
 	<label for="tipo_colegio">Tipo Colegio</label>
 	<select id="tipo_colegio" name="tipo_colegio" class="form-control">
 		<option value="0">Tipo Colegio</option>
 	<?php while($ver = mysqli_fetch_row($result)): ?>
 		<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
 	<?php endwhile; ?>
 	</select>