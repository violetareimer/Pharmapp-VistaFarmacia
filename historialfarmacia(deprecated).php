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
    <title>Stock:</title>
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

<div class="row justify-content-center">
     <h1 class="display-3">Historial de pedidos:</h1>
      <br>
    </div>
    <br>
    <br>
    <div class="row justify-content-center">

    <div class="form-1-2">
      <label for="caja_busqueda">Buscar:</label>
      <input type="text" name="caja_busqueda" id="caja_busqueda" ></input>
    </div>
    
    <div id="datos">
    <table class="table" style="width:95%">
<thead class="thead-dark">
    <tr>
        <th scope="col">Numero de Pedido</th>
        <th scope="col">Fecha</th>
        <th scope="col">Nombre Usuario</th>
        <th scope="col">Estado</th>
        <th scope="col">Medicamentos pedidos</th>
        <th scope="col">Obra social</th>
        <th scope="col">Precio Total</th>


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
        
        $query = 'SELECT * FROM ordenes WHERE estado="Confirmado" ORDER BY idpedido DESC';
        
        $resul=mysqli_query($mysql,$query);
        while($mostrar=mysqli_fetch_array($resul)){
        
        ?>


    <tbody style="background-color:#FFFFFF">
        <tr>

            <th scope="row" class="data"><?php echo $mostrar['idpedido']?> </th>
            <td><?php echo $mostrar['fecha']?> </td>
            <td><?php echo $mostrar['usuario']?> </td>
            <td><?php echo $mostrar['estado']?> </td>
            <td><?php echo $mostrar['medicamentosid']?> </td>
            <td><?php echo $mostrar['obrasocial']?> </td>
            <?php $data3 = bcdiv($mostrar['preciototal'], '1', 2);?>
            <td><?php echo "$ $data3"; ?></td>               

        </tr>

    <?php

        }
    
     ?> 
     </tbody>
    </table>
      </div>



    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/main.js"></script>


</body>



</html>

