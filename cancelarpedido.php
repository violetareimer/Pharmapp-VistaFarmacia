<?php 

CancelarPedido($_POST['idpedido'],$_POST['motivo']);

function CancelarPedido($idpedido,$motivo){

    define('DB_HOST','localhost');
    define('DB_USER','root');
    define('DB_PASS','');
    define('DB_NAME','medicamentos_android');
    
    $consulta = 'SELECT * FROM pedidos';
    
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
        if($ver['idpedido'] == $idpedido )
        {
            $mysqli2 = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

           
            $consu2="UPDATE ordenes SET estado='Cancelado',motivo='".$motivo."' WHERE idpedido='".$idpedido."'";
               
            $resultado3=$mysqli2->query($consu2);

            $query2 = "DELETE FROM pedidos WHERE idpedido='".$idpedido."'";
            $resul2 = $mysql->query($query2);
            
        }

    }

}


?>

<script type="text/javascript">
    alert("Pedido Cancelado");
    window.location.href="pedidofarmaceutico.php";
</script>