
<?php 
	
	require_once "../../clases/Conexion.php";
	$objCon = new Conexion();
	$conexion = $objCon->conectar();

	$sql = "SELECT datos, id_dato FROM origen_dato ORDER BY id_dato DESC ";
	$result = mysqli_query($conexion, $sql); 
?>
<div class="card">
	<div class="card-body">
		<div class="table-responsive" >
			<table class="table table-hover table-condensed" id="tablaCategoriasDT">
				<thead class="encabezado"> 
					<tr>
						<th>Nombre</th>
						<th>Editar</th>
						<th>Eliminar</th>
					</tr>
				</thead>
				<tbody class="resumen">

				<?php
					while($mostrar = mysqli_fetch_array($result)) {  
						$idCategoria = $mostrar['id_dato']; 
				?>
					<tr>
						<td><?php echo $mostrar['datos'] ?></td>
						
						<td>
							<span onclick="obtenerDatosCategoria('<?php echo $idCategoria ?>')" class="btn " data-toggle="modal" data-target="#modalActualizarCategoria">
								<span class="fas fa-edit center"></span>
							</span>
						</td>
						<td>
							<span class="btn " onclick="eliminarCategoria('<?php echo $idCategoria ?>')">
								<span class="far fa-trash-alt"></span>
							</span>
						</td>
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
		$('#tablaCategoriasDT').DataTable( {
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
        
            "order": [[ 3, "desc" ]]
        
    } );
		
	});
</script>

