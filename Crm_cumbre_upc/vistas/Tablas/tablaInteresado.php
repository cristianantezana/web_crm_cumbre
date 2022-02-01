<?php 

	require_once "../../clases/Conexion.php";
	$objCon = new Conexion();
	$conexion = $objCon->conectar();

	$sql = "SELECT  id_contacto,c.nombre, c.apellido, ca.carrera, c.telefono FROM `contactos` c INNER JOIN carrera_interesada ca ON c.carrera_interesada = ca.id_carrera WHERE instancia =5;";
	$result = mysqli_query($conexion, $sql); 
?>
<?php
require_once "../../dependencias.php";

?>
<div class="card">
	<div class="card-body">
		<div class="table-responsive" >
			<table class="table table-hover table-condensed" id="tablaInteresado">
				<thead class="encabezado"> 
					<tr>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Carrera</th>
						<th>Telefono</th>
					</tr>
				</thead>
				<tbody id="resumen" class="resumen">

				<?php
					while($mostrar = mysqli_fetch_array($result)) {  
						$idCategoria = $mostrar['id_contacto']; 
				?>
					<tr>
						<td><?php echo $mostrar['nombre'] ?></td>
                        <td><?php echo $mostrar['apellido'] ?></td>
                        <td><?php echo $mostrar['carrera'] ?></td>
                        <td><?php echo $mostrar['telefono'] ?></td>
					</tr>
				<?php 
					}
				 ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaInteresado').DataTable({
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
		}
		);
	});
</script>