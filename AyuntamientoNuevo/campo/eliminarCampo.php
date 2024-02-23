<?php 
    if(!isset($_GET['Recibo'])){
        header('Location: listarCampo.php?mensaje=error');
        exit();
    }

    include '../conexion/conexion.php';
    $Recibo = $_GET['Recibo'];

    $sentencia = $bd->prepare("DELETE FROM campo where Recibo = ?;");
    $resultado = $sentencia->execute([$Recibo]);

    if ($resultado === TRUE) {
        header('Location: listarCampo.php?mensaje=eliminado');
    } else {
        header('Location: listarCampo.php?mensaje=error');
    }
    
?>