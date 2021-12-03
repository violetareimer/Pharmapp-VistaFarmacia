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

    $idpedido=$_POST['idpedido'];
    $foto=$_POST['foto'];
    $num=$_POST['num'];
    

    $nombre=$idpedido.$num;
    $path = "recetas/$nombre.png";
    $actualpath= "http://192.168.0.87/medicamentos_android/$path";



    $query="INSERT INTO recetas
             (idpedido     ,foto) 
    VALUES('".$idpedido."','".$actualpath."')";

    $resultado=$conn->query($query);

       file_put_contents($path, base64_decode($foto));
  

    $conn->close();
?>