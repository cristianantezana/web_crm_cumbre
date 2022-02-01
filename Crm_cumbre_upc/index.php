<?php
require "clases/conex.php";
session_start();
require 'clases/conex.php';
require_once "clases/Conexion.php";
$con = new Conexion();
$conexion = $con->conectar();



if ($_POST) {

	$usuario = $_POST['usuario'];
	$password = $_POST['pass'];
	$sql = "SELECT id_usuario, password, nombre,usuario FROM usuario_cumbre WHERE usuario ='$usuario'";
	$result = mysqli_query($conexion, $sql);


	$num = $result->num_rows;

	if ($num > 0) {
		$row = $result->fetch_assoc();
		$password_bd = $row['password'];



		if ($password_bd == $password) {

			$_SESSION['id'] = $row['id_usuario'];
			$_SESSION['nombre'] = $row['nombre'];
			$_SESSION['usuario'] = $row['usuario'];


			header("Location: principal.php");
		} else {
			echo "Contraseña incorecta";;
		}
	} else {
		echo "NO existe usuario";
	}
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title>CRM CUMBRE</title>
	<link rel="icon" type="image/jpg" href="public/img/favicon.webp">
	<link href="css/styles.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
	<?php require_once "dependencias.php"; ?>
</head>

<body class="bg-primary">
	<div id="layoutAuthentication">
		<div id="layoutAuthentication_content">
			<main>
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-5">
							<div class="card shadow-lg border-0 rounded-lg mt-5">
								<div class="card-header">
									<h3 class="text-center font-weight-light my-4">CRM CUMBRE</h3>
								</div>
								<div class="card-body">
									<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
										<div class="form-group"><label class="small mb-1" for="inputEmailAddress">Usuario</label><input class="form-control py-4" id="inputEmailAddress" name="usuario" type="text" placeholder="Ingrese El Usuario" /></div>
										<div class="form-group"><label class="small mb-1" for="inputPassword">Password</label><input class="form-control py-4" value="" id="pass" name="pass" type="password" placeholder="Ingrese la Contraseña" /></div>

										<div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
											<button type="submit" class="btn btn-primary">ingresar</button>
										</div>
									</form>
								</div>
								<div class="card-footer text-center">
									<div class="small"><a href="register.html">Need an account? Sign up!</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</main>
		</div>
		<div id="layoutAuthentication_footer">


		</div>
		</footer>
	</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
	<script src="js/scripts.js"></script>
</body>

</html>