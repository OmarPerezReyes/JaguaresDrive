<?php


if(isset($_GET['viaje'])){

    $id_viaje = $_GET['viaje'];

    include_once '../../bd/conexion.php';

    $objConexion = new Conexion();
    $conexion = $objConexion->conectar();

    $sql = "UPDATE viaje SET estado = '1' WHERE id_viaje = '$id_viaje'";
    $result = $conexion->query($sql);

    if($result){
        header("Location: ../../drive/conductor.php");
    }else{
        echo $sql;
        echo "Error al aceptar la solicitud";
    }

}

?>