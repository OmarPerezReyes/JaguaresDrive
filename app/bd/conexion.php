<?php

// Conexión a la base de datos
$server_name = "localhost";
$user_name = "admin";
$password = "f97b293f28e7e668c3e0ecd6a002129332e809902add42cf";
$dbname = "DIDI_UPV";

// Crear conexión
$conn = new mysqli($server_name, $user_name, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


?>
