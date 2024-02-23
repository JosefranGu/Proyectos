<?php 
    if(!isset($_GET['Recibo'])){
        header('Location: listarParihuela.php?mensaje=error');
        exit();
    }

    include '../conexion/conexion.php';
    $Recibo = $_GET['Recibo'];

    $sentencia = $bd->prepare("DELETE FROM parihuela where Recibo = ?;");
    $resultado = $sentencia->execute([$Recibo]);

    if ($resultado === TRUE) {
        header('Location: listarParihuela.php?mensaje=eliminado');
    } else {
        header('Location: listarParihuela.php?mensaje=error');
    }
    
?>