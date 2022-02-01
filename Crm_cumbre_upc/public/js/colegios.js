$(document).ready(function(){
	$('#cargaTablaColegios').load('vistas/colegios/tablaColegios.php');
	$(".modal-header").css("background-color", "#003a73");
    $(".modal-header").css("color", "white");
	$(".modal-header2").css("background-color", "#FDE500");
    $(".modal-header2").css("color", "white")
	
	$('#btnGuardarColegio').click(function(){
		if ($('#tipo_colegio').val() == 0) {
			swal("Debes selecciona una Tipo Colegio");
			return false;
		} else if ($('#nombre_colegio').val() == "") {
			swal("Debes agregar el nombre");
			return false;
		}else if ($('#telefono_cole').val() == "") {
			swal("Debes agregar el Telefono");
			return false;
		
		}else if ($('#direccion').val() == "") {
			swal("Debes agregar una Direccion");
			return false;
		}

		agregarColegio();
	});

	$('#btnActualizarColegio').click(function(){
		actualizarColegio();
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
function agregarColegio() {
	$.ajax({
		type:"POST",
		data:$('#frmAgregarColegio').serialize(),
		url: "procesos/colegio/agregarColegio.php",
		success:function(respuesta) {
			respuesta = respuesta.trim();
			if (respuesta == 1) {
				$('#frmAgregarColegio')[0].reset();
				$('#cargaTablaColegios').load('vistas/colegios/tablaColegios.php');
				$('#modalAgregarColegio').modal("toggle");
				swal(":D","Se agrego con exito!","success");
			} else {
				swal(":(","No se pudo agregar!","error");
			}
		}
	});
}

function eliminarCategoria(idCategoria) {
	swal({
		title: "¿Esta seguro de eliminar esta categoria?",
		text: "Una vez eliminado no podra ser recuperado!",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	})
	.then((willDelete) => {
		if (willDelete) {
			$.ajax({
				type: "POST",
				data: "idCategoria=" + idCategoria,
				url: "procesos/categorias/eliminarCategoria.php",
				success:function(respuesta) {
					respuesta = respuesta.trim();
					if (respuesta == 1) {
						$('#cargaTablaCategorias').load('vistas/categorias/tablaCategorias.php');
						swal(":D","Se elimino con exito!","success");
					} else {
						swal(":(","No se pudo eliminar!","error");
					}
				}
			});
		} 
	});
}

function obtenerDatosColegio(idColegio) {
	$.ajax({
		type:"POST",
		data:"idColegio=" + idColegio,
		url:"procesos/colegio/obtenerDatosColegio.php",
		success:function(respuesta) {
			respuesta = jQuery.parseJSON(respuesta);
			idColegio= respuesta['tipo'];
			$('#tipo_colegio_id2').load("vistas/contactos/select_Tipo_ColegioUptade.php?idColegio=" + idColegio);
			$('#idColegio').val(respuesta['id_contacto']);
			$('#nombre_colegio2').val(respuesta['colegio']);
			$('#encargada2').val(respuesta['encargada']);
			$('#telefono_cole2').val(respuesta['telefono']);
			$('#telefono_o2').val(respuesta['telefono_oficina']);
			$('#direccion2').val(respuesta['direccion']);
			$('#descripcion_colegio2').val(respuesta['descripcion']);
		}
	});
}

function actualizarColegio() {
	$.ajax({
		type:"POST",
		data:$('#frmActualizarColegio').serialize(),
		url: "procesos/colegio/actualizarColegio.php",
		success:function(respuesta) {
			respuesta = respuesta.trim();
			if (respuesta == 1) {
				$('#cargaTablaColegios').load('vistas/colegios/tablaColegios.php');
				$('#modalActualizarColegio').modal("toggle");
				swal(":D","Se actualizo con exito!","success");
			} else {
				swal(":(","No se pudo actualizar!","error");
			}
		}
	});
}