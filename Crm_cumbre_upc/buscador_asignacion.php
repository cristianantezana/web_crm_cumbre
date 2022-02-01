<?php
require_once "clases/Conexion.php";
$con = new Conexion();
$conexion = $con->conectar();
$sql = ("SELECT id_contacto, nombre,apellido,descripcion FROM contactos  WHERE nombre LIKE LOWER('%" . $_POST['buscar'] . "%')OR apellido LIKE LOWER ('%" . $_POST['buscar'] . "%') ORDER BY id_contacto DESC LIMIT 10;");
$result = mysqli_query($conexion, $sql);

?>
<table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
    <thead>
        <input type="text" id="id_usuario" name="id_usuario" hidden>
        <tr>
            <th style="width:15px" class="text-center">Seleciona</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Descripcion</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($dataRegistro = mysqli_fetch_assoc($result)) { ?>
            <tr id="id<?php echo $dataRegistro['id_contacto']; ?>">
                <td class="text-center">

                    <input type="checkbox" name="ids[]" value="<?php echo $dataRegistro['id_contacto']; ?>" class="delete_checkbox">
                </td>
                <td><?php echo $dataRegistro['nombre']; ?></td>
                <td><?php echo $dataRegistro['apellido']; ?></td>
                <td><?php echo $dataRegistro['descripcion']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>