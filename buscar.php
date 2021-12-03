<?php     
        define('DB_HOST','localhost');
        define('DB_USER','root');
        define('DB_PASS','');
        define('DB_NAME','medicamentos_android');

        $mysql = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
       
        $salida="";

        $query = "SELECT * FROM ordenes WHERE estado='Confirmado' ORDER BY idpedido DESC";

        if($mysql->connect_error) {
        die("error de conexion"); 
         }
        else{
         #echo "conexion exitosa";
        }

        if(isset($_POST['consulta'])){
            $q = $mysql->real_escape_string($_POST['consulta']);
            $query = "SELECT * FROM ordenes WHERE usuario LIKE '%".$q."%' OR fecha LIKE '%".$q."%' OR medicamentosid LIKE '%".$q."%' OR obrasocial LIKE '%".$q."%' AND estado='Confirmado'";

        }
        
        $resultado =$mysql->query($query);

        if($resultado->num_rows >0){
            $salida.="
                        <table id='datatodisplay' class='table' style='width:95%'>
                        <thead class='thead-dark'>
                            <tr>
                                <th scope='col'>Numero de Pedido</th>
                                <th scope='col'>Fecha</th>
                                <th scope='col'>Nombre Usuario</th>
                                <th scope='col'>Medicamentos pedidos</th>
                                <th scope='col'>Obra social</th>
                                <th scope='col'>Precio Total</th>
                        
                            </tr>
                        </thead>
                        <tbody style='background-color:#FFFFFF'>

            ";
            $totalgastado=0;
            while($mostrar=$resultado->fetch_assoc()){
                $data3 = bcdiv($mostrar['preciototal'], '1', 2);
                $borrocoma=substr($mostrar['medicamentosid'], 0, -1);
                $salida.="
                          <tr>

                                <th scope='row' class='data'>".$mostrar['idpedido']."</th>
                                <td>".$mostrar['fecha']."</td>
                                <td>".$mostrar['usuario']."</td>
                                <td>".$borrocoma." </td>
                                <td>".$mostrar['obrasocial']."</td>
                                <td>".$data3."</td>    

                            </tr> ";

                          $totalgastado=$totalgastado+$data3;
            }


            $salida.="Total acumulado hasta el momento: $".$totalgastado;
            
            $salida.="</tbody></table>";





        }else{
            ?>
            <br>
            <br>
            <br>
            <?php

            $salida.="No hay datos encontrados!!!";


        }


        echo $salida;

        $mysql->close();
        ?>



