<?php
require_once "clases/Conexion.php";
$objCon = new Conexion();
$conexion = $objCon->conectar();




$sql = "SELECT c.id_contacto, c.nombre, c.apellido, c.parentesco, c.colegio_instituto, c.telefono, c.turno_llamada,c.tipo_colegio, c.carrera_secundaria,c.telefono_padre,c.tipo,c.descripcion, ca.carrera, i.instancia, o.datos FROM contactos c INNER JOIN carrera_interesada ca on c.carrera_interesada = ca.id_carrera INNER JOIN instancias i ON c.instancia = i.id_instancia INNER JOIN origen_dato o ON c.origen_contacto = o.id_dato  WHERE nombre LIKE LOWER('%" . $_POST['buscar'] . "%') OR apellido LIKE LOWER('%" . $_POST['buscar'] . "%') ORDER BY c.id_contacto DESC LIMIT 10;";
$result = mysqli_query($conexion, $sql);
?>
<table class="table table-hover table-condensed" id="tablaContactosDT">
	<thead style="background-color: rgb(0, 58, 115);color: white; font-weight: bold;">
		<tr>
			<td>Nombre</td>
			<td>Apellido</td>
			<td>Carrera Interesada</td>
			<td>Instancia</td>
			<td>Origen del Dato</td>
			<td>Editar</td>

		</tr>
	</thead>
	<tbody>
		<?php
		while ($mostrar = mysqli_fetch_array($result)) {
			$idContacto = $mostrar['id_contacto'];
		?>
			<tr>
				<td>
					<?php echo "<a  class=nav-link href='actividades.php?no=" . $mostrar['id_contacto'] . "'><font color=black> "; ?>
					<?php echo $mostrar['nombre'] ?></font> </a>
				</td>
				<td>
					<?php echo "<a class=nav-link href='actividades.php?no=" . $mostrar['id_contacto'] . "'><font color=black> "; ?>
					<?php echo $mostrar['apellido'] ?></font> </a>
				</td>
				<td><?php echo $mostrar['carrera'] ?></td>
				<td><?php echo $mostrar['instancia'] ?></td>

				<td>
					<?php echo $mostrar['datos'] ?>
					<a href="">

				</td>

				<td>
					<span class="btn " onclick="obtenerDatosContacto('<?php echo $idContacto ?>')" data-toggle="modal" data-target="#modalActualizarContacto">
						<span class="fas fa-edit"></span>
					</span>

			</tr>
		<?php } ?>
	</tbody>
</table>