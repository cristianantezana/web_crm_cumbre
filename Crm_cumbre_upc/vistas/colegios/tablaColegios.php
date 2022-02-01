<?php 
	require_once "../../clases/Conexion.php";
	$objCon = new Conexion();
	$conexion = $objCon->conectar();

	$sql = "SELECT colegio, descripcion,direccion,encargado,
                    telefono,telefono_oficina,tipo, id 
                    FROM colegios ORDER BY id DESC";
	$result = mysqli_query($conexion, $sql); 
?>

<div class="card">
	<div class="card-body">
		<div class="table-responsive" >
			<table class="table table-hover table-condensed" id="tablaColegiosDT">
				<thead style=" background-color: rgb(0, 58, 115);color: white; font-weight: bold;"> 
					<tr>
                              <td>Colegio</td>
				          <td>Encargado</td>
				          <td>Telefono</td>
				          <td>Direccion</td>
				          <td>Editar</td>
				          <td>Ver</td>
					</tr>
				</thead>
				<tbody>

				<?php
					while($mostrar = mysqli_fetch_array($result)) {  
						$idColegio = $mostrar['id']; 
				?>
					<tr>
						<td><?php echo $mostrar['colegio'] ?></td>
                              <td><?php echo $mostrar['encargado'] ?></td>
                              <td><?php echo $mostrar['telefono'] ?></td>
                              <td><?php echo $mostrar['direccion'] ?></td>

						<td>
							<span onclick="obtenerDatosColegio('<?php echo $idColegio ?>')" class="btn " data-toggle="modal" data-target="#modalActualizarColegio">
								<span class="fas fa-edit"></span>
							</span>
						</td>
						<td>
						<input  type="button" name="view" value="ver" id="<?php echo $idColegio ?>" class="btn btn_ver btn-xs view_data" />
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

<div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                      
                     <h4 class="modal-title"  style="color:white">Detalle del Colegio</h4>  
                </div>  
                <div class="modal-body" id="employee_detail"> 
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>  
                </div>  
                <div class="modal-footer">  
					
                </div>  
           </div>  
      </div>  
 </div>  

 <script>  
 $(document).ready(function(){  
     $(".modal-header").css("background-color", "rgb(0, 58, 115)");
      $('.view_data').click(function(){  
           var employee_id = $(this).attr("id");  
           $.ajax({  
                url:"vistas/colegios/detalleColegio.php",  
                method:"post",  
                data:{employee_id:employee_id},  
                success:function(data){  
                     $('#employee_detail').html(data);  
                     $('#dataModal').modal("show");  
                }  
           });  
      });  
 });  
 </script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaColegiosDT').DataTable({
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
			"order": [[ 4, "desc" ]]},
			
		);
	});
</script>