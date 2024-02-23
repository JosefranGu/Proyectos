<?php
    print_r($_POST);
    if(!isset($_POST['Recibo'])){
        header('Location: listarCampo.php?mensaje=error');
    }

    include_once '../conexion/conexion.php';
    $Recibo = $_POST['txtRecibo'];
    $Fecha = $_POST['txtFecha'];
    $NombreCompleto = $_POST['txtNombre'];
    $Telefono = $_POST['txtTelefono'];
    $Adicional = $_POST['txtTelefonoAdi'];
    $NumArticulos = $_POST['txtNumArt'];
    $Articulo = $_POST['txtDescripcion'];
    $Monto = $_POST['txtMonto'];
    $Resta = $_POST['txtResta'];
    $Pagado = $_POST['txtPagado'];
    $Entregado = $_POST['txtEntregado'];
    $Total = $_POST['txtTotal'];
    $Recibo1 = $_POST['txtNumRecibo'];
    $Nota = $_POST['txtNota'];

    $sentencia = $bd->prepare("UPDATE campo SET Fecha = ? ,NombreCompleto = ? ,Telefono = ? ,Adicional = ? ,NumArticulos = ? ,Articulo = ? ,Monto = ? ,Resta = ? ,Pagado = ? ,Entregado = ? ,Total = ? ,Recibo1 = ? , Nota= ?  where Recibo = ?;");
    $resultado = $sentencia->execute([$Fecha,$NombreCompleto,$Telefono,$Adicional,$NumArticulos,$Articulo,$Monto,$Resta,$Pagado,$Entregado,$Total,$Recibo1,$Nota,$Recibo]);

    if ($resultado === TRUE) {
        header('Location: listarCampo.php?mensaje=editado');
    } else {
        header('Location: listarCampo.php?mensaje=error');
        exit();
    }
    
?>