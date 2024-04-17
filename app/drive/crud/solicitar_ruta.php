<?php


if(isset($_GET['id_us']) && isset($_GET['ruta'])){
    $id_us = $_GET['id_us'];
    $id_ruta = $_GET['ruta'];

    include_once '../../bd/conexion.php';

    $objConexion = new Conexion();
    $conexion = $objConexion->conectar();

    $query = "SELECT * FROM ruta WHERE id_ruta = '$id_ruta'";
    $result = $conexion->query($query);
    $row = $result->fetch_assoc();
    $id_conductor = $row['id_conductor'];

    $query = "SELECT * FROM pasajero WHERE usuario_id = '$id_us'";
    $result = $conexion->query($query);
    $row = $result->fetch_assoc();
    $id_us = $row['pasajero_id'];

    $sql = "INSERT INTO viaje (id_pasajero, id_ruta, id_conductor,  estado) VALUES ('$id_us', '$id_ruta', '$id_conductor', '0');";
    $result = $conexion->query($sql);

    if($result){
        header("Location: ../../drive/pasajero.php");
    }else{
        echo $sql;
        echo "Error al solicitar la ruta";
    }
}

?>