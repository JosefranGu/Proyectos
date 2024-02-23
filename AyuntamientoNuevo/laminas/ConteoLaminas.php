<?php include_once '../templates/encabezado.php'; ?>
<?php
include_once "../conexion/conexion.php";
$sentencia = $bd->query("CALL obtenerCantidadArticulosNoEntregadosLaminas();");
$producto = $sentencia->fetchAll(PDO::FETCH_OBJ);
//print_r($persona);
?>
<br>
<br>

<div>
    <h2 class="text-center">Conteo de Laminas</h2>
</div>
<br>
<div align="center">
    <a align="left" class="btn btn-secondary" href="registroLamina.php" role="button">Añadir Nuevo Registro </a>
    <a align="right" class="btn btn-danger" href="../index.php" role="button">Salir</a>
</div>
<br>
<?php  ?>
<table class="table table-light table-bordered">
    <tbody>
        <tr>
            <th width="8%" class="text-center">Numero de Laminas</th>
        </tr>
        <?php foreach ($producto as $dato) { ?>
            <tr>
                <th width="8%" class="text-center"><?php echo $dato->Cantidad ?></th>
            </tr>
        <?php } ?>
    </tbody>
</table>



<?php include '../templates/pie.php' ?>