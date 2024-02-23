<?php 
    if(!isset($_GET['Recibo'])){
        header('Location: listarSolar.php?mensaje=error');
        exit();
    }

    include '../conexion/conexion.php';
    $Recibo = $_GET['Recibo'];

    $sentencia = $bd->prepare("DELETE FROM solar where Recibo = ?;");
    $resultado = $sentencia->execute([$Recibo]);

    if ($resultado === TRUE) {
        header('Location: listarSolar.php?mensaje=eliminado');
    } else {
        header('Location: listarSolar.php?mensaje=error');
    }
    
?>