<!-- //
	
	session_start();
	
	// if(!isset($_SESSION['id'])){
	// 	header("Location: index.php");
	// }
	
	inicio de sesion php admin mysql ala base de datos
	// $usuario = $_SESSION['id'];
	
	
// ?> -->


<nav class="navbar navbar-expand-lg navbar-dark " id="nav" >
  <a class="navbar-brand" href="index.php">
    <span class=""></span>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="principal.php">
          <span class="fas fa-house-user"></span> Inicio
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="contactos.php">
          <span class="fas fa-id-card-alt"></span> Contactos
        </a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="contactos_Asignado.php">
          <span class="fas fa-calendar-check"></span> Contactos Asignados
        </a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="datos.php">
          <span class="fas fa-layer-group"></span> Origen del Datos
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="colegios.php">
          <span class="fas fa-graduation-cap"></span> Colegios
        </a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="asignaion_de_contacto.php">
          <span class="fas fa-user-plus"></span> Asignar Contacto
        </a>
      </li>

      <li class="nav-item active">
        <div class="container">
          <div class="dropdown">
            <button class="btn btn_nav" type="button" id="dropdown1" data-toggle="dropdown" >
              <span class="fas fa-chart-line"></span> Reportes
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="reportes.php">Reportes Graficos</a>
              <a class="dropdown-item" href="reporte_total.php">Reportes Totales</a>
              <a class="dropdown-item" href="reporte_por_filtros.php">Reporte Por Filtro</a>
            </div>
          </div>
        </div>

      </li>

      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <span class="fas fa-user-plus"></span> Salir
        </a>
      </li>
    </ul>

  </div>
</nav>