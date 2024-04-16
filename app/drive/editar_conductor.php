<?php

session_start();
$usuarioId = $_SESSION['usuario_id'];

// Incluir el archivo de conexión a la base de datos u otras clases necesarias
require_once '../bd/conexion.php';
require_once '../models/Usuario.php'; // Asegúrate de especificar la ruta correcta
$conexion_bd = new Conexion();
$conexion = $conexion_bd->conectar();

// Aquí debes incluir el código para obtener los datos del usuario, puedes usar la misma lógica que en conductor.php
$usuarioId = $_GET['id_usuario'];

// Por ejemplo, si ya tienes una instancia de UsuarioModel y tienes el ID del usuario almacenado en una variable $usuarioId, puedes obtener los datos del usuario así:
$usuarioModel = new UsuarioModel();
$usuario = $usuarioModel->obtenerUsuarioPorId($usuarioId);

// Luego, asigna los datos del usuario a variables individuales
$nombreUsuario = $usuario->getNombre();
$apellido1Usuario = $usuario->getApellidoP();
$apellido2Usuario = $usuario->getApellidoM();
$fechaNacimiento = $usuario->getFechaNac();
$telefonoUsuario = $usuario->getTelefono();
$matriculaUsuario = $usuario->getMatricula();
$correoUsuario = $usuario->getCorreo();
$placasAuto = $usuario->getPlacas();
$modeloAuto = $usuario->getModeloAuto();
$colorAuto = $usuario->getColorAuto();
$marcaAuto = $usuario->getMarcaAuto();
$licencia = $usuario->getLicencia();
$estado = $usuario->getEstado();
$contrasena = $usuario->getContrasena();
$carrera = $usuario->getCarrera();

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
    <link rel="stylesheet" href="css/diseño_editar.css">

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
           background-color: rgba(46, 46, 46);
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

       #content {
           flex-grow: 1; /* Permite que el contenido principal ocupe todo el espacio restante */
           padding: 20px; /* Añade un poco de espacio alrededor del contenido */
       }
    </style>
