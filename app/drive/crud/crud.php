<?php
// Incluir el archivo de conexión a la base de datos
include_once '../../bd/conexion.php';

// Crear una instancia de la clase Conexion
$objConexion = new Conexion();
$conexion = $objConexion->conectar();

// Verificar si se han enviado datos mediante el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $userRole = $_POST['user-role'];
    $nombre = $_POST['nombre'];
    $apellidoPaterno = $_POST['apep'];
    $apellidoMaterno = $_POST['apem'];
    $fechaNacimiento = $_POST['fecha'];
    $correo = $_POST['correo'];
    $telefono = $_POST['tele'];
    $matricula = $_POST['mat'];
    $contrasena = $_POST['pass'];
    $carrera = $_POST['carrera'];

    // Verificar si la matrícula ya existe en la tabla de usuarios
    $sql_verificar_matricula = "SELECT * FROM usuario WHERE matricula = '$matricula'";
    $result_verificar_matricula = $conexion->query($sql_verificar_matricula);

    if ($result_verificar_matricula->num_rows > 0) {
        // La matrícula ya existe en la tabla de usuarios
        echo "<script>alert('La matrícula ingresada ya existe.');history.back();</script>";
    } else {
        // Determinar el rol a insertar en la base de datos
        $rol = ($userRole == 1) ? 'conductor' : 'pasajero';

        // Preparar la sentencia SQL para la inserción en la tabla 'usuario'
        $sql_usuario = "INSERT INTO usuario (matricula, nombre, apellido_p, apellido_m, fecha_nac, correo, contrasena, telefono, rol, id_carrera) 
                        VALUES ('$matricula', '$nombre', '$apellidoPaterno', '$apellidoMaterno', '$fechaNacimiento', '$correo', '$contrasena', '$telefono', '$rol', '$carrera')";

        // Ejecutar la consulta para insertar en la tabla 'usuario'
        if ($conexion->query($sql_usuario) === TRUE) {
            $usuario_id = $conexion->insert_id; // Obtener el ID del usuario insertado

            // Realizar el insert en la tabla correspondiente (conductor o pasajero)
            if ($rol == 'conductor') {
                // Si es conductor, insertar en la tabla 'conductor'
                $sql_conductor = "INSERT INTO conductor (usuario_id, Estado_disponibilidad) 
                                  VALUES ('$usuario_id', 1)"; // 1 disponible, 2 no disponible

                // Ejecutar la consulta para insertar en la tabla 'conductor'
                if ($conexion->query($sql_conductor) === TRUE) {
                    echo "<script>alert('Registro insertado correctamente como conductor.');</script>";
                    header("Location: ../index.php");

                } else {
                    echo "<script>alert('Error al insertar en la tabla conductor: " . $conexion->error . "');history.back();</script>";
                }
            } elseif ($rol == 'pasajero') {
                // Si es pasajero, insertar en la tabla 'pasajero'
                $sql_pasajero = "INSERT INTO pasajero (usuario_id) 
                                 VALUES ('$usuario_id')";

                // Ejecutar la consulta para insertar en la tabla 'pasajero'
                if ($conexion->query($sql_pasajero) === TRUE) {
                    echo "<script>alert('Registro insertado correctamente como pasajero.');/script>";
                    header("Location: ../index.php");

                } else {
                    echo "<script>alert('Error al insertar en la tabla pasajero: " . $conexion->error . "');history.back();</script>";
                }
            }
        } else {
            echo "<script>alert('Error al insertar el registro en la tabla usuario: " . $conexion->error . "');history.back();</script>";
        }
    }

}
?>
