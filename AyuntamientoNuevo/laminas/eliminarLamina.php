<?php 
    if(!isset($_GET['Recibo'])){
        header('Location: listarLamina.php?mensaje=error');
        exit();
    }

    include '../conexion/conexion.php';
    $Recibo = $_GET['Recibo'];

    $sentencia = $bd->prepare("DELETE FROM laminas where Recibo = ?;");
    $resultado = $sentencia->execute([$Recibo]);

    if ($resultado === TRUE) {
        header('Location: listarLamina.php?mensaje=eliminado');
    } else {
        header('Location: listarLamina.php?mensaje=error');
    }
    
?>