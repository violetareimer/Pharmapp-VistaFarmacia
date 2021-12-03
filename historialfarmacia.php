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
<form style="text-align: right;" action='Excel.php' method='POST'><input type='submit' name ='submit' Value='Exportar a Excel'></form>
<div class="row justify-content-center">
     <h1 class="display-3">Historial de pedidos:</h1>
      <br>
    </div>
    
    <br>
    <br>
    <div  style="text-align: center;" class="form-1-2">
      <label for="caja_busqueda">Buscar:</label>
      <input type="text" name="caja_busqueda" id="caja_busqueda" >
    
    </input>
     
    </div>
    <br>

    <div class="row justify-content-center">


    <br>
    <br>
    <br>
    
    <div id="datos">


    </div>

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="main.js"></script>




</div>
</body>



</html>

