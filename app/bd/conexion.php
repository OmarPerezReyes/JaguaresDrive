<?php

// Conexión a la base de datos
$server_name = "localhost";
$user_name = "root";
$password = "root";
$dbname = "DIDI_UPV";

// Crear conexión
$conn = new mysqli($server_name, $user_name, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


?>