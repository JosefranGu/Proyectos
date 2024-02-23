<?php 
    if(!isset($_GET['Recibo'])){
        header('Location: listarBaño.php?mensaje=error');
        exit();
    }

    include '../conexion/conexion.php';
    $Recibo = $_GET['Recibo'];

    $sentencia = $bd->prepare("DELETE FROM bano where Recibo = ?;");
    $resultado = $sentencia->execute([$Recibo]);

    if ($resultado === TRUE) {
        header('Location: listarBaño.php?mensaje=eliminado');
    } else {
        header('Location: listarBaño.php?mensaje=error');
    }
    
?>