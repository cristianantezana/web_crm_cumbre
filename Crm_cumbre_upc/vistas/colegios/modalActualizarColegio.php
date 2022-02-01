<div class="modal fade" id="modalActualizarColegio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="frmActualizarColegio">
        <div class="row">
					
					<div class="form-group col-4">
                    <input type="text" name="idColegio" id="idColegio" hidden="">
						<label>Nombre Colegio</label>
						<input type="text" class="form-control input-sm" id="nombre_colegio2" name="nombre_colegio2">
					</div>
					<div class="form-group col-4">
						<label>Encargada</label>
						<input type="text" class="form-control input-sm" id="encargada2" name="encargada2" required>
						</div>
						<div class="form-group col-4">
                             <div id="tipo_colegio_id2"></div>
						 </div>
						</div>
						<div class="row">
							<div class="form-group col-4">
								<label for="" class="form-label">Telefono</label>
								<input id="telefono_cole2" name="telefono_cole2" type="text" class="form-control">
							</div>
               	 
						<div class="form-group col-4">
							<label for="" class="form-label">Telefono Oficina</label>
							<input name="telefono_o2" id="telefono_o2" type="text" class="form-control">
						</div>
						<div class="form-group col-4">
							<label for="" class="form-label">Direccion</label>
							<input name="direccion2" id="direccion2" type="text" class="form-control">
						</div>
						
						</div>
						<div class="form-group col">
						<label for="" class="form-label">Descripcion</label>
                    	<textarea class="form-control" placeholder="Descripcion" id="descripcion_colegio2" style="height: 100px" name="descripcion_colegio2"></textarea>
					</div>
          
          
        </form> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnActualizarColegio">Guardar</button>
      </div>
    </div>
  </div>
</div>