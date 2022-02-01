<?php 
	
	require_once "../../clases/Conexion.php";
	$con = new Conexion();
	$conexion = $con->conectar();

	$sql = "SELECT id, resultado
    FROM resultado_llamada
    ORDER BY resultado";
	$result = mysqli_query($conexion, $sql);
 ?>
 	<label for="dato">Resultado de llamada</label>
 	<select id="select_resultad_llamada" name="select_resultad_llamada" class="form-control">
 		
 	<?php while($ver = mysqli_fetch_row($result)): ?>
 		<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
 	<?php endwhile; ?>
 	</select>