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
     <h1 class="display-3">Agregue un nuevo producto:</h1>
      <br>
    </div>
    <br>
    <br>
    <div class="row justify-content-center">


<form  action="nuevoproducto.php" method="POST">

    <div class="form row">
        
                    <div class="col-md-4 mb-3">
                        <label>Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Comprimido:</label>
                        <input type="number" min="0" class="form-control" id="comprimido" name="comprimido" required>
                    </div>
    </div>

    <div class="form row">

                    <div class="col-md-3 mb-3">
                        <label>Stock:</label>
                        <input type="number" min="0" class="form-control" id="stock" name="stock" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Stock Minimo:</label>
                        <input type="number" min="0" class="form-control" id="stockminimo" name="stockminimo" required>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label>Precio:</label>
                        <input type="number" step="any" min="0"  class="form-control" id="precio" name="precio" required>
                    </div>

                    <div class="col-md-8 mb-6">
                        <label>Imagen:</label>
                        <input type="text" class="form-control" id="imagen" name="imagen" required>
                    </div>

                    <div class="col-md-3 mb-3">

                        <label>Receta:</label>

                        <select  class="form-control"  name="receta" id="opera" required>
                          <option value="1">Requiere</option>
                          <option value="0">No requiere</option>
                        </select>						

                 

                    </div>


    </div>



    <button type="submit" class="btn btn-primary mb-2">Crear Producto</button>
</form>


</div>







</body>
</html>