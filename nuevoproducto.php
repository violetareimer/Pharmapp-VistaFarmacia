<?php

CrearProducto($_POST['nombre'],$_POST['comprimido'],$_POST['stock'],$_POST['precio'],$_POST['imagen'],$_POST['receta'],$_POST['stockminimo']);

function CrearProducto($nombre,$comprimido,$stock,$precio,$imagen,$receta,$stockminimo){

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
            $query="INSERT INTO medicamentos
                (nombre       ,comprimido       ,stock         ,precio       ,imagen          ,receta, stockminimo) 
        VALUES('".$nombre."','".$comprimido."','".$stock."','".$precio."', '".$imagen."','".$receta."','".$stockminimo."')";

        $resultado=$mysql->query($query);
        if($resultado==true){

        }else {
            echo "Error al insertar el producto";
        }

        $mysql->close();
    }
?>

<script type="text/javascript">

    alert("Producto Agregado exitosamente");
    window.location.href="muestrastock.php";

</script>