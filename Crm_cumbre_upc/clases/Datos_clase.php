<?php 

	require_once "Conexion.php";

	class Categorias extends Conexion {
		public function agregarCategoria($datos) {
			$conexion = Conexion::conectar();
			$sql = "INSERT INTO origen_dato (datos) 
					VALUES ( ?)";
			$query = $conexion->prepare($sql);
			$query->bind_param('s', $datos['nombre']
									 );
			$respuesta = $query->execute();
			return $respuesta;
		}
		public function eliminaContacto($idCategoria) {
			$conexion = Conexion::conectar();
			$sql = "DELETE FROM asignado WHERE id = ?";
			$query = $conexion->prepare($sql);
			$query->bind_param('i', $idCategoria);
			$respuesta = $query->execute();
			return $respuesta;
		}

		public function eliminaCategoria($idCategoria) {
			$conexion = Conexion::conectar();
			$sql = "DELETE FROM origen_dato WHERE id_dato = ?";
			$query = $conexion->prepare($sql);
			$query->bind_param('i', $idCategoria);
			$respuesta = $query->execute();
			return $respuesta;
		}

		public function obtenerDatosCategoria($idCategoria) {
			$conexion = Conexion::conectar();
			$sql = "SELECT id_dato,
							datos 
					FROM origen_dato 
					WHERE id_dato = '$idCategoria'";
			$result = mysqli_query($conexion, $sql);
			$categoria = mysqli_fetch_array($result);

			$datos = array(
					 "idCategoria" => $categoria['id_dato'],
					 "nombre" => $categoria['datos'],
					 
							);
			return $datos;
		}

		public function actualizarCategoria($datos) {
			$conexion = Conexion::conectar();

			$sql = "UPDATE origen_dato SET datos = ?
										
					WHERE id_dato = ?";
			$query = $conexion->prepare($sql);
			$query->bind_param('si', $datos['nombre'],
									  $datos['idCategoria']);
			$respuesta = $query->execute();
			return $respuesta;
		}
	}
 ?>