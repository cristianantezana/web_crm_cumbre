<?php  
 if(isset($_POST["employee_id"]))  
 {  
     $output = '';  
     require_once "../../clases/Conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();

    $sql = "SELECT a.id, ac.actividad, r.resultado, a.fecha_sig_actividad, e.estado, a.descripcion, c.nombre,c.apellido fecha FROM avtividades a INNER JOIN actividad_realizada ac ON a.actividad = ac.id INNER JOIN resultado_llamada r ON a.resultado_llamada = r.id INNER JOIN estado_actividad e ON a.estado = e.id INNER JOIN contactos c ON a.contacto_id = c.id_contacto WHERE a.id=  '".$_POST["employee_id"]."' ";
    $result = mysqli_query($conexion, $sql);
     
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-striped">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td width="30%"><b><label>Nombre</label></b></td>  
                     <td width="70%">'.$row["nombre"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><b><label>Apellido</label></b></td>  
                     <td width="70%">'.$row["fecha"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><b><label>Resultado llamada</label></b></td>  
                     <td width="70%">'.$row["resultado"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><b><label>Estado</label></b></td>  
                     <td width="70%">'.$row["estado"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><b><label>Fecha Siguiente LLamada</label></b></td>  
                     <td width="70%">'.$row["fecha_sig_actividad"].'</td>  
                </tr>  
                <tr>  
                    <td width="30%"><b><label>Descripcion</label></b></td>  
                    <td width="70%">'.$row["descripcion"].'</td>  
                </tr>
               
                
                ';  
      }  
      $output .= "</table></div>";  
      echo $output;  
 }  
 ?>