<?php 
    if(!isset($_GET['Recibo'])){
        header('Location: listar.php?mensaje=error');
        exit();
    }

    include '../conexion/conexion.php';
    $Recibo = $_GET['Recibo'];

    $sentencia = $bd->prepare("DELETE FROM paquetes where Recibo = ?;");
    $resultado = $sentencia->execute([$Recibo]);

    if ($resultado === TRUE) {
        header('Location: listar.php?mensaje=eliminado');
    } else {
        header('Location: listar.php?mensaje=error');
    }
    
?>