<?php
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','medicamentos_android');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (mysqli_connect_errno()) {
echo "Fallo al conectar con MySQL: " . mysqli_connect_error();
die(); 
}

$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];

$sentencia=$conn->prepare("SELECT * FROM usuarios WHERE usuario=? AND contraseña=?");
$sentencia->bind_param('ss',$usuario,$contraseña);
$sentencia->execute();

$resultado = $sentencia->get_result();
if ($fila = $resultado->fetch_assoc()) {
        echo json_encode($fila,JSON_UNESCAPED_UNICODE);
}
$sentencia->close();
$conn->close();
?>