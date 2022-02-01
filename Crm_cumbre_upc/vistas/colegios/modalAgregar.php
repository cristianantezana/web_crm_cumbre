<!-- Modal -->
<div class="modal fade" id="modalAgregarColegio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Colegio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="frmAgregarColegio">
        <div class="row">
					
					<div class="form-group col-4">
						<label>Nombre Colegio</label>
						<input type="text" class="form-control input-sm" id="nombre_colegio" name="nombre_colegio"onkeypress="return SoloLetras(event);" required>
					</div>
					<div class="form-group col-4">
						<label>Encargada</label>
						<input type="text" class="form-control input-sm" id="encargada" name="encargada" onkeypress="return SoloLetras(event);" required>
						</div>
						<div class="form-group col-4">
                             <div id="tipo_colegio_id"></div>
						 </div>
						</div>
						<div class="row">
							<div class="form-group col-4">
								<label for="" class="form-label">Telefono</label>
								<input id="telefono_cole" name="telefono_cole" type="text" class="form-control">
							</div>
               	 
						<div class="form-group col-4">
							<label for="" class="form-label">Telefono Oficina</label>
							<input name="telefono_o" id="telefono_o" type="text" class="form-control">
						</div>
						<div class="form-group col-4">
							<label for="" class="form-label">Direccion</label>
							<input name="direccion" id="direccion" type="text" class="form-control">
						</div>
						
						</div>
						<div class="form-group col">
						<label for="" class="form-label">Descripcion</label>
                    	<textarea class="form-control" placeholder="Descripcion" id="descripcion_colegio" style="height: 100px" name="descripcion_colegio"></textarea>
					</div>
          
          
        </form> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnGuardarColegio">Guardar</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
	
    $('#tipo_colegio_id').load("vistas/contactos/selectTipo_colegio.php");
	$(".modal-header").css("background-color", "#003a73");
  });
</script>