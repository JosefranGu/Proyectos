<?php include_once '../templates/encabezado.php'; ?>
<?php
include_once "../conexion/conexion.php";
$sentencia = $bd->query("select * from vivienda order by Recibo");
$producto = $sentencia->fetchAll(PDO::FETCH_OBJ);
//print_r($persona);
?>
<!-- inicio alerta -->
<?php
if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta') {
?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Rellena todos los campos.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
}
?>


<?php
if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {
?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Registrado!</strong> Se agregaron los datos.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
}
?>



<?php
if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {
?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Vuelve a intentar.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
}
?>



<?php
if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado') {
?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Cambiado!</strong> Los datos fueron actualizados.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
}
?>


<?php
if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {
?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Eliminado!</strong> Los datos fueron borrados.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
}
?>

<!-- fin alerta -->

<div>
    <h2 class="text-center">Listado de Paquete de Mejoramiento de Vivienda</h2>
</div>
<br>
<div align="center">
    <a align="left" class="btn btn-secondary" href="registroVivienda.php" role="button">Añadir Nuevo Registro </a>
    <a align="right" class="btn btn-danger" href="../index.php" role="button">Salir</a>
</div>


<br>

<?php  ?>
<table class="table table-light table-bordered">
    <tbody>
        <tr>
            <th width="8%" class="text-center">Recibo</th>
            <th width="8%" class="text-center">Fecha</th>
            <th width="8%" class="text-center">Nombre Completo</th>
            <th width="8%" class="text-center">Telefono</th>
            <th width="8%" class="text-center">Telefono Adicional</th>
            <th width="8%" class="text-center">Numero de articulos</th>
            <th width="8%" class="text-center">Descripcion</th>
            <th width="8%" class="text-center">Monto</th>
            <th width="8%" class="text-center">Resta</th>
            <th width="8%" class="text-center">Pagado</th>
            <th width="8%" class="text-center">Entregado</th>
            <th width="8%" class="text-center">Total</th>
            <th width="8%" class="text-center">Numero de Recibo</th>
            <th width="8%" class="text-center">Nota</th>
            <th width="8%" class="text-center">Editar</th>
            <th width="8%" class="text-center">Eliminar</th>
        </tr>
        <?php foreach ($producto as $dato) { ?>
            <tr>
                <th width="8%" class="text-center"><?php echo $dato->Recibo; ?></th>
                <th width="8%" class="text-center"><?php echo $dato->Fecha ?></th>
                <th width="8%" class="text-center"><?php echo $dato->NombreCompleto ?></th>
                <th width="8%" class="text-center"><?php echo $dato->Telefono ?></th>
                <th width="8%" class="text-center"><?php echo $dato->Adicional ?></th>
                <th width="8%" class="text-center"><?php echo $dato->NumArticulos ?></th>
                <th width="8%" class="text-center"><?php echo $dato->Articulo ?></th>
                <th width="8%" class="text-center"><?php echo $dato->Monto ?></th>
                <th width="8%" class="text-center"><?php echo $dato->Resta ?></th>
                <th width="8%" class="text-center"><?php echo $dato->Pagado ?></th>
                <th width="8%" class="text-center"><?php echo $dato->Entregado ?></th>
                <th width="8%" class="text-center"><?php echo $dato->Total ?></th>
                <th width="8%" class="text-center"><?php echo $dato->Recibo1 ?></th>
                <th width="8%" class="text-center"><?php echo $dato->Nota ?></th>
                <td><a class="text-success" href="editarVivienda.php?Recibo=<?php echo $dato->Recibo; ?>"><i class="bi bi-pencil-square"></i></a></td>
                <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminarVivienda.php?Recibo=<?php echo $dato->Recibo; ?>"><i class="bi bi-trash"></i></a></td>

            </tr>
        <?php } ?>
    </tbody>
</table>
<?php include '../templates/pie.php' ?>