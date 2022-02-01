<?php 
	require_once "Conexion.php";

	class Colegio extends Conexion {
		public function agregarColegio($datos) {
			$conexion = Conexion::conectar();

			$sql = "INSERT INTO `colegios` (`colegio`,
											 `encargado`, 
											 `telefono`, 
											 `telefono_oficina`,
											  `tipo`, 
											  `direccion`, 
											  `descripcion`)
					VALUES (?, ?, ?, ?, ?, ?,?)";
			$query = $conexion->prepare($sql);
			$query->bind_param('ssssiss', $datos['nombre'],
										 $datos['encargada'],
										 $datos['telefono'],
										 $datos['telefono_oficina'],
										 $datos['tipo'],
										 $datos['direccion'],
										 $datos['descripcion']
										 );
			$respuesta = $query->execute();
			return $respuesta;
		}

		public function eliminarContacto($idContacto) {
			$conexion = Conexion::conectar();

			$sql = "DELETE FROM t_contactos WHERE id_contacto = ?";
			$query = $conexion->prepare($sql);
			$query->bind_param('i', $idContacto);
			$respuesta = $query->execute();
			return $respuesta;
		}

		public function obtenerDatosColegio($idContacto) {
			$conexion = Conexion::conectar();

			$sql = "SELECT id,
			 		colegio, 
				 	encargado,
				 	telefono,
			  	 	telefono_oficina,
			 		tipo, 
					direccion,
				 	descripcion 
				 FROM colegios
					WHERE id = '$idContacto'";
			$result = mysqli_query($conexion, $sql);

			$contacto = mysqli_fetch_array($result);

			$datos = array(
						"id_contacto" => $contacto['id'],
						"colegio" => $contacto['colegio'],
						"encargada" => $contacto['encargado'],
						"telefono" => $contacto['telefono'],
						"telefono_oficina" => $contacto['telefono_oficina'],
						"tipo" => $contacto['tipo'],
						"direccion" => $contacto['direccion'],
						"descripcion" => $contacto['descripcion']  
							);
			return $datos;
		}

		public function actualizarColegio($datos) {
			$conexion = Conexion::conectar();

			$sql = "UPDATE `colegios` SET `colegio` =?,
			`encargado` = ?, 
			`telefono` = ?,
			 `telefono_oficina` = ?,
			  `tipo` = ?, 
			  `direccion` = ?, 
			  `descripcion` = ? 
			  WHERE `colegios`.`id` = ?";
			$query = $conexion->prepare($sql);
			$query->bind_param('ssssissi', 
										  $datos['nombre'],
										  $datos['encargada'],
										  $datos['telefono_oficina'],
										  $datos['telefono'],
										  $datos['tipo'],			
										  $datos['direccion'],
										  $datos['descripcion'],
										  $datos['idContacto']);
			$respuesta = $query->execute();
			return $respuesta;
		}
	}

 ?>