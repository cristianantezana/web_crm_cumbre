
<?php 
	
	require_once "../../clases/Conexion.php";
	$con = new Conexion();
	$conexion = $con->conectar();

	$sql = "SELECT c.id_contacto, c.nombre, c.apellido, c.parentesco, c.colegio_instituto, c.telefono, c.turno_llamada,c.tipo_colegio, c.carrera_secundaria,c.telefono_padre,c.tipo,c.descripcion, ca.carrera, i.instancia, o.datos FROM contactos c INNER JOIN carrera_interesada ca on c.carrera_interesada = ca.id_carrera INNER JOIN instancias i ON c.instancia = i.id_instancia INNER JOIN origen_dato o ON c.origen_contacto = o.id_dato ORDER BY c.id_contacto DESC LIMIT 10 ;";
	$result = mysqli_query($conexion, $sql);
 ?>

<div class="card">
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-hover table-condensed  display responsive nowrap" id="tablaContactosDT">
				<thead class="encabezado">
					<tr>
					<td>Nombre</td>
					<td>Apellido</td>
					<td>Carrera Interesada</td>
					<td>Instancia</td>
					<td>Origen del Dato</td>
					<td>Editar</td>
					</tr>
				</thead>
				<tbody id="resumen" class="resumen">
					<?php 
						while($mostrar = mysqli_fetch_array($result)) {  
							$idContacto = $mostrar['id_contacto'];
					?>
					<tr>
						<td>
						<?php echo "<a  class=nav-link href='actividades.php?no=".$mostrar['id_contacto']."'><font color=black> "; ?>
							<?php echo $mostrar['nombre'] ?></font>  </a>
						</td>
						<td>
						<?php echo "<a class=nav-link href='actividades.php?no=".$mostrar['id_contacto']."'><font color=black> "; ?>
							<?php echo $mostrar['apellido'] ?></font>  </a>
						</td>
						<td><?php echo $mostrar['carrera'] ?></td>
						<td><?php echo $mostrar['instancia'] ?></td>
						
						<td>
						<?php echo $mostrar['datos'] ?> 
							<a href="">
								
						</td>
						
						<td>
							<span class="btn btn-lg" onclick="obtenerDatosContacto('<?php echo $idContacto ?>')" data-toggle="modal" data-target="#modalActualizarContacto">
								<span class="fas fa-edit"></span>
							</span>
						</td>
						
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>


 

<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaContactosDT').DataTable({
			
			searching: false, 
			responsive: true,
        columnDefs: [
            { responsivePriority: 7, targets: 0},
            { responsivePriority: 6, targets: -1 },
            { responsivePriority: 3, targets: -2},
			{ responsivePriority: 4, targets: -3},
            { responsivePriority: 5, targets: -4},
            { responsivePriority: 2, targets: -5},
			{ responsivePriority: 1, targets: -6},
        ],
			language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    },
			"order": [[ 5, "desc" ]]
		});
	});
</script>
