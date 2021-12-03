<?php


    define('DB_HOST','localhost');
    define('DB_USER','root');
    define('DB_PASS','');
    define('DB_NAME','medicamentos_android');


    $idorden=$_GET['idorden'];

    $consulta = 'SELECT * FROM ordenes';
    
    $mysql = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    if($mysql->connect_error) {
    die("error de conexion"); 
     }
    else{
     #echo "conexion exitosa";
    }

    $resultado=mysqli_query($mysql,$consulta);

    while($ver=mysqli_fetch_array($resultado))
    {
        if($ver['idorden'] == $idorden )
        {
           
            $query2 = "DELETE FROM ordenes WHERE idorden='".$idorden."'";
            $resul2 = $mysql->query($query2);

            
        }

    }
