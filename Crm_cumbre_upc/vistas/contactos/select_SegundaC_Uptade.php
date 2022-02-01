<?php 
	require_once "../../clases/Conexion.php";
	$con = new Conexion();
	$conexion = $con->conectar();

	$idSegundaCa = $_GET['idSegundaCa'];

	$sql = "SELECT id_secundario,carrera_secundaria FROM producto_secundario";
	$result = mysqli_query($conexion, $sql);
 ?>
 	<label for="segunda_carrera2">Selecione Estado</label>
 	<select id="segunda_carrera2" name="segunda_carrera2" class="form-control">
 	<?php 
 		while($ver = mysqli_fetch_row($result)): 
 			if ($ver[0] == $idSegundaCa) {
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