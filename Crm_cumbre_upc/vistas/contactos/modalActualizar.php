

<!-- Modal -->
<div class="modal fade" id="modalActualizarContacto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar contacto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="frmAgregarContactoU">
        <div class="row">
          <div class="form-group col-4"> 
          <input type="text" id="idContacto2" name="idContacto2" hidden="">
          <label for="nombre">Nombre</label>
          <input type="text" class="form-control" id="nombre2" name="nombre2">
          </div>
          <div class="form-group col-4"> 
          <label for="apaterno">Apellido</label>
          <input type="text" class="form-control" id="apellido2" name="apellido2">
            
          </div>
          <div class="form-group col-4"> 
          <div id="categoriasIdU"></div>
          </div>

        </div>
        <div class="row">
          <div class="form-group col-4"> 
          <label for="nombre">Colegio/Instituto</label>
          <input type="text" class="form-control" id="colegio2" name="colegio2">
          </div>
          <div class="form-group col-4"> 
            <label for="telefono">Telefono</label>
            <input type="text" class="form-control" id="telefono2" name="telefono2">
            
          </div>
          <div class="form-group col-4"> 
              <div id="carrera_interesada_id2"></div>
              
          </div>

        </div>
        <div class="row">
          <div class="form-group col-4"> 
            <div id="instancia_id2"></div>
          </div>
          <div class="form-group col-4"> 
            <div id="turno_llamada_id2"></div>
            
          </div>
          <div class="form-group col-4"> 
            <div id="tipo_colegio_id2"></div>
          </div>

        </div>
        <div class="row">
          <div class="form-group col-4"> 
              <div id="segunda_carrera_id2"></div>
          </div>
          <div class="form-group col-4"> 
            <div id="datos_id2"></div>
            
          </div>
          <div class="form-group col-4"> 
          <label for="telefono">Telefono Padre</label>
            <input type="text" class="form-control"
             id="telefono_padre2" name="telefono_padre2">
          </div>

        </div>
        <div class="row">
        <div class="form-group col-4">
        <div id="tipo_id2"></div>
					</div>
          <div class="form-group col-4">
          <label for="" class="form-label">Descripcion</label>
          <textarea class="form-control" placeholder="Descripcion" id="descripcion2"
           style="height: 100px" name="descripcion2"></textarea>
              
          </div>
          </div>
         
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-info" id="btnActualizarContacto">Actualizar</button>
      </div>
    </div>
  </div>
</div>
