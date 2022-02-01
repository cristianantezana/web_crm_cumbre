<?php 
	require_once "../../clases/Conexion.php";
	$con = new Conexion();
	$conexion = $con->conectar();

	$idTurno_llamada = $_GET['idTurno_llamada'];

	$sql = "SELECT id_llamada, turno FROM turno_llamada";
	$result = mysqli_query($conexion, $sql);
 ?>
 	<label for="Turno2">Turno LLamada</label>
 	<select id="Turno2" name="Turno2" class="form-control">
 	<?php 
 		while($ver = mysqli_fetch_row($result)): 
 			if ($ver[0] == $idTurno_llamada) {
 	?>
 			<option selected="" value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
 	<?php  
 			} else {
 	?>
 			<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
 	<?php  
 			}
 	?>	
 	<?php endwhile; ?>
 	</select>