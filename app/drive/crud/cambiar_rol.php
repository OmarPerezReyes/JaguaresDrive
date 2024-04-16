<?php
include_once '../../bd/conexion.php'; 
// Crear una instancia de la clase Conexion
$conexion_bd = new Conexion();
$conexion = $conexion_bd->conectar();

session_start();

if(isset($_POST['rol_pasajero'])) {
    $id_usuario = $_SESSION['usuario_id']; // Obtener el ID del usuario de alguna manera
    $rol="conductor";
    // Realizar la actualización en la base de datos
    $query = "UPDATE usuario SET rol=? WHERE usuario_id=?";
    $statement = $conexion->prepare($query);
    $statement->bind_param("si", $rol, $id_usuario);
    $statement->execute();
    
    // Redireccionar a alguna página después de la actualización
    header("Location: ../index.php");
}
if(isset($_POST['rol_conductor'])) {
    $id_usuario = $_SESSION['usuario_id']; // Obtener el ID del usuario de alguna manera
    $rol="pasajero";

    // Realizar la actualización en la base de datos
    $query = "UPDATE usuario SET rol=? WHERE usuario_id=?";
    $statement = $conexion->prepare($query);
    $statement->bind_param("si", $rol, $id_usuario);
    $statement->execute();
    
    // Redireccionar a alguna página después de la actualización
    header("Location: ../index.php");
}
?>
