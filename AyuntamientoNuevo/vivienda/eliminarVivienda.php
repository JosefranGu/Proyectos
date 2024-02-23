<?php 
    if(!isset($_GET['Recibo'])){
        header('Location: listarVivienda.php?mensaje=error');
        exit();
    }

    include '../conexion/conexion.php';
    $Recibo = $_GET['Recibo'];

    $sentencia = $bd->prepare("DELETE FROM vivienda where Recibo = ?;");
    $resultado = $sentencia->execute([$Recibo]);

    if ($resultado === TRUE) {
        header('Location: listarVivienda.php?mensaje=eliminado');
    } else {
        header('Location: listarVivienda.php?mensaje=error');
    }
    
?>