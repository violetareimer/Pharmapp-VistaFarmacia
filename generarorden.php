<?php

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','medicamentos_android');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$mysql = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (mysqli_connect_errno()) {
echo "Fallo al conectar con MySQL: " . mysqli_connect_error();
die(); 
}
    $idpedido=$_GET['idpedido'];
    $usuario=$_GET['usuario'];
    $fecha=$_GET['fecha'];
    $medicamentosid=$_GET['medicamentosid'];
    $cantidades=$_GET['cantidades'];
    $preciototal=$_GET['preciototal'];
    $obrasocial=$_GET['obrasocial'];
    $estado="En Proceso";

    $array = $medicamentosid;
    $array= explode(';',$array);
    
    $longitud = count($array);
    $stringbd="";
    for($i=0; $i<$longitud; $i++)
    {
  
   //saco el valor de cada elemento
       $query2 = 'SELECT * FROM medicamentos';
       $resul2=mysqli_query($mysql,$query2);

       while($mostrar2=mysqli_fetch_array($resul2))
       {
          if($mostrar2['medicamentoID'] == $array[$i])
          {

              $arraycantidad = $cantidades;
              $arraycantidad= explode(';',$arraycantidad);

              $stringbd=$stringbd.$mostrar2['nombre']."x".$arraycantidad[$i].",";

          }
         
       }

    }



    $query="INSERT INTO ordenes
             (idpedido                  ,usuario       ,estado         ,fecha       ,medicamentosid        ,cantidades     , preciototal, obrasocial) 
    VALUES('".$idpedido."','".$usuario."','".$estado."','".$fecha."',     '".$stringbd."'    ,'".$cantidades."','".$preciototal."','".$obrasocial."')";

    $resultado=$conn->query($query);
    if($resultado==true){

    }else {
        echo "Error al insertar el usuario";
    }

    $conn->close();
?>