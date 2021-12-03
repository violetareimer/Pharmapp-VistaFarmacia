<?php 



CancelarPedido($_GET['no']);

function CancelarPedido($no){

    define('DB_HOST','localhost');
    define('DB_USER','root');
    define('DB_PASS','');
    define('DB_NAME','medicamentos_android');
    
    $consulta = 'SELECT * FROM medicamentos';
    
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
        if($ver['medicamentoID'] == $no )
        {
           
            $query2 = "DELETE FROM medicamentos WHERE medicamentoID='".$no."'";
            $resul2 = $mysql->query($query2);

            
        }

    }

}


?>

<script type="text/javascript">
    alert("Producto eliminado");
    window.location.href="muestrastock.php";
</script>