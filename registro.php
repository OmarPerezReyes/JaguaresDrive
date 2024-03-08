<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>JAGUARES DRIVE</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="icon" href="public/images/logo-jaguares-drive.png" type="image/png" sizes="512x512">
    <style> 
        body {
            background: linear-gradient(to bottom, #976fd8, #DBC9F5);
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style> 
</head>
<body>

    <div class="container mt-5">
        <div class="card bg-light p-3 col-sm-8 mx-auto text-center my-4 rounded border">
            <form action="app/models/crud.php?registro" method="post"> 
                <h1 style="font-weight: normal;">REGISTRO DE USUARIO</h1>
                <br>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese su nombre..." required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="apellido_p">Apellido Paterno:</label>
                        <input type="text" class="form-control" id="apellido_p" name="apellido_p" placeholder="Ingrese su apellido paterno..." required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="apellido_m">Apellido Materno:</label>
                        <input type="text" class="form-control" id="apellido_m" name="apellido_m" placeholder="Ingrese su apellido materno..." required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="fecha_nac">Fecha de Nacimiento:</label>
                        <input type="date" class="form-control" id="fecha_nac" name="fecha_nac" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="correo">Correo Electrónico:</label>
                        <input type="email" class="form-control" id="correo" name="correo" placeholder="Ingrese su correo electrónico..." required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="contrasena">Contraseña:</label>
                        <input type="password" class="form-control" id="contra" name="contra" placeholder="Ingrese su contraseña..." required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="carrera">Carrera:</label>
                        <input type="text" class="form-control" id="carrera" name="carrera" placeholder="Ingrese su carrera..." required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="telefono">Teléfono:</label>
                        <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Ingrese su número de teléfono..." required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="matricula">Matrícula:</label>
                        <input type="text" class="form-control" id="matricula" name="matricula" placeholder="Ingrese su matrícula..." required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary" name="registro">Registrarse</button>
                <p class="mt-3">¿Ya tienes una cuenta? <a href="index.php">Inicia Sesión</a>.</p>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-Xe8FIISpaF1FODdP7IjFmzHeGeFZhUByu2DdTm6l5on5Cv5uUZcXnKjpBy6QhpF4" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyIx8vHV5z5q1gF94tLl5MDO/aDlO7f5J" crossorigin="anonymous"></script>

</body>
</html>