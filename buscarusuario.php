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
    #echo "conexion exitosa";
    }

    $usuario=$_GET['usuario'];

    $query = "SELECT * FROM usuarios WHERE usuario='".$usuario."'";
    $resul = $mysql->query($query);

    if($mysql->affected_rows > 0){
        while($row=$resul->fetch_array()){
            $array=$row;
        }
        echo json_encode($array);
    }else{
        echo "not found any rows";
    }

    $resul->close();
    $mysql->close();




    