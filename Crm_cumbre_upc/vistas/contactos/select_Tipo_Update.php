<?php 
	require_once "../../clases/Conexion.php";
	$con = new Conexion();
	$conexion = $con->conectar();

	$idTipo = $_GET['idTipo'];

	$sql = "SELECT id_tipo,tipo FROM tipos; ";
	$result = mysqli_query($conexion, $sql);
 ?>
 	<label for="tipo2">Nuevo Dato</label>
 	<select id="tipo2" name="tipo2" class="form-control">
 	<?php 
 		while($ver = mysqli_fetch_row($result)): 
 			if ($ver[0] == $idTipo) {
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