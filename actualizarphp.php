<?php

ModifcarProducto($_POST['medicamentoID'], $_POST['nombre'],$_POST['comprimido'],$_POST['stock'],$_POST['precio'],$_POST['imagen'],$_POST['receta'],$_POST['stockminimo']);

function ModifcarProducto($medicamentoID,$nombre,$comprimido,$stock,$precio,$imagen,$receta,$stockminimo){

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


        $sentencia="UPDATE medicamentos SET nombre='".$nombre."',comprimido='".$comprimido."',stock='".$stock."',precio='".$precio."',imagen='".$imagen."',receta='".$receta."',stockminimo='".$stockminimo."' WHERE medicamentoID='".$medicamentoID."'";
        $resul = $mysql->query($sentencia);
    }
?>

<script type="text/javascript">

    alert("Producto modificado exitosamente");
    window.location.href="muestrastock.php";

</script>