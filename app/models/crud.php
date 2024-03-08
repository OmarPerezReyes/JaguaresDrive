<?php

include '../bd/conexion.php';

if (isset($_POST['iniciosesion'])) {
    $username = $_POST["username"];
    $contra = $_POST["contra"];

    $sql = "SELECT * FROM usuario WHERE correo = '$username' AND contrasena = '$contra'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            header("Location: ../views/index.php");
        }
    } else {
        echo "Usuario o contraseña incorrectos.";
    }
}


?>