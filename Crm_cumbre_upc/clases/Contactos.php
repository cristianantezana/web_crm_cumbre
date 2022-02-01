<?php 
	require_once "Conexion.php";

	class Contactos extends Conexion {
		public function agregarContacto($datos) {
			$conexion = Conexion::conectar();

			$sql = "INSERT INTO `contactos` ( `nombre`, 
												`apellido`,
												`parentesco`, 
											 	`colegio_instituto`,
											 	`telefono`, 
												`carrera_interesada`,
											  	`instancia`, 
											  	`turno_llamada`,
												`tipo_colegio`,
												`carrera_secundaria`,
												`origen_contacto`, 
												`telefono_padre`, 
												`tipo`,
												`descripcion`) 
					VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
			$query = $conexion->prepare($sql);
			$query->bind_param('ssissiiiiiisis', $datos['nombre'],
										 $datos['apellido'],
										 $datos['parentesco'],
										 $datos['colegio'],
										 $datos['telefono'],
										 $datos['carrera'],
										 $datos['estado'],
										 $datos['turno_llamada'],
										 $datos['tipo_colegio'],
										 $datos['segunda_carrera'],
										 $datos['dato'],
										 $datos['telefono_padre'],
										 $datos['tipo'],
										 $datos['descripcion']);
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

		public function obtenerDatosContacto($idContacto) {
			$conexion = Conexion::conectar();

			$sql = "SELECT id_contacto,
								nombre, 
								apellido,
								parentesco, 
								colegio_instituto, 
								telefono, 
								carrera_interesada, 
								instancia,
								turno_llamada,
								tipo_colegio, 
								carrera_secundaria,
								origen_contacto, 
								telefono_padre, 
								tipo,
								descripcion 
								FROM `contactos`
			where id_contacto ='$idContacto'";
			$result = mysqli_query($conexion, $sql);

			$contacto = mysqli_fetch_array($result);

			$datos = array(
						"id_contacto" => $contacto['id_contacto'],
						"nombre" => $contacto['nombre'],
						"apellido" => $contacto['apellido'],
						"id_categoria" => $contacto['parentesco'],
						"colegio" => $contacto['colegio_instituto'],
						"telefono" => $contacto['telefono'],
						"carrera" => $contacto['carrera_interesada'],
						"intancia" => $contacto['instancia'],
						"turno_llamada" => $contacto['turno_llamada'],
						"tipo_colegio" => $contacto['tipo_colegio'],
						"carrera_secundaria" => $contacto['carrera_secundaria'],
						"origen_dato" => $contacto['origen_contacto'],
						"telefono_padre" => $contacto['telefono_padre'],
						"tipo" => $contacto['tipo'],
						"descripcion" => $contacto['descripcion'],
				
							);
			return $datos;
		}

		public function actualizarContacto($datos) {
			$conexion = Conexion::conectar();

			$sql = "UPDATE `contactos` SET `nombre` = ?,
										`apellido` = ?,
										`parentesco` = ?,
										`colegio_instituto` = ?,
										`carrera_interesada` = ?, 
										`instancia` = ?,
										`telefono` = ?,
										`turno_llamada` = ?,
										`tipo_colegio` = ?,
										`carrera_secundaria` = ?,
										`origen_contacto` = ?,
										`telefono_padre` = ?,
										`tipo` = ?,
										`descripcion` =  ?
										WHERE `contactos`.`id_contacto` = ?";
			$query = $conexion->prepare($sql);
			$query->bind_param('ssissiiiiiisisi', $datos['nombre'],
													$datos['apellido'],
													$datos['parentesco'],
													$datos['colegio'],
													$datos['carrera'],
													$datos['estado'],
													$datos['telefono'],
													$datos['turno_llamada'],
													$datos['tipo_colegio'],
													$datos['segunda_carrera'],
													$datos['dato'],
													$datos['telefono_padre'],
													$datos['tipo'],
													$datos['descripcion'],
													$datos['idContacto']);
			$respuesta = $query->execute();
			return $respuesta;
		}
	}

 ?>