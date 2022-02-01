<!DOCTYPE html>
<html>

<head>
	<title>Interesado</title>
	<link rel="icon" type="image/jpg" href="public/img/favicon.webp">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1,
	 shrink-to-fit=no">
	<?php require_once "dependencias.php"; ?>
</head>

<body>

	<?php require_once "menu.php"; ?>
	<div class="container">
		<h1 class="mt-4">Interesados</h1>

		<div class="card mb-4">
			<a href="procesos//colegio/Excel_Interesados.php" class="btn btn-success" style=" background-color:#E6E6FA ;color: black; font-weight: bold; ">Descarcar En EXCEL <samp>
					<i class="fas fa-file-excel"></i></samp></a>
			<div class="card-header"><i class="fas fa-table mr-1"></i>DATOS</div>
			<div class="card-body">
				<div id="TablaInteresados"></div>
			</div>
		</div>
	</div>
	</div>
	</div>
	<script src="public/js/Intersados.js"></script>
</body>

</html>