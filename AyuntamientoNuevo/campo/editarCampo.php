<?php
include '../conexion/conexion.php';
include '../templates/encabezado.php'; ?>

<?php
if (!isset($_GET['Recibo'])) {
    header('Location: listarCampo.php?mensaje=error');
    exit();
}

include_once '../conexion/conexion.php';
$Recibo = $_GET['Recibo'];

$sentencia = $bd->prepare("select * from campo where Recibo = ?;");
$sentencia->execute([$Recibo]);
$producto = $sentencia->fetch(PDO::FETCH_OBJ);
//print_r($persona);
?>
<br><br>

<div class="container mt-7">
    <div class="justify-content-center">
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
        <div align="center">
            <a align="left" class="btn btn-secondary" href="listarCampo.php" role="button">Visualizar Datos </a>
            <a align="right" class="btn btn-danger" href="../index.php" role="button">Salir</a>
        </div>
        <br>

        <div class="col-md-text-center">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProcesoCampo.php">
                    <div class="mb-3">
                        <label class="form-label">Recibo: </label>
                        <input type="number" class="form-control" name="txtRecibo" autofocus required value="<?php echo $producto->Recibo;?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha: </label>
                        <input type="date" class="form-control" name="txtFecha" autofocus required value="<?php echo $producto->Fecha;?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombre Completo: </label>
                        <input type="text" class="form-control" name="txtNombre" autofocus required value="<?php echo $producto->NombreCompleto;?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Telefono: </label>
                        <input type="text" class="form-control" name="txtTelefono" autofocus required value="<?php echo $producto->Telefono;?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Telefono Adicional: </label>
                        <input type="text" class="form-control" name="txtTelefonoAdi" autofocus required value="<?php echo $producto->Adicional; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Numero de Articulos: </label>
                        <input type="text" class="form-control" name="txtNumArt" autofocus required value="<?php echo $producto->NumArticulos; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descripcion: </label>
                        <select class="form-select form-select" name="txtDescripcion" autofocus required value="<?php echo $producto->Articulo; ?>">
                            <option>Paquete Campo</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Monto: </label>
                        <input type="text" class="form-control" name="txtMonto" autofocus required value="<?php echo $producto->Monto; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Resta: </label>
                        <input type="text" class="form-control" name="txtResta" autofocus required value="<?php echo $producto->Resta; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pagado: </label>
                        <select class="form-select form-select" name="txtPagado" autofocus required vale="<?php echo $producto->Pagado; ?>">
                            <option>PAGADO  </option>
                            <option>NO PAGADO</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Entregado: </label>
                        <select class="form-select form-select" name="txtEntregado" autofocus required value="<?php echo $producto->Entregado; ?>">
                            <option>ENTREGADO</option>
                            <option>NO ENTREGADO</option>
                            <option>CANCELADO</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Total: </label>
                        <input type="text" class="form-control" name="txtTotal" autofocus required value="<?php echo $producto->Total; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Numero de recibo: </label>
                        <input type="text" class="form-control" name="txtNumRecibo" autofocus required value="<?php echo $producto->Recibo1; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nota: </label>
                        <input type="text" class="form-control" name="txtNota" autofocus required value="<?php echo $producto->Nota; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="Recibo" value="<?php echo $producto->Recibo; ?>">
                        <input type="submit" class="btn btn-success" value="Editar Datos">
                        <br>
                        <input type="reset" class="btn btn-primary" value="Reestablecer">

                    </div>
                </form>
            </div>
        </div>


    </div>
</div>
<br>

<?php include '../templates/pie.php' ?>