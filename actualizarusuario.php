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
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $dni=$_POST['dni'];
    $foto=$_POST['foto'];
    $localidad=$_POST['localidad'];
    $calle=$_POST['calle'];
    $altura=$_POST['altura'];
    $obrasocial=$_POST['obrasocial'];
    $numafiliado=$_POST['numafiliado'];

    $path = "drawable/$usuario.png";
    $actualpath= "http://192.168.0.87/medicamentos_android/$path";



    $query="UPDATE usuarios SET usuario='".$usuario."',contraseña ='".$contraseña."',nombre='".$nombre."',apellido='".$apellido."',dni='".$dni."',foto='".$actualpath."',localidad='".$localidad."',calle='".$calle."',altura='".$altura."',obrasocial='".$obrasocial."',numafiliado='".$numafiliado."' WHERE usuario='".$usuario."'"; 


    $resultado=$conn->query($query);
    if($resultado==true){
        file_put_contents($path, base64_decode($foto));

    }else {

    }


    $conn->close();
?>