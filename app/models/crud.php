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

if(isset($_POST["registro"])) {
	$matricula = $_POST["matricula"];
	$nombre = $_POST["nombre"];
	$apellidoPat = $_POST["apellido_p"];
	$apellidoMat = $_POST["apellido_m"];
	$fechaNacimiento = $_POST["fecha_nac"];
	$email = $_POST["correo"];
	$contra = $_POST["contra"];
	$carrera = $_POST["carrera"];
	$telefono = $_POST["telefono"];
	
	$sql_registro = "INSERT INTO usuario( nombre, apellido_p, apellido_m, fecha_nac, correo, contrasena, carrera, telefono, matricula )
						VALUES ('$nombre', '$apellidoPat', '$apellidoMat', STR_TO_DATE('$fechaNacimiento', '%Y-%m-%d'), '$email', '$contra', '$carrera', '$telefono', '$matricula');";
    
    $result = $conn->query($sql_registro);

    header("Location: ../../index.php");
}
