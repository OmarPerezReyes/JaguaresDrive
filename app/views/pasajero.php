<?php

session_start();
// Conexión a la base de datos
require_once '../bd/conexion.php';

// Si el usuario no ha iniciado sesión, redirigirlo al inicio de sesión
if (!isset($_SESSION['username'])) {
    header("Location: ../../index.php");
} else {
    $username = $_SESSION['username'];
    $contra = $_SESSION['password'];
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM usuario WHERE correo = '$username' AND contrasena = '$contra'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $matricula = $row['matricula'];
            $nombre = $row['nombre'];
            $apellido_p = $row['apellido_p'];
            $apellido_m = $row['apellido_m'];
            $fecha_nac = $row['fecha_nac'];
            $correo = $row['correo'];
            $carrera = $row['carrera'];
            $telefono = $row['telefono'];
        }
    }
$sqld = "SELECT c.usuario_id id_usuario, c.id_conductor conductor_id, u.usuario_id id
  	FROM conductor c
  	INNER JOIN usuario u ON c.usuario_id = u.usuario_id
  	WHERE c.usuario_id = $user_id";
	$resultd = $conn->query($sqld);    
	$row_conductor = $resultd->fetch_assoc();
	$conductor_id = $row_conductor['conductor_id'];

$sqlt = "SELECT c.id_conductor id, r.id_conductor conductor_id, r.ruta ruta, r.origen origen, r.destino destino, r.distancia distancia, r.estado estado
  	FROM ruta r
  	INNER JOIN conductor c ON c.id_conductor = r.id_conductor
  	WHERE c.id_conductor = $conductor_id";
$resultt = $conn->query($sqlt);    
$row_ruta = $resultt->fetch_assoc();
    
}
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>JAGUARES DRIVE</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="icon" href="public/images/logo-jaguares-drive.png" type="image/png" sizes="512x512">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            /*background: linear-gradient(to bottom, #b292e6, #DBC9F5);*/
            background-color: rgb(245, 242, 242);
            margin: 0;
            height: 100vh;
            width: 100vw;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #sidebar {
            background: #ae28d6; /* Color morado */
            width: 180px;
            height: 80%;
            padding-top: 20px;
            padding-bottom: 20px;
            border-radius: 10px;
            background-color: #61337A;
            margin-right: 0px;
            margin-left: 25px;
            
        }

        #content {
            flex-grow: 1;
            padding: 20px;
            height: 85%;
        }

        .menu-item {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .white-text {
        color: white;
         }

        .menu-item:hover {
            background-color: #e3e1e4; /* Color morado oscuro al hacer hover */
        }

        .container-content {
            background-color: #e2dfdf; /* Color morado violeta */
            padding: 20px;
            border-radius: 10px;
            margin-right: 5px;
        }
        .inner-container {
            /*border: 2px solid #a8a8ac; /* Borde morado alrededor del contenedor interno */
            background-color: #d0d0d3; /* Color morado violeta */
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px; /* Espacio entre contenedores */
        }

        .otro-contenedor {
            /*border: 2px solid #a8a8ac; /* Borde morado alrededor del contenedor interno */
            background-color: #d0d0d3; /* Color morado violeta */
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px; /* Espacio entre contenedores */
        }
         /* Estilos para el contenedor del mapa */
         .map {
            height: 200px;
            width: 100%;
        }
    </style>
</head>
<body>

    <div id="sidebar">
        <img src="../../public/images/icono-usuario.png" alt="Avatar" class="avatar-img mb-3" style="width: 100px; display: block; margin: 0 auto;">
        <label for="matricula" style="display: block; text-align: center;" class="white-text"><b><?php echo $matricula; ?></b></label>
        <a href="#" class="menu-item">Viajes</a>
        <a href="#" class="menu-item">Perfil</a>
        <a href="cerrar_sesion.php" class="menu-item">Cerrar Sesión</a>
    </div>

    <div id="content">
        <div class="container-content ">
            <!-- Contenido de la página -->
            <h1>Bienvenido a <?php echo $nombre." ".$apellido_p." ".$apellido_m; ?></h1>
            <div class="form-group">     
                <label for="viaje"><b>Viajes disponibles:</b></label>
            </div>
            <div class="inner-container d-flex flex-column" style="position: relative;" id="contenedorDaniel">
                <label for="name_usuario"><?php echo $nombre." ".$apellido_p." ".$apellido_m; ?></label>
                <div id="map" class="map"></div>
                <button onclick="mostrarSweetAlertt()" id="info-container1" style="width: 5cm; background-color: purple; color: white;" class="btn btn-sm mt-2">Ver Información</button>
                <button onclick="iniciarviaje()" style="width: 5cm; background-color: purple; color: white;" id="viaje" class="btn btn-sm mt-2">Iniciar viaje</button>
                <br>
                <label for="hora">Hora de Salida: 6:10 am</label>
                <!-- Otro contenido que desees agregar -->
            </div>
            
        
            <div class="otro-contenedor d-flex flex-column">
                <label for="name_usuario">Adrián Aejandro Ruíz Márquez</label>
                <div id="map2" class="map"></div>
                <button onclick="mostrarSweetAlert()" id="info-container" style="width: 5cm; background-color: purple; color: white;" class="btn btn-sm mt-2">Ver Información</button>
                <button onclick="iniciarviaje()" style="width: 5cm; background-color: purple; color: white;" id="viaje" class="btn btn-sm mt-2">Iniciar viaje</button>
                <br>
                <label for="hora">Hora de Salida: 6:10 am</label>
            </div>
        </div>
    </div>

    <script src="../controllers/mapa.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9TPtQVo1d15jPaORSaA082SlBqiv_f8s&callback=initMap"></script>
    <script>
        function mostrarSweetAlert() {
            var labelContent = document.querySelector('.otro-contenedor label').innerHTML;
    
            Swal.fire({
                title: 'Información del Pasajero',
                html: labelContent,
                text: "Estudiante de la Universidad Politécnica de Victoria",
                confirmButtonText: 'Cerrar'
            });
        }

        function mostrarSweetAlertt() {
            var labelContent = document.querySelector('.inner-container label').innerHTML;
    
            Swal.fire({
                title: 'Información del Pasajero',
                html: labelContent,
                text: "Estudiante de la Universidad Politécnica de Victoria",
                confirmButtonText: 'Cerrar'
            });
        }

        function iniciarviaje() {
            var labelContent = document.querySelector('.otro-contenedor label').innerHTML;
    
            Swal.fire({
                title: 'Iniciando Viaje',       
                //text: "Bonito día",
                confirmButtonText: 'Cerrar'
            });
        }
    </script>
    

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-Xe8FIISpaF1FODdP7IjFmzHeGeFZhUByu2DdTm6l5on5Cv5uUZcXnKjpBy6QhpF4" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyIx8vHV5z5q1gF94tLl5MDO/aDlO7f5J" crossorigin="anonymous"></script>

</body>
</html>
