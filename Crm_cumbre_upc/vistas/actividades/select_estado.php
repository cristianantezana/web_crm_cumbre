<?php 
	
	require_once "../../clases/Conexion.php";
	$con = new Conexion();
	$conexion = $con->conectar();

	$sql = "SELECT id, estado
    FROM estado_actividad
    ORDER BY estado";
	$result = mysqli_query($conexion, $sql);
 ?>
 	<label for="dato">Estado</label>
 	<select id="select_estadoo" name="select_estadoo" class="form-control">
	 <option value="0">Selecione una Opcion</option>
 	<?php while($ver = mysqli_fetch_row($result)): ?>
 		<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
 	<?php endwhile; ?>
 	</select>