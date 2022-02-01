$(document).ready(function(){
	
	$('#cargaTablaCategorias').load('vistas/Datos/tabla_datos.php');
	$(".modal-header").css("background-color", "#003a73");
    $(".modal-header").css("color", "white");
	
	$('#btnGuardarCategoria').click(function(){

		if ($('#nombreCategoria').val() == "") {
			swal("Debes agregar un nombre de Un Dato!");
			return false;
		}

		agregarCategoria();
	});

	$('#btnActualizarCategoria').click(function(){
		actualizarCategoria();
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
function agregarCategoria() {
	$.ajax({
		type:"POST",
		data:$('#frmAgregarCategoria').serialize(),
		url: "procesos/categorias/agregarCategoria.php",
		success:function(respuesta) {
			respuesta = respuesta.trim();
			if (respuesta == 1) {
				$('#frmAgregarCategoria')[0].reset();
				$('#cargaTablaCategorias').load('vistas/Datos/tabla_datos.php');
				$('#modalAgregarCategoria').modal("toggle");
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
						$('#cargaTablaCategorias').load('vistas/Datos/tabla_datos.php');
						swal(":D","Se elimino con exito!","success");
					} else {
						swal(":(","No se pudo eliminar!","error");
					}
				}
			});
		} 
	});
}

function obtenerDatosCategoria(idCategoria) {
	$.ajax({
		type:"POST",
		data:"idCategoria=" + idCategoria,
		url:"procesos/categorias/obtenerDatosCategoria.php",
		success:function(respuesta) {
			respuesta = jQuery.parseJSON(respuesta);

			$('#idCategoria').val(respuesta['idCategoria']);
			$('#nombreCategoriaU').val(respuesta['nombre']);
			
		}
	});
}

function actualizarCategoria() {
	$.ajax({
		type:"POST",
		data:$('#frmActualizarCategoria').serialize(),
		url: "procesos/categorias/actualizarCategoria.php",
		success:function(respuesta) {
			respuesta = respuesta.trim();
			if (respuesta == 1) {
				$('#cargaTablaCategorias').load('vistas/Datos/tabla_datos.php');
				$('#modalActualizarCategoria').modal("toggle");
				swal(":D","Se actualizo con exito!","success");
			} else {
				swal(":(","No se pudo actualizar!","error");
			}
		}
	});
}