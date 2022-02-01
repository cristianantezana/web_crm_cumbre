<?php  
 if(isset($_POST["employee_id"]))  
 {  
      $output = '';  
      require_once "../../clases/Conexion.php";
      $con = new Conexion();
      $conexion = $con->conectar();
  
      $sql = " SELECT c.colegio,
      c.encargado,
      c.telefono_oficina,
      ti.tipo,
      c.descripcion 
          FROM `colegios` c INNER JOIN tipo_colegio ti ON c.tipo  = ti.id_colegio WHERE id = '".$_POST["employee_id"]."' ";
      $result = mysqli_query($conexion, $sql);


      $output .= '  
      <div class="table-responsive">  
           <table class="table table-striped"">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td width="30%"><b><label>Nombre Colegio</label></b></td>  
                     <td width="70%">'.$row["colegio"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><b><label>Encargada</label></b></td>  
                     <td width="70%">'.$row["encargado"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><b><label>Telefono</label></b></td>  
                     <td width="70%">'.$row["telefono_oficina"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><b><label>Tipo De Colegio</label></b></td>  
                     <td width="70%">'.$row["tipo"].'</td>  
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
