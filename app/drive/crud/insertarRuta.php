<?php

include_once '../../bd/conexion.php';

$objConexion = new Conexion();
$conexion = $objConexion->conectar();

if(isset($_POST['insertar_ruta'])){

    $id_conductor = $_POST['id_usuario'];
    $coordenadas = $_POST['coordenadas2'];
    $costo = $_POST['costo'];
    $hora = $_POST['hora'];
    $descripcion = $_POST['descripcion'];


    $query = "SELECT * FROM conductor WHERE usuario_id = '$id_conductor'";
    $result = $conexion->query($query);
    $row = $result->fetch_assoc();
    $id_conductor = $row['id_conductor'];
    
    $verificacion = "DELETE FROM viaje WHERE id_conductor = '$id_conductor'";
    $conexion->query($verificacion);
   
    $verificacion = "DELETE FROM ruta WHERE id_conductor = '$id_conductor'";
    $conexion->query($verificacion);

    $sql = "INSERT INTO ruta (id_conductor, puntos, costo_viaje, duracion, descripcion, estado) VALUES ('$id_conductor', '$coordenadas', '$costo', '$hora', '$descripcion', 'Activo');";
  
    $result = $conexion->query($sql);
    
    if($result){
        header("Location: ../../drive/conductor.php");
    }
    
}

?>