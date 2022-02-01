
<?php 
	
	class Conexion {

		public function conectar() {
			$servidor = "localhost";
			$usuario = "root";
			$password = "";
			$bd = "crm";

			$conexion = mysqli_connect($servidor, $usuario, $password, $bd);

			return $conexion;
		}
	}

 ?>