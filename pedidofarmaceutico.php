<?php
session_start();
if(isset($_SESSION['nombredelusuario'])){
   $usuarioingresado = $_SESSION['nombredelusuario'];
   ##echo "<h1>Bienvenid: $usuarioingresado</h1>";
}
else {
  header('location: loginfarmacia.php');
}
if(isset($_POST['btncerrar'])){
  session_destroy();
  header('location: loginfarmacia.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Pedidos</title>
</head>
<body style="background-color:#EEEEEE">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">PHARMAPP</a> 
  <img src="logo.png" width="50"
     height="50">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="pedidofarmaceutico.php">Inicio <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="muestrastock.php">Stock Disponible</a>
      <a class="nav-item nav-link" href="cargarstock.php">Nuevo Producto</a>
      <a class="nav-item nav-link" href="historialfarmacia.php">Historial de pedidos</a>
    </div>
  </div>
</nav>

<form method="POST">
  <button class="btn btn-dark" type="submit" value="Cerrar Sesion" name="btncerrar" style="float: right;">Cerrar Sesion</button>
</form>

    <div class="row justify-content-center">
     <h1 class="display-3">Pedidos disponibles:</h1>
      <br>
    </div>
    <br>
    <br>
<div class="row justify-content-center">
<table class="table" style="width:95%">
<thead class="thead-dark">
    <tr>
        <th scope="col">Numero de Pedido</th>
        <th scope="col">Fecha</th>
        <th scope="col">Nombre Cliente</th>
        <th scope="col">Usuario</th>
        <th scope="col">Obra Social</th>
        <th scope="col">Direccion</th>
        <th scope="col">Medicamentos pedidos</th>
        <th scope="col">Precio Total</th>
        <th colspan="3">Estado</th>


    </tr>
</thead>

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
        
        $query = 'SELECT * FROM pedidos';
        
        $resul=mysqli_query($mysql,$query);
        while($mostrar=mysqli_fetch_array($resul)){
        
        ?>


    <tbody style="background-color:#FFFFFF">
        <tr>

            <th scope="row" class="data"><?php echo $mostrar['idpedido']?> </th>
            <td><?php echo $mostrar['fecha']?> </td>
            <td><?php echo $mostrar['nombrecomprador']?> </td>
            <td><?php echo $mostrar['usuariocomprador']?> </td>
            <td><?php echo $mostrar['obrasocial']?> </td>
            <td><?php echo $mostrar['direccion']?> </td>
            <td ><?php 

                            $array = $mostrar['medicamentosid'];
                            $array= explode(';',$array);
                            
                            $longitud = count($array);
                 
                            //Recorro todos los elementos
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
                                        echo $mostrar2['nombre'];
                                        echo "  ,";

                                        $arraycantidad = $mostrar['cantidades'];
                                        $arraycantidad= explode(';',$arraycantidad);
     

                                        echo "Cantidad comprada: $arraycantidad[$i]";
                                        echo "<br>";

                                        $stringbd=$stringbd.$mostrar2['nombre']."x".$arraycantidad[$i].",";

                                    }
                                   
                                  
                                 }

                               
          
                              }

                            
                             

            //echo $mostrar2['medicamentosid']?> </td>
            <?php $data3 = bcdiv($mostrar['preciototal'], '1', 2);?>
            <td><?php echo "$ $data3"; ?></td>


            
            <?php echo "<td>  <a href='verdetallepedido.php?no=".$mostrar['idpedido']."'>  <button type='button' class='btn btn-outline-info'>Ver detalles</button> </td>"; ?>
            <?php echo "<td> <a href='confirmarcompra.php?no=".$mostrar['idpedido']."&&usu=".$mostrar['usuariocomprador']."&&fech=".$mostrar['fecha']."&&idmed=".$mostrar['medicamentosid']."&&canti=".$mostrar['cantidades']."&&pre=".$data3."'> <button type='button' class='btn btn-success'>Confirmar Pedido</button> </a> </td>"; ?>
           <?php echo "<td><a href='cancelardetalle.php?no=".$mostrar['idpedido']."'> <button type='button' class='btn btn-danger'>Cancelar Pedido</button> </a> </td>"; ?>   
           



        </tr>

    <?php

        }
    
     ?> 
     </tbody>
    </table>
    </div>

</body>
</html>