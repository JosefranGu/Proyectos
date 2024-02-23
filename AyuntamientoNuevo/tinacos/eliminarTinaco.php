<?php 
    if(!isset($_GET['Recibo'])){
        header('Location: listarTinaco.php?mensaje=error');
        exit();
    }

    include '../conexion/conexion.php';
    $Recibo = $_GET['Recibo'];

    $sentencia = $bd->prepare("DELETE FROM tinacos where Recibo = ?;");
    $resultado = $sentencia->execute([$Recibo]);

    if ($resultado === TRUE) {
        header('Location: listarTinaco.php?mensaje=eliminado');
    } else {
        header('Location: listarTinaco.php?mensaje=error');
    }
    
?>