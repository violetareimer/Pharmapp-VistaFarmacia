<?php 



ConfirmarCompra($_GET['no'],$_GET['usu'],$_GET['fech'],$_GET['idmed'],$_GET['canti'],$_GET['pre']);

function ConfirmarCompra($no,$usu,$fech,$idmed,$canti,$pre){

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
        if($ver['idpedido'] == $no )
        {
           

            $arreglo = $ver['medicamentosid'];
            $arreglo= explode(';',$arreglo);
            
            $longitud = count($arreglo);
 

            $arreglocantidad = $ver['cantidades'];
            $arreglocantidad= explode(';',$arreglocantidad);
            
            $numero=0;
            for($i=0; $i<$longitud; $i++)
            {

                $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            
                if($mysqli->connect_error) {
                die("error de conexion"); 
                }
                else{
                #echo "conexion exitosa";
                }
            
                $medicamento=$arreglo[$i];

                $cant = $arreglocantidad[$i];


                $cons = "SELECT * FROM medicamentos WHERE medicamentoID='".$medicamento."'";
                $result3 = $mysqli->query($cons);

                if ($result3->num_rows > 0) {
                  // output data of each row
                  while($row = $result3->fetch_assoc()) {
                    $stock =  $row["stock"];

                    if($stock < $cant ){
                        $numero = 1 + $numero;
    
                    }

                  }
                } 
                
            
            
            }

            if($numero == 0)
            {
              
                $bajostock="";

                 for($i=0; $i<$longitud; $i++)
                 {

                     $sql = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            
                     if($sql->connect_error) {
                     die("error de conexion"); 
                     }
                    else{
                     #echo "conexion exitosa";
                     }
                     $medicamento=$arreglo[$i];

                     $query5 = "SELECT * FROM medicamentos";
                     $res = mysqli_query($sql,$query5);
              
                        while($ver5=mysqli_fetch_array($res))
                        {
                            if($ver5['medicamentoID'] == $medicamento )
                            {
                                if($ver5['stock']-$arreglocantidad[$i] < $ver5['stockminimo']){
                                    
                                    $cadena =str_replace(' ', '', $ver5['nombre']);
                                    $bajostock=$cadena.','.$bajostock;
                                }
                            }
                        }



            
                     $query = "UPDATE medicamentos SET stock=stock-$arreglocantidad[$i] WHERE medicamentoID='".$medicamento."'";
                     $resul = $mysql->query($query);
            
                 }

                 if($bajostock != ""){
                    echo '<script language="javascript">
                    alert("Hay productos que estan por debajo del minimo de stock: '.$bajostock.'");
                  </script>';

                }

                 $mysqli2 = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                 $consu2="UPDATE ordenes SET estado='Confirmado' WHERE idpedido='".$no."'";
                    
                 $resultado3=$mysqli2->query($consu2);

                 $query2 = "DELETE FROM pedidos WHERE idpedido='".$no."'";
                 $resul2 = $mysql->query($query2);
                 //echo $bajostock;
                 echo '<script language="javascript">
                 alert("Pedido confirmado");
            

            
               </script>';
     

            }


            else{

                echo '<script language="javascript"> 

                       alert("No hay stock suficiente");
                </script>';

               

            }

            
        }

    }

}


?>

<script type="text/javascript">
  
    window.location.href="pedidofarmaceutico.php";
</script>