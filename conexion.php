<?php
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','medicamentos_android');

$mysql = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if($mysql->connect_error) {
    die("error de conexion"); 
}
else{
    echo "conexion exitosa";
}