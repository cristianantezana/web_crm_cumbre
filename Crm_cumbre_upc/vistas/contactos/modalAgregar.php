

<!-- Modal -->
<div class="modal fade" id="modalAgregarContacto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Agregar nuevo contacto </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="frmAgregarContacto">
        <div class="row">
          <div class="form-group col-4"> 
          <label for="nombre">Nombre</label>
          <input type="text" class="form-control" id="nombre" name="nombre" onkeypress="return SoloLetras(event);" required>
          </div>
          <div class="form-group col-4"> 
          <label for="apaterno">Apellido</label>
          <input type="text" class="form-control" id="apellido" name="apellido"
          onkeypress="return SoloLetras(event);" required>
            
          </div>
          <div class="form-group col-4"> 
          <div id="categoriasId"></div>
          </div>

        </div>
        <div class="row">
          <div class="form-group col-4"> 
          <label for="nombre">Colegio/Instituto</label>
          <input type="text" class="form-control" id="colegio" name="colegio">
          </div>
          <div class="form-group col-4"> 
            <label for="telefono">Telefono</label>
            <input type="text" class="form-control" id="telefono" name="telefono">
            
          </div>
          <div class="form-group col-4"> 
              <div id="carrera_interesada_id"></div>
              
          </div>

        </div>
        <div class="row">
          <div class="form-group col-4"> 
            <div id="instancia_id"></div>
          </div>
          <div class="form-group col-4"> 
            <div id="turno_llamada_id"></div>
            
          </div>
          <div class="form-group col-4"> 
            <div id="tipo_colegio_id"></div>
          </div>

        </div>
        <div class="row">
          <div class="form-group col-4"> 
              <div id="segunda_carrera_id"></div>
          </div>
          <div class="form-group col-4"> 
            <div id="datos_id"></div>
            
          </div>
          <div class="form-group col-4"> 
          <label for="telefono">Telefono Padre</label>
            <input type="text" class="form-control"
             id="telefono_padre" name="telefono_padre">
          </div>

        </div>
        <div class="row">
        <div class="form-group col-4">
        <div id="tipo_id"></div>
					</div>
          <div class="form-group col-4">
          <label for="" class="form-label">Descripcion</label>
          <textarea class="form-control" placeholder="Descripcion" id="descripcion"
           style="height: 100px" name="descripcion"></textarea>
              
          </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnAgregarContacto">Guardar</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  $(document).ready(function(){
    $('#categoriasId').load("vistas/contactos/selectCategorias.php");
    $('#datos_id').load("vistas/contactos/Select_Dato.php");
    $('#carrera_interesada_id').load("vistas/contactos/selectCarreraIN.php");
    $('#instancia_id').load("vistas/contactos/selectInstancia.php");
    $('#turno_llamada_id').load("vistas/contactos/selectTurnoLlamada.php");
    $('#tipo_colegio_id').load("vistas/contactos/selectTipo_colegio.php");
    $('#segunda_carrera_id').load("vistas/contactos/selectSegunda_carrera.php");
    $('#tipo_id').load("vistas/contactos/selectTipo.php");
  });
</script>