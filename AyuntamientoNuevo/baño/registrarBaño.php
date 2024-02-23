<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtRecibo"]) || empty($_POST["txtFecha"]) || empty($_POST["txtNombre"] || empty($_POST["txtTelefono"])) || empty($_POST["txtTelefonoAdi"])|| empty($_POST["txtNumArt"])|| empty($_POST["txtDescripcion"])|| empty($_POST["txtMonto"]|| empty($_POST["txtResta"])|| empty($_POST["txtPagado"]) || empty($_POST["txtEntregado"])) || empty($_POST["txtTotal"]) || empty($_POST["txtNumRecibo"]) || empty($_POST["txtNota"])){
        header('Location: registroBaño.php?mensaje=falta');
        exit();
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

    $sentencia = $bd->prepare("INSERT INTO bano (Recibo,Fecha,NombreCompleto,Telefono,Adicional,NumArticulos,Articulo,Monto,Resta,Pagado,Entregado,Total,Recibo1,Nota) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$Recibo,$Fecha,$NombreCompleto,$Telefono,$Adicional,$NumArticulos,$Articulo,$Monto,$Resta,$Pagado,$Entregado,$Total,$Recibo1,$Nota]);

    if ($resultado === TRUE) {
        header('Location: registroBaño.php?mensaje=registrado');
    } else {
        header('Location: registroBaño.php?mensaje=error');
        exit();
    }
    
?>