<?php


if(isset($_POST['submit']))
{



//establecemos el timezone para obtener la hora local
date_default_timezone_set('America/Argentina/Buenos_Aires');
 
//la fecha y hora de exportación sera parte del nombre del archivo Excel
$fecha = date("d-m-Y H:i:s");
 
//Inicio de exportación en Excel
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=Historial_$fecha.xls"); //Indica el nombre del archivo resultante
header("Pragma: no-cache");
header("Expires: 0");



define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','medicamentos_android');

$mysql = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);


$query = "SELECT * FROM ordenes WHERE estado='Confirmado' ORDER BY idpedido DESC";

if($mysql->connect_error) {
die("error de conexion"); 
 }
else{
 #echo "conexion exitosa";
}


$resultado =$mysql->query($query);

if($resultado->num_rows >0){
    echo 
    "
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

    while($mostrar=$resultado->fetch_assoc()){
        $data3 = bcdiv($mostrar['preciototal'], '1', 2);
        $borrocoma=substr($mostrar['medicamentosid'], 0, -1);
        echo
              "
                  <tr>

                        <th scope='row' class='data'>".$mostrar['idpedido']."</th>
                        <td>".$mostrar['fecha']."</td>
                        <td>".$mostrar['usuario']."</td>
                        <td>".$borrocoma." </td>
                        <td>".$mostrar['obrasocial']."</td>
                        <td>".$data3."</td>    

                    </tr> ";

                
    }
    echo
        "</tbody></table>";





}else{


   
}


}

$mysql->close();
?>

