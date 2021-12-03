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
    $depto=$_POST['dpto'];
    $obrasocial=$_POST['obrasocial'];
    $numafiliado=$_POST['numafiliado'];

    $path = "drawable/$usuario.png";
    $actualpath= "http://192.168.0.87/medicamentos_android/$path";


    $user = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM usuarios WHERE usuario='$usuario'"));
      if($user==0){
 

    $query="INSERT INTO usuarios
             (usuario       ,contraseña         ,nombre    ,apellido       ,dni      ,foto              ,localidad      ,calle          ,altura         ,dpto      ,obrasocial     ,numafiliado) 
    VALUES('".$usuario."','".$contraseña."','".$nombre."','".$apellido."','".$dni."','".$actualpath."','".$localidad."','".$calle."','".$altura."','".$depto."','".$obrasocial."','".$numafiliado."')";

    $resultado=$conn->query($query);
    if($resultado==true){
        file_put_contents($path, base64_decode($foto));
        echo "Usuario registrado de forma exitosa";
    }else {
        echo "Error al insertar el usuario";
    }

    $conn->close();

    }else{
    echo 'Ya existe un usuario registrado a este user';
    }


?>