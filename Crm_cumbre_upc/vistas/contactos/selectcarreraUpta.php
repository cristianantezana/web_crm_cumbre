<?php 
	require_once "../../clases/Conexion.php";
	$con = new Conexion();
	$conexion = $con->conectar();

	$idCarrera = $_GET['idCarrera'];

	$sql = "SELECT id_carrera,carrera FROM carrera_interesada; ";
	$result = mysqli_query($conexion, $sql);
 ?>
 	<label for="carrera2">Carrera Interesada</label>
 	<select id="carrera2" name="carrera2" class="form-control">
 	<?php 
 		while($ver = mysqli_fetch_row($result)): 
 			if ($ver[0] == $idCarrera) {
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