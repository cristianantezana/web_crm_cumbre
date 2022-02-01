<?php 

	require_once "Conexion.php";

	class Usuario extends Conexion {
		
		public function obtenerDatosUsuario($usuario) {
			$conexion = Conexion::conectar();
			$sql = "SELECT id FROM usuarioos WHERE id=  '$usuario'";
			$result = mysqli_query($conexion, $sql);
			$categoria = mysqli_fetch_array($result);

			$datos = array(
					 "usuario" => $categoria['id'],
					 );
			return $datos;
		}

		
	}
 ?>