<!DOCTYPE html>
<html>

<head>
	<title>Contactos agenda</title>
	<link rel="icon" type="image/jpg" href="public/img/favicon.webp">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php require_once "dependencias.php"; ?>
</head>

<body>

	<?php require_once "menu.php"; ?>
	<div class="container">
		<div class="row">
			<div class="col-8">
				<h1 class="mt-4">Contactos</h1>
			</div>
			<div class="col-4 ">
				<input class="form-control mt-4" type="text" placeholder="Buscar" aria-label="Search" id="buscar" name="buscar" onkeyup="buscar_ahora($('#buscar').val());">
			</div>
		</div>
	</div>


	<div class="card mb-4">
		<button type="button" class=" btn btn_agregar " data-toggle="modal" data-target="#modalAgregarContacto" >
			Nuevo Contacto <span><i class="fas fa-plus-circle"></i></span>
		</button>
		<div class="card-header"><i class="fas fa-table mr-1"></i>Contactos</div>
		<div class="card-body">

			<div id="cargaTablaContactos"></div>

		</div>
	</div>
	</div>
	</div>
	<?php
	require_once "vistas/contactos/modalAgregar.php";
	require_once "vistas/contactos/modalActualizar.php";
	?>

	</div>

	<script src="public/js/contactos.js"></script>
	<script type="text/javascript">
		function buscar_ahora(buscar) {
			var parametros = {
				"buscar": buscar
			};
			$.ajax({
				data: parametros,
				type: 'POST',
				url: 'buscador.php',
				success: function(data) {
					document.getElementById("cargaTablaContactos").innerHTML = data;
				}
			});
		}
	</script>
</body>

</html>
