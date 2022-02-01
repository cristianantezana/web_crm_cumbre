<?php

require_once "../../clases/Conexion.php";
$con = new Conexion();
$conexion = $con->conectar();

$sql = "SELECT id_instancia, instancia
    FROM instancias ORDER BY instancia";
$result = mysqli_query($conexion, $sql);
?>
<label for="dato">Selecciona un Propitario</label>
<select id="propietario2" name="propietario2" class="form-control">
	<option value="0">Selecciona un Dato</option>
	<?php while ($ver = mysqli_fetch_row($result)) : ?>
		<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
	<?php endwhile; ?>
</select>