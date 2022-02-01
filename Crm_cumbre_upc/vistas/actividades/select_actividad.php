<?php 
	
	require_once "../../clases/Conexion.php";
	$con = new Conexion();
	$conexion = $con->conectar();

	$sql = "SELECT id, actividad
    FROM actividad_realizada
    ORDER BY actividad";
	$result = mysqli_query($conexion, $sql);
 ?>
 	<label for="dato">Actividad</label>
 	<select id="select_actividad" name="select_actividad" class="form-control">
 	<option value="0">Selecione una Opcion</option>	
 	<?php while($ver = mysqli_fetch_row($result)): ?>
 		<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
 	<?php endwhile; ?>
 	</select>