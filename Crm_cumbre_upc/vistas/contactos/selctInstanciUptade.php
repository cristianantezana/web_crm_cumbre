<?php 
	require_once "../../clases/Conexion.php";
	$con = new Conexion();
	$conexion = $con->conectar();

	$idInstancia = $_GET['idInstancia'];

	$sql = "SELECT id_instancia,instancia FROM instancias;";
	$result = mysqli_query($conexion, $sql);
 ?>
 	<label for="instancia2">Selecione Estado</label>
 	<select id="instancia2" name="instancia2" class="form-control">
 	<?php 
 		while($ver = mysqli_fetch_row($result)): 
 			if ($ver[0] == $idInstancia) {
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