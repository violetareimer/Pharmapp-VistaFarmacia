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

    $nombrecomprador=$_POST['nombrecomprador'];
    $usuariocomprador=$_POST['usuariocomprador'];
    $idmedicamento=$_POST['idmedicamento'];
    $nombremedicamento=$_POST['nombremedicamento'];
    $comprimido=$_POST['comprimido'];
    $cantidad=$_POST['cantidad'];
    $fecha=$_POST['fecha'];
    $direccion=$_POST['direccion'];
    $precio=$_POST['precio'];

    $query="INSERT INTO pedidocliente
             (nombrecomprador       ,usuariocomprador         ,idmedicamento    ,comprimido        ,cantidad    ,fecha          ,direccion          ,precio) 
    VALUES('".$nombrecomprador."','".$usuariocomprador."','".$idmedicamento."','".$comprimido."','".$cantidad."','".$fecha."',  '".$direccion."','".$precio."')";

    $resultado=$conn->query($query);
    if($resultado==true){

        echo "Usuario registrado de forma exitosa";
    }else {
        echo "Error al insertar el usuario";
    }

    $conn->close();
?>