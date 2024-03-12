

<html >
    <meta charset="UTF-8">
<head>
    <title>JAGUARES DRIVE</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="icon" href="public/images/logo- jaguares drive.png" type="image/png" sizes="512x512">

    <style> 
        body { background: linear-gradient(to bottom, #976fd8, #DBC9F5); margin: 0; height: 100vh; display: flex; justify-content: center; align-items: center; }
       </style> 
</head>
<body>

    <div class="container mt-5">
        <div class="card bg-light p-3 col-sm-6 mx-auto text-center my-4 rounded border">
            <form action="app/models/crud.php" method="post"> 
                 <h1 style="font-weight: normal;">INICIAR SESIÓN</h1>
                <br>
                <br>
                <br>
                <div class="form-group">     
                    <select class="form-control" id="rol" name="rol" required>
                        <option value="" disabled selected >Seleccione un rol de usuario...</option>
                        <option value="es">Conductor</option>
                        <option value="mx">Pasajero</option>
                      
                    </select>
                </div>
                <div class="form-group">
                    <label for="nombre">Usuario:</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Ingrese su usuario..." required>
                </div>

                <div class="form-group">
                    <label for="edad">Contraseña:</label>
                    <input type="password" class="form-control" id="contra" name="contra"  placeholder="Ingrese su contraseña..." required>
                </div>

                <button type="submit" class="btn btn-primary" name="iniciosesion">Iniciar Sesión</button>
                <p class="mt-3">¿Aún no te has registrado? <a href="app/views/registro_pasajero.html">Regístrate</a>.</p>
                <p class="mt-3">¿Quieres participar con conductor? <a href="app/views/registro_conductor.html">Regístrate</a>.</p>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-Xe8FIISpaF1FODdP7IjFmzHeGeFZhUByu2DdTm6l5on5Cv5uUZcXnKjpBy6QhpF4" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyIx8vHV5z5q1gF94tLl5MDO/aDlO7f5J" crossorigin="anonymous"></script>

</body>

 <!-- <footer>
        <p>&copy; 2018 Jaguares de Chiapas</p>
    </footer> -->
</html>
