<?php 
	require_once "../../clases/Conexion.php";
	$con = new Conexion();
	$conexion = $con->conectar();

	$idColegio = $_GET['idColegio'];

	$sql = "SELECT id_colegio,tipo FROM tipo_colegio; ";
	$result = mysqli_query($conexion, $sql);
 ?>
 	<label for="tipo_colegio2">Tipo Colegio</label>
 	<select id="tipo_colegio2" name="tipo_colegio2" class="form-control">
 	<?php 
 		while($ver = mysqli_fetch_row($result)): 
 			if ($ver[0] == $idColegio) {
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