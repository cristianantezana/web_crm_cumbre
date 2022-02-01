<?php  
 if(isset($_POST["employee_id"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "crm");  
      $query = "SELECT c.id_contacto, c.nombre, c.apellido, pa.parentesco, c.colegio_instituto, c.telefono, tu.turno,ti.tipo, carr.carrera_secundaria,c.telefono_padre,c.descripcion, ca.carrera, i.instancia, o.datos FROM contactos c INNER JOIN producto_secundario carr ON c.carrera_secundaria = carr.id_secundario INNER JOIN carrera_interesada ca on c.carrera_interesada = ca.id_carrera INNER JOIN tipo_colegio ti on c.tipo_colegio = ti.id_colegio INNER JOIN  parentesco pa ON c.parentesco = pa.id INNER JOIN turno_llamada tu ON c.turno_llamada = tu.id_llamada INNER JOIN instancias i ON c.instancia = i.id_instancia INNER JOIN origen_dato o ON c.origen_contacto = o.id_dato WHERE id_contacto  = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td width="30%"><label>Nombre</label></td>  
                     <td width="70%">'.$row["nombre"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Apellido</label></td>  
                     <td width="70%">'.$row["apellido"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Carrera Interesada</label></td>  
                     <td width="70%">'.$row["carrera"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Telefono</label></td>  
                     <td width="70%">'.$row["telefono"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Tipo de Colegio</label></td>  
                     <td width="70%">'.$row["tipo"].'</td>  
                </tr>  
                <tr>  
                    <td width="30%"><label>Telefono Padre</label></td>  
                    <td width="70%">'.$row["telefono_padre"].'</td>  
                </tr>
                <tr>  
                    <td width="30%"><label>Carrera Secundaria</label></td>  
                    <td width="70%">'.$row["carrera_secundaria"].'</td>  
                </tr>
                
                ';  
      }  
      $output .= "</table></div>";  
      echo $output;  
 }  
 ?>