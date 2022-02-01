<?php 
	
	require_once "../../clases/Conexion.php";
	$con = new Conexion();
	$conexion = $con->conectar();

	$sql = "SELECT id, actividad
    FROM tipo_actividad
    ORDER BY actividad";
	$result = mysqli_query($conexion, $sql);
 ?>
 	<label for="dato">Tipo de Actividad</label>
 	<select id="select_tipo_actividad" name="select_tipo_actividad" class="form-control">
 		
 	<?php while($ver = mysqli_fetch_row($result)): ?>
 		<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
 	<?php endwhile; ?>
 	</select>