</head>
<body>

    <!-- Precargador -->
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
    <!--Fin de precargador-->

    <div id="sidebar">
        <div class="avatar-container">
            <img src="img\icono-usuario.png" alt="Avatar" class="avatar-img">
        </div>

        <div class="menu">
            <label for="matricula" style="display: block; text-align: center;" class="white-text"><b>2130155</b></label>
            <a href="conductor.html" class="menu-item"><i class="fas fa-location-dot"></i> Rutas</a>
            <a href="editar_conductor.html" class="menu-item"><i class="fa-solid fa-gear"></i> Perfil</a>
            <a href="index.php" class="menu-item" onclick="confirmarCerrarSesion(event)"><i class="fa-solid fa-arrow-right-from-bracket"></i> Cerrar Sesión</a>
        </div>
    </div>

    <div id="content">
        <div class="container-content">
            <!-- Icono de imagen con evento de clic -->
            <label for="input-imagen" class="position-absolute top-0 start-0">
                <i class="fa-solid fa-image fa-3x"></i> <!-- Icono de imagen -->
            </label>
            <form action="crud/cambiar_rol.php" method="post">
                <button type="submit" name="rol_conductor" value="pasajero" class="btn btn-lg btn-purple float-right">Cambiar a Pasajero</button>
            </form>
            
            <form action="crud/updateConductor.php?id_usuario=<?php echo $_GET['id_usuario']; ?>" method="post">

            <!-- Input oculto para cargar imagen -->
            <input type="file" id="input-imagen" style="display: none;" accept="image/*"> <!-- Icono en la posición izquierda superior -->
            <button type="submit" id="btn-actualizar" class="btn btn-lg btn-purple float-right">Actualizar</button> <!-- Botón de Actualizar --> <!-- Botón de Actualizar -->
            
        
            <div class="avatar-container-large">
               <centering><img id="avatar-img" src="img\icono-usuario.png" alt="Avatar" class="avatar-img-large"></centering>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="form-group text-center">
                        <label for="nombre" class="text-center">Nombre:</label>
                        <input type="text" class="form-control text-center" id="nombre" name="nombre" placeholder="Ingrese su nombre" value="<?php echo $nombreUsuario; ?>">
                    </div>
                    <div class="form-group text-center">
                        <label for="apellido1" class="text-center">Apellido Paterno:</label>
                        <input type="text" class="form-control text-center" id="apellido1" name="apellido1" placeholder="Ingrese apellido paterno" value="<?= $apellido1Usuario?>">
                    </div>
                    <div class="form-group text-center">
                        <label for="apellido2" class="text-center">Apellido Materno:</label>
                        <input type="text" class="form-control text-center" id="apellido2" name="apellido2" placeholder="Ingrese apellido materno" value="<?= $apellido2Usuario?>">
                    </div>
                    <div class="form-group text-center">
                        <label for="nacimiento" class="text-center">Fecha de Nacimiento:</label>
                        <input type="date" class="form-control text-center" id="nacimiento" name="nacimiento" value="<?= $fechaNacimiento?>">
                    </div>
                    <div class="form-group text-center">
                        <label for="placas" class="text-center">Placas:</label>
                        <input type="text" class="form-control text-center" id="placas" name="placas" placeholder="Ingrese placas" value="<?= $placasAuto?>">
                    </div>
                    <div class="form-group text-center">
                        <label for="molda" class="text-center">Modelo de Auto:</label>
                        <input type="text" class="form-control text-center" id="molda" name="molda" placeholder="Ingrese modelo de auto" value="<?= $modeloAuto?>">
                    </div>
                    <div class="form-group text-center">
                        <label for="disponibilidad" class="text-center">Disponibilidad:</label>
                        <select class="form-control text-center" id="disponibilidad" name="disponibilidad">
                            <option value="1" <?= ($estado == 1) ? 'selected' : '' ?>>Activo</option>
                            <option value="0" <?= ($estado == 0) ? 'selected' : '' ?>>Inactivo</option>
                        </select>
                    </div>


                </div>
                <div class="col-md-4">
                    <div class="form-group text-center">
                        <label for="telefono" class="text-center">Teléfono:</label>
                        <input type="tel" class="form-control text-center" id="telefono" name="telefono" placeholder="Ingrese su número de teléfono" value="<?= $telefonoUsuario?>">
                    </div>
                    <div class="form-group text-center">
                        <label for="matricula" class="text-center">Matrícula:</label>
                        <input type="text" class="form-control text-center" id="matricula" name="matricula" placeholder="Ingrese su matrícula" value="<?= $matriculaUsuario?>" readonly>
                    </div>
                    <div class="form-group text-center">
                        <label for="correo" class="text-center">Correo Electrónico:</label>
                        <input type="email" class="form-control text-center" id="correo" name="correo" placeholder="Ingrese su correo electrónico" value="<?= $correoUsuario?>">
                    </div>
                    <div class="form-group text-center">
                        <label for="col" class="text-center">Color de Auto:</label>
                        <input type="text" class="form-control text-center" id="col" name="col" placeholder="Ingrese color de auto" value="<?= $colorAuto?>">
                    </div>
                    <div class="form-group text-center">
                        <label for="marca" class="text-center">Marca de Auto:</label>
                        <input type="text" class="form-control text-center" id="marca" name="marca" placeholder="Ingrese la marca del auto" value="<?= $marcaAuto?>">
                    </div>
                    <div class="form-group text-center">
                        <label for="marca" class="text-center">Licencia:</label>
                        <input type="text" class="form-control text-center" id="licencia" name="licencia" placeholder="Ingrese el número de licencia" value="<?= $licencia?>">
                    </div>
                    <div class="form-group text-center">
                        <label for="contrasena" class="text-center">Contraseña:</label>
                        <input type="password" class="form-control text-center" id="contrasena" name="contrasena" placeholder="Ingrese su contraseña" value="<?= $contrasena?>">
                        <div class="form-group text-center">
                        <label for="carrera" class="text-center">Carrera:</label>
                        <select class="form-control text-center" id="carrera" name="carrera">
                            <option value="">Selecciona una carrera</option>
                            <?php
                            // Consultar todas las carreras de la base de datos
                            $query = "SELECT id_carrera, nombre FROM Carreras";
                            $result = $conexion->query($query);

                            // Verificar si hay resultados
                            if ($result->num_rows > 0) {
                                // Iterar sobre los resultados y crear opciones para el select
                                while ($row = $result->fetch_assoc()) {
                                    // Verificar si esta opción está seleccionada
                                    $selected = ($row['id_carrera'] == $carrera) ? 'selected' : '';
                                    echo "<option value='" . $row['id_carrera'] . "' $selected>" . $row['nombre'] . "</option>";
                                }
                            } else {
                                echo "<option value=''>No hay carreras disponibles</option>";
                            }
                            ?>
                        </select>
                    </div>


                </div>
            </div>
            
            </form>
        </div>
    </div>
</body>
</html>
