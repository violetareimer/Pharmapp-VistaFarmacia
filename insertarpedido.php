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
    $fecha=$_POST['fecha'];
    $nombrecomprador=$_POST['nombrecomprador'];
    $usuariocomprador=$_POST['usuariocomprador'];
    $obrasocial=$_POST['obrasocial'];
    $direccion=$_POST['direccion'];
    $medicamentosid=$_POST['medicamentosid'];
    $cantidades=$_POST['cantidades'];
    $preciototal=$_POST['preciototal'];


    $query="INSERT INTO pedidos
             (fecha                  ,nombrecomprador       ,usuariocomprador         ,obrasocial       ,direccion        ,medicamentosid     ,cantidades, preciototal) 
    VALUES('".$fecha."','".$nombrecomprador."','".$usuariocomprador."','".$obrasocial."',     '".$direccion."'    ,'".$medicamentosid."','".$cantidades."','".$preciototal."')";

    $resultado=$conn->query($query);
    if($resultado==true){

    }else {
        echo "Error al insertar el usuario";
    }

    $conn->close();
?>