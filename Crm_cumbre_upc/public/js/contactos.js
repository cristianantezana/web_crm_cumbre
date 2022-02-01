$(document).ready(function(){
	$('#cargaTablaContactos').load('vistas/contactos/tablaContactos.php');
	
	$(".modal-header").css("background-color", "#003a73");
    $(".modal-header").css("color", "white");
	$(".modal-header2").css("background-color", "#003a73");
    $(".modal-header2").css("color", "white");
	$('#btnAgregarContacto').click(function(){

		if ($('#idCategoriaSelect').val() == 0) {
			swal("Debes selecciona una Dato");
			return false;
		} else if ($('#nombre').val() == "") {
			swal("Debes agregar el nombre");
			return false;
		}
		else if ($('#apellido').val() == "") {
			swal("Debes agregar un Apellido");
			return false;
		}else if ($('#colegio').val() == "") {
			swal("Debes agregar un colegio");
			return false;
		}else if ($('#telefono').val() == "") {
			swal("Debes agregar el telefono");
			return false;
		}else if ($('#carrera_interesada').val() == 0) {
			swal("Debes agregar una carrera");
			return false;
		}else if ($('#estado').val() == 0) {
			swal("Debes agregar un Estado");
			return false;
		}else if ($('#turno_llamada').val() == 0) {
			swal("Debes agregar el Turno Llamada");
			return false;
		}else if ($('#tipo_colegio').val() == 0) {
			swal("Debes agregar tipo Colegio");
			return false;
		}else if ($('#segunda_carrera').val() == "") {
			swal("Debes agregar Una Segunda carrera");
			return false;
		}else if ($('#dato').val() == "") {
			swal("Debes agregar Un Dato");
			return false;
		}else if ($('#telefono_padre').val() == "") {
			swal("Debes agregar El telefono ");
			return false;
		}else if ($('#tipo').val() == 0) {
			swal("Debes agregar el Tipo");
			return false;
		}else if ($('#descripcion').val() == "") {
			swal("Debes agregar la Descripcion");
			return false;
		
		}

		agregarContacto();
	});

	$('#btnActualizarContacto').click(function(){
		actualizarContacto();
	});
});
function SoloLetras(e)
{
key = e.keyCode || e.which;
tecla = String.fromCharCode(key).toString();
letras = "ABCDEFGHIJKLMNOPQRSTUVWXYZÁÉÍÓÚabcdefghijklmnopqrstuvwxyzáéíóú";

especiales = [8,13];
tecla_especial = false
for(var i in especiales) {
if(key == especiales[i]){
 tecla_especial = true;
 break;
}
}

if(letras.indexOf(tecla) == -1 && !tecla_especial)
{
	swal("Debes agregar solo letra en este campo");
 return false;
}
}

function Especial(e)
{
key = e.keyCode || e.which;
tecla = String.fromCharCode(key).toString();
letraespecial = "$%!@.";

especiales = [8,13];
tecla_especial = false
for(var i in especiales) {
if(key == especiales[i]){
 tecla_especial = true;
 break;
}
}


}

function agregarContacto(){
	$.ajax({
		type: "POST",
		url: "procesos/contactos/agregarContacto.php",
		data: $('#frmAgregarContacto').serialize(),
		success:function(respuesta) {
			respuesta = respuesta.trim();
			if (respuesta == 1) {
				$('#frmAgregarContacto')[0].reset();
				$('#cargaTablaContactos').load('vistas/contactos/tablaContactos.php');
				$('#modalAgregarContacto').modal("toggle");
				swal(":D","Se agrego con exito!","success");
			} else {
				swal(":(","Rellene Los campos!","error");
			}
		}
	});
}

function actualizarContacto() {
	$.ajax({
		type: "POST",
		url: "procesos/contactos/actualizarContacto.php",
		data: $('#frmAgregarContactoU').serialize(),
		success:function(respuesta) {
			respuesta = respuesta.trim();
			if (respuesta == 1) {
				$('#cargaTablaContactos').load('vistas/contactos/tablaContactos.php');
				
				$('#modalActualizarContacto').modal("toggle");
				swal(":D","Se actualizo con exito!","success");
				
			} else {
				swal(":(","No se pudo actualizar!","error");
			}
		}
	});
}


function eliminarContacto(idContacto) {
	swal({
		title: "¿Esta seguro de eliminar este contacto?",
		text: "Una vez eliminado no podra ser recuperado!",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	})
	.then((willDelete) => {
		if (willDelete) {
			$.ajax({
				type:"POST",
				data:"idContacto=" + idContacto,
				url:"procesos/contactos/eliminarContacto.php",
				success:function(respuesta){
					respuesta = respuesta.trim();
					if (respuesta == 1) {
						$('#cargaTablaContactos').load('vistas/contactos/tablaContactos.php');
						
						swal(":D","Se elimino con exito!","success");
					} else {
						swal(":(","No se pudo eliminar!","error");
					}
				}
			});
		} 
	});
}

function obtenerDatosContacto(idContacto) {
	$.ajax({
		type: "POST",
		data: "idContacto=" + idContacto,
		url: "procesos/contactos/obtenerDatosContacto.php",
		success:function(respuesta) {
			respuesta = jQuery.parseJSON(respuesta);
			idCategoria = respuesta['id_categoria'];
			idCarrera = respuesta['carrera'];
			idTurno_llamada =respuesta['turno_llamada']
			idInstancia = respuesta['intancia'];
			idColegio = respuesta ['tipo_colegio'];
			idSegundaCa = respuesta['carrera_secundaria'];
			idDatos = respuesta['origen_dato'];
			idTipo = respuesta['tipo'];
			$('#idContacto2').val(respuesta['id_contacto']);
			$('#nombre2').val(respuesta['nombre']);
			$('#apellido2').val(respuesta['apellido']);
			$('#categoriasIdU').load("vistas/contactos/selectCategoriasUpdate.php?idCategoria=" + idCategoria);
			$('#colegio2').val(respuesta['colegio']);
			$('#telefono2').val(respuesta['telefono']);
			$('#carrera_interesada_id2').load("vistas/contactos/selectcarreraUpta.php?idCarrera=" + idCarrera);
			$('#instancia_id2').load("vistas/contactos/selctInstanciUptade.php?idInstancia=" + idInstancia);
			$('#turno_llamada_id2').load("vistas/contactos/selectTurnoUptade.php?idTurno_llamada=" + idTurno_llamada);
			$('#tipo_colegio_id2').load("vistas/contactos/select_Tipo_ColegioUptade.php?idColegio=" + idColegio);
			$('#segunda_carrera_id2').load("vistas/contactos/select_SegundaC_Uptade.php?idSegundaCa=" + idSegundaCa);
			$('#datos_id2').load("vistas/contactos/select_Dato_Update.php?idDatos=" + idDatos);
			$('#telefono_padre2').val(respuesta['telefono_padre']);
			$('#tipo_id2').load("vistas/contactos/select_Tipo_Update.php?idTipo=" +idTipo);
			$('#descripcion2').val(respuesta['descripcion']);
			
			
			
		}
	});
}


