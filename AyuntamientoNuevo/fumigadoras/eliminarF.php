<?php 
    if(!isset($_GET['Recibo'])){
        header('Location: listarF.php?mensaje=error');
        exit();
    }

    include '../conexion/conexion.php';
    $Recibo = $_GET['Recibo'];

    $sentencia = $bd->prepare("DELETE FROM fumigadoras where Recibo = ?;");
    $resultado = $sentencia->execute([$Recibo]);

    if ($resultado === TRUE) {
        header('Location: listarF.php?mensaje=eliminado');
    } else {
        header('Location: listarF.php?mensaje=error');
    }
    
?>