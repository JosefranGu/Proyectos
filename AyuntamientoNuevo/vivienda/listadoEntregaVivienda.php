<?php include_once '../templates/encabezado.php'; ?>
<?php
include_once "../conexion/conexion.php";
$sentencia = $bd->query("SELECT Recibo, NombreCompleto, Telefono, Adicional, NumArticulos, Articulo, Entregado, Nota FROM vivienda WHERE Entregado='NO ENTREGADO' ORDER BY Recibo;");
$producto = $sentencia->fetchAll(PDO::FETCH_OBJ);
//print_r($persona);
?>
<div>
    <h2 class="text-center">Listado de Paquete de Mejoramiento de Vivienda Entregas</h2>
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
            <th width="8%" class="text-center">Nombre Completo</th>
            <th width="8%" class="text-center">Telefono</th>
            <th width="8%" class="text-center">Telefono Adicional</th>
            <th width="8%" class="text-center">Numero de articulos</th>
            <th width="8%" class="text-center">Descripcion</th>
            <th width="8%" class="text-center">Entregado</th>
            <th width="8%" class="text-center">Nota</th>
        </tr>
        <?php foreach ($producto as $dato) { ?>
            <tr>
                <th width="8%" class="text-center"><?php echo $dato->Recibo; ?></th>
                <th width="8%" class="text-center"><?php echo $dato->NombreCompleto ?></th>
                <th width="8%" class="text-center"><?php echo $dato->Telefono ?></th>
                <th width="8%" class="text-center"><?php echo $dato->Adicional ?></th>
                <th width="8%" class="text-center"><?php echo $dato->NumArticulos ?></th>
                <th width="8%" class="text-center"><?php echo $dato->Articulo ?></th>
                <th width="8%" class="text-center"><?php echo $dato->Entregado ?></th>
                <th width="8%" class="text-center"><?php echo $dato->Nota ?></th>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php include '../templates/pie.php' ?>