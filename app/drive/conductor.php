
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
    header("Location: index.php");
    exit;
}

// Obtener el nombre de usuario de las variables de sesión
$nombreUsuario = "";

// Obtener el nombre de usuario desde la base de datos utilizando el ID de usuario almacenado en la sesión
$usuarioId = $_SESSION['usuario_id'];
$sql = "SELECT nombre FROM usuario WHERE usuario_id = '$usuarioId'";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nombreUsuario = $row['nombre'];
} else {
    // No se encontró el usuario en la base de datos, manejar el error según sea necesario
    // Por ejemplo, redirigir al usuario a la página de inicio de sesión con un mensaje de error
    header("Location: index.php?error=user_not_found");
    exit;
}

$sql = "SELECT nombre, apellido_p, apellido_m, fecha_nac, telefono, matricula, correo,contrasena,foto,id_carrera FROM usuario WHERE usuario_id = '$usuarioId'";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nombreUsuario = $row['nombre'];
    $apellidoPaterno = $row['apellido_p'];
    $apellidoMaterno = $row['apellido_m'];
    $fechaNacimiento = $row['fecha_nac'];
    $telefono = $row['telefono'];
    $matricula = $row['matricula'];
    $correo = $row['correo'];
    $contrasena = $row['contrasena'];
    $imagen = $row['foto'];
    $carrera = $row['id_carrera'];
} else {
    // No se encontró el usuario en la base de datos, manejar el error según sea necesario
    // Por ejemplo, redirigir al usuario a la página de inicio de sesión con un mensaje de error
    header("Location: index.php?error=user_not_found");
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9TPtQVo1d15jPaORSaA082SlBqiv_f8s&libraries=places"></script>
    <script src="../controllers/mapa.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9TPtQVo1d15jPaORSaA082SlBqiv_f8s&callback=iniciarMap"></script>
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

        #map-container {
            height: 500px;
            width: 100%;
            overflow: hidden; /* Evita que el mapa genere barras de desplazamiento */
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
        <form method="POST" action="crud/insertarRuta.php">
        <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['usuario_id']; ?>">
        <input type="hidden" id="coordenadas2" name="coordenadas2" value="">
        <div class="container-content">
            <div class="form-group">
                <label for="punto-partida"><b>Selecciona tu punto de partida:</b></label>
                <div class="input-group mb-3">
                    <!-- Icono -->
                    <span class="input-group-text"><i class="fas fa-location-dot"></i></span>
                    <input name="input0" type="text" class="form-control" placeholder="Buscar punto de partida" aria-label="Buscar punto de partida" aria-describedby="button-buscar">
    
                </div>
            </div>
            <label for="paradas"><b>Selecciona puntos de paradas:</b></label>
            <div id="paradas-container">
                <div class="form-group">
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-location-pin"></i></span>
                        <input type="text" class="form-control" placeholder="Buscar paradas" name="input1" aria-label="Buscar paradas" aria-describedby="button-buscar-paradas">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary btn-accion" type="button" id="button-agregar-parada" onclick="agregarPuntoParada()"><i class="fa-solid fa-plus"></i></button>
                            <button class="btn btn-outline-secondary btn-accion" type="button" id="button-eliminar-parada" onclick="eliminarPuntoParada()"><i class="fa-solid fa-minus"></i></button>
                        </div>
                       
                    </div>
                   
                </div>
                
            </div>
            <div id="map-container">
            <button class="btn btn-outline-secondary btn-accion" type="button" id="button-agregar-parada" onclick="convertirDireccionADireccion()">Agregar a mapa</button>
                <iframe src="../views/mapa.html" width="100%" height="500px" frameborder="0"></iframe>
            </div>
            <br>
            <div class="form-group">
                <label for="costo" style="margin-right: 510px;"><b>Costo:</b></label>
                <label for="hora" style="margin-right: 510px;"><b>Hora de salida:</b></label>
                <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="number" class="form-control" name="costo" id="costo" placeholder="Ingrese el costo" aria-label="Ingrese el costo" aria-describedby="button-calcular">
                    <span class="input-group-text"><i class="fa-solid fa-clock"></i></span>
                    <input type="time" class="form-control" name="hora" id="hora" aria-label="Ingrese la hora" aria-describedby="button-calcular">
                </div>
            </div>
            
            
            
            <div class="form-group">
                <label for="descripcion"><b>Descripción:</b></label>
                <textarea class="form-control" name="descripcion" id="descripcion" rows="3" placeholder="Ingrese la descripción"></textarea>
            </div>
            <button type="submit" name="insertar_ruta" class="btn btn-primary" style="background-color: rgb(0, 0, 0); color: white;">Subir Viaje</button>
        </div>
    </div>
    </form>
    <script>
        var cont = 1;
        function agregarPuntoParada() {
            cont++;
            var paradaContainer = document.getElementById('paradas-container');
            var newFormGroup = document.createElement('div');
            newFormGroup.classList.add('form-group');
            newFormGroup.innerHTML = `
                <div class="input-group mb-3">
                    <!-- Icono -->
                    <span class="input-group-text"><i class="fa-solid fa-location-pin"></i></span>
                    <input type="text" class="form-control" name="input`+ cont + `" placeholder="Buscar paradas" aria-label="Buscar paradas" aria-describedby="button-buscar-paradas">
                    <!-- Botones de acciones -->
                    <div class="input-group-append">
                        <!-- Botón de agregar -->
                        <button class="btn btn-outline-secondary btn-accion" type="button" onclick="agregarPuntoParada()"><i class="fa-solid fa-plus"></i></button>
                        <!-- Botón de eliminar -->
                        <button class="btn btn-outline-secondary btn-accion" type="button" onclick="eliminarPuntoParada()"><i class="fa-solid fa-minus"></i></button>
                    </div>
                </div>`;
            paradaContainer.appendChild(newFormGroup);
        }

        function eliminarPuntoParada() {
            var paradaContainer = document.getElementById('paradas-container');
            var formGroups = paradaContainer.getElementsByClassName('form-group');
            if (formGroups.length > 1) { // Asegúrate de que haya al menos un elemento antes de eliminar
                paradaContainer.removeChild(formGroups[formGroups.length - 1]); // Elimina el último elemento de la lista
            }
        }

        function confirmarInicioViaje(event) {
            event.preventDefault(); // Evita el comportamiento predeterminado del evento

            Swal.fire({
                title: "¿Estás seguro de subir este viaje?",
                icon: "NOTA: Todo los alumnos podran verlo y solicitarlo.",
                showCancelButton: true,
                confirmButtonColor: "purple",
                cancelButtonColor: "#d33",
                confirmButtonText: "¡Sí!",
                scrollbarPadding: false
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Viaje confirmado!",
                        icon: "success"
                    });
                }
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
    <script>    

function convertirDireccionADireccion() {
    // Dirección a convertir
    var cadenaOUT = "";

    var inputs = document.querySelectorAll('input[name^="input"]');

    inputs.forEach(function(input) {
        var direccion = input.value;
        // Crear un objeto Geocoder
        var geocoder = new google.maps.Geocoder();

        // Llamar a la función geocode con la dirección especificada
        geocoder.geocode({ 'address': direccion }, function(results, status) {
            if (status === google.maps.GeocoderStatus.OK) {
                // Obtener las coordenadas de la dirección
                var coordenadas = results[0].geometry.location;

                // Mostrar las coordenadas en consola
                console.log(coordenadas.lat() + ", " + coordenadas.lng() + "|");
                cadenaOUT += coordenadas.lat().toString() + ", " + coordenadas.lng().toString() + "|";

                // Asignar el valor a tu input oculto dentro de la función de retorno
                document.getElementById("coordenadas2").value = cadenaOUT;
                document.getElementsByName("coordenadas2")[0].value = cadenaOUT;
            }
        });
    });

    // Ten en cuenta que aquí el valor aún no se ha asignado porque la función geocoder.geocode() es asíncrona
    // Por lo tanto, no es necesario asignarlo aquí nuevamente
    //document.getElementById("coordenadas2").value = cadenaOUT;
    //document.getElementsByName("coordenadas2")[0].value = cadenaOUT;

    iniciarM(cadenaOUT);
}

    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-Xe8FIISpaF1FODdP7IjFmzHeGeFZhUByu2DdTm6l5on5Cv5uUZcXnKjpBy6QhpF4" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyIx8vHV5z5q1gF94tLl5MDO/aDlO7f5J" crossorigin="anonymous"></script>
</body>

</html>
     