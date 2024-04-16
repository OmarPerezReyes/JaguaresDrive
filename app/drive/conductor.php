
<?php
// Incluir el archivo de conexión
include_once '../bd/conexion.php'; 

// Crear una instancia de la clase Conexion
$conexion_bd = new Conexion();
$conexion = $conexion_bd->conectar();

session_start();

// Verificar si el usuario ha iniciado sesión y tiene el rol de conductor
if (!isset($_SESSION['usuario_id']) || !isset($_SESSION['rol']) || $_SESSION['rol'] !== 'conductor') {
    // Usuario no autenticado o no tiene el rol de conductor, redirigir a la página de inicio de sesión
    header("Location: index.html");
    exit;
}

// Obtener el nombre de usuario de las variables de sesión
$nombreUsuario = "";

// Obtener el nombre de usuario desde la base de datos utilizando el ID de usuario almacenado en la sesión
$usuarioId = $_SESSION['usuario_id'];
$sql = "SELECT nombre FROM usuario WHERE usuario_id = $usuarioId";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nombreUsuario = $row['nombre'];
} else {
    // No se encontró el usuario en la base de datos, manejar el error según sea necesario
    // Por ejemplo, redirigir al usuario a la página de inicio de sesión con un mensaje de error
    header("Location: index.html?error=user_not_found");
    exit;
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>JAGUARES DRIVE</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="icon" href="public/images/logo-jaguares-drive.png" type="image/png" sizes="512x512">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="css/diseño_conductor.css">
    <!-- Enlace al icono para la pestaña -->
    <link rel="icon" href="img/logo.png" type="image/x-icon">
    <style>
        /* Estilos del precargador */
        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background-color: rgba(255, 255, 255, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
        }

        /* Estilos del ícono de carro */
        .car-icon {
            font-size: 3rem;
            color: #000000;
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            animation: moveCar 1.5s linear infinite;
        }

        /* Animación de movimiento para el ícono de carro */
        @keyframes moveCar {
            0% {
                left: 0;
            }
            100% {
                left: 90%;
            }
        }

        #sidebar {
            width: 250px;
            height: 100vh;
            background-color: rgb(46, 46, 46);
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.3);
        }

        .menu .menu-item {
            margin-top: 40px; /* Ajusta este valor según sea necesario */
        }
        #main-container {
            display: flex; /* Configura el diseño de la fila para contener el sidebar a la izquierda y el contenido a la derecha */
        }
        
    </style>
</head>

<body>
    <div id="preloader">
        <!-- Usar un ícono de Font Awesome de carro con animación -->
        <i class="fas fa-car car-icon"></i>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Escucha el evento DOMContentLoaded, que se dispara cuando el contenido de la página está listo
            const preloader = document.getElementById('preloader');
            // Oculta el precargador después de un breve tiempo (ajusta este tiempo según sea necesario)
            setTimeout(() => {
                preloader.style.display = 'none';
            }, 1000); // Puedes ajustar este tiempo según sea necesario
        });
    </script>

    <div id="sidebar">
        <div class="avatar-container">
            <img src="img/icono-usuario.png" alt="Avatar" class="avatar-img">
            <label for="matricula" class="matricula-label"><b>2130155</b></label>
        </div>
        <nav class="menu">
            <a href="conductor.php" class="menu-item"><i class="fas fa-location-dot"></i> Rutas</a>
            <a href="editar_conductor.php?id_usuario=<?php echo $_SESSION['usuario_id']; ?>" class="menu-item"><i class="fa-solid fa-gear"></i> Perfil</a>
            <a href="cerrar_sesion.php" class="menu-item" onclick="confirmarCerrarSesion(event)"><i class="fa-solid fa-arrow-right-from-bracket"></i> Cerrar Sesión</a>
        </nav>
    </div>

    <!-- Resto del contenido HTML -->
    <div id="content">
        <!-- Añade aquí el contenido de tu página -->
        <h1>Bienvenido <?php echo $nombreUsuario; ?></h1> <!-- Aquí se mostrará el nombre de usuario -->
        <br>
        <div class="container-content">
            <div class="form-group">
                <label for="punto-partida"><b>Selecciona tu punto de partida:</b></label>
                <div class="input-group mb-3">
                    <!-- Icono -->
                    <span class="input-group-text"><i class="fas fa-location-dot"></i></span>
                    <input type="text" class="form-control" placeholder="Buscar punto de partida" aria-label="Buscar punto de partida" aria-describedby="button-buscar">
                    <!-- Botón de búsqueda -->
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary btn-buscar" type="button" id="button-buscar" style="width: 5cm; background-color: rgb(0, 0, 0); color: white; margin-left: auto;">Buscar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function mostrarSweetAlertt(nombre) {
            Swal.fire({
                title: "Información del Conductor",
                text: "Nombre: " + nombre,
                showClass: {
                    popup: `
                        animate__animated animate__fadeInUp animate__faster
                    `
                },
                hideClass: {
                    popup: `
                        animate__animated animate__fadeOutDown animate__faster
                    `
                },
                scrollbarPadding: false
            });
        }

        function confirmarCerrarSesion(event) {
            event.preventDefault(); // Evita el comportamiento predeterminado del evento

            Swal.fire({
                title: "¿Estás seguro de cerrar sesión?",
                text: "Se cerrará tu sesión actual.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "purple",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, cerrar sesión",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirige al usuario a la página de inicio de sesión (login.html)
                    window.location.href = "cerrar_sesion.php";
                }
            });
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-Xe8FIISpaF1FODdP7IjFmzHeGeFZhUByu2DdTm6l5on5Cv5uUZcXnKjpBy6QhpF4" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyIx8vHV5z5q1gF94tLl5MDO/aDlO7f5J" crossorigin="anonymous"></script>
</body>

</html>
     