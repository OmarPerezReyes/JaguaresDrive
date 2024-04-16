<?php
// Conexión a la base de datos
class Conexion{
private $server_name = "127.0.0.1:3306";
private $user_name = "root";
private $password = "";
private $dbname = "didi_upv";


public function conectar() {
    $conexion = new mysqli($this->server_name, $this->user_name, $this->password, $this->dbname);

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }else{
        echo "si";
}
    return $conexion;
}
}

?>
