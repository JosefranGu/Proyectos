<?php
include '../conexion/conexion.php';
include '../templates/encabezado.php'; ?>

<br>
<br>


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
            <a align="left" class="btn btn-secondary" href="listarSolar.php" role="button">Visualizar Datos </a>
            <a align="right" class="btn btn-danger" href="../index.php" role="button">Salir</a>
        </div>
        <br>
        <div class="col-md-text-center">
            <div class="card">
                <div class="card-header">
                    Ingresar datos:
                </div>
                <form class="p-4" method="POST" action="registrarSolar.php">
                    <div class="mb-3">
                        <label class="form-label">Recibo: </label>
                        <input type="text" class="form-control" name="txtRecibo" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha: </label>
                        <input type="date" class="form-control" name="txtFecha" autofocus required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nombre Completo: </label>
                        <input type="text" class="form-control" name="txtNombre" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Telefono: </label>
                        <input type="text" class="form-control" name="txtTelefono" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Telefono Adicional: </label>
                        <input type="text" class="form-control" name="txtTelefonoAdi" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Numero de Articulos: </label>
                        <input type="text" class="form-control" name="txtNumArt" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descripcion: </label>
                        <!--<input type="text" class="form-control" name="txtDescripcion" autofocus required>-->
                        <select class="form-select form-select" name="txtDescripcion" autofocus required>
                            <option>Calentador Solar 8 Tubos</option>
                            <option>Calentador Solar 10 Tubos</option>
                            <option>Calentador Solar 12 Tubos</option>
                            <option>Calentador Solar 15 Tubos</option>
                            <option>Calentador Solar 18 Tubos</option>
                            <option>Calentador Solar 20 Tubos</option>
                            <option>Calentador Solar 24 Tubos</option>
                            <option>Calentador Solar 30 Tubos</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Monto: </label>
                        <input type="text" class="form-control" name="txtMonto" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Resta: </label>
                        <input type="text" class="form-control" name="txtResta" autofocus required>
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Pagado: </label>
                        <!--<input type="text" class="form-control" name="txtPagado" autofocus required>-->
                        <select class="form-select form-select" name="txtPagado" autofocus required>
                            <option>PAGADO </option>
                            <option>NO PAGADO</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Entregado: </label>
                        <!-- <input type="text" class="form-control" name="txtEntregado" autofocus required>-->
                        <select class="form-select form-select" name="txtEntregado" autofocus required>
                            <option>ENTREGADO</option>
                            <option>NO ENTREGADO</option>
                            <option>CANCELADO</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Total: </label>
                        <input type="text" class="form-control" name="txtTotal" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Numero de recibo: </label>
                        <input type="text" class="form-control" name="txtNumRecibo" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nota: </label>
                        <input type="text" class="form-control" name="txtNota" autofocus required>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-success" value="Registrar">
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