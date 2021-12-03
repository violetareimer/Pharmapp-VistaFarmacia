<?php

ConfirmarStock($_GET['no']);

function ConfirmarStock($no){
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
    </div>
  </div>
</nav>

<div class="row justify-content-center">
     <h1 class="display-3">Modificacion:</h1>
      <br>
    </div>
    <br>
    <br>

    <div class="row justify-content-center">


<div class="row justify-content-center">


    <form name="fvalida" action="actualizarphp.php" method="POST" onsubmit="return validacion()">

        <div class="form row">
            
                        <div class="col-md-4 mb-3">
                            <label>ID:</label>
                            <input type="text" class="form-control" id="medicamentoID" name="medicamentoID" value="<?php  echo $ver['medicamentoID']; ?>" readonly="readonly">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php  echo $ver['nombre']; ?> ">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Comprimido:</label>
                            <input type="text" min="0"  class="form-control" id="comprimido" name="comprimido"  value="<?php  echo $ver['comprimido']; ?>" required>
                        </div>
        </div>

        <div class="form row">


                        <div class="col-md-3 mb-3">
                            <label>Stock:</label>
                            <input type="text"  min="0" class="form-control" id="stock" name="stock" value="<?php  echo $ver['stock']; ?>" required>
                        </div>
                        
                        <div class="col-md-3 mb-3">
                            <label>Stock Minimo:</label>
                            <input type="text"  min="0" class="form-control" id="stockminimo" name="stockminimo" value="<?php  echo $ver['stockminimo']; ?>" required>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label>Precio:</label>
                            <input type="text" min="0"  class="form-control" id="precio" name="precio" value="<?php echo $ver['precio']; ?>" required>
                        </div>

                        <div class="col-md-8 mb-6">
                            <label>Imagen:</label>
                            <input type="url" class="form-control" id="imagen" name="imagen" value="<?php  echo $ver['imagen']; ?>" required>
                        </div>


                        <div class="col-md-3 mb-3">
                                <label>Receta:</label>

                                <select  class="form-control"  name="receta" id="opera" required>
                                        <?php 
                                            if($ver['receta']==1){
                                                ?>
                                                <option selected value="1">Requiere</option>
                                                <option value="0">No requiere</option>
                                                <?php
                                            }else{
                                                ?>
                                                <option value="1">Requiere</option>
                                                <option selected value="0">No requiere</option>
                                                <?php

                                            }
                                        
                                        ?>

                                </select>	
                        </div>
        </div>



        <button type="submit" class="btn btn-primary mb-2">Confirmar Modificacion</button>
    </form>


</div>





<?php
        }

    }
}
?>
    <script>
        function validacion (){
            var validar = true;
            precio= document.getElementById("precio").value;
            stock= document.getElementById("stock").value;
            comprimido= document.getElementById("comprimido").value;

                if (esNumero (precio)){
                   // resultado.innerText = ("La cadena de caracteres es NUMÉRICA: " + parseFloat(dato).toFixed(2));
                    

                }else{
                    alert("Agregue un dato de tipo numero o en caso de ser decimal agregarlo con coma");
                    validar=false;
                }

                if (esEntero (comprimido)){
                   // resultado.innerText = ("La cadena de caracteres es NUMÉRICA: " + parseFloat(dato).toFixed(2));
                    

                }else{
                    alert("Agregue un dato de tipo entero");
                    validar=false;
                }

                if (esEntero (stock)){
                   // resultado.innerText = ("La cadena de caracteres es NUMÉRICA: " + parseFloat(dato).toFixed(2));

                }else{
                    alert("Agregue un dato de tipo entero");
                    validar=false;
                }

                return validar;
            
        }
        function esNumero (precio){
            /*Definición de los valores aceptados*/
            var valoresAceptados = /^[0-9]+$/;
            if (precio.indexOf(".") === -1 ){
                if (precio.match(valoresAceptados)){
                   return true;
                }else{
                   return false;
                }
            }else{
                //dividir la expresión por el punto en un array
                var particion = precio.split(".");
                //evaluamos la primera parte de la división (parte entera)
                if (particion[0].match(valoresAceptados) || particion[0]==""){
                    if (particion[1].match(valoresAceptados)){
                        return true;
                    }else {
                        return false;
                    }
                }else{
                    return false;
                }
            }
        }

        function esEntero (stock){
            /*Definición de los valores aceptados*/
            var valoresAceptados = /^([0-9])*$/;
                if (stock.match(valoresAceptados)){
                   return true;
                }else{
                   return false;
                }
            
        }

       // pattern="[0-9]+(\,[0-9]{1,2})?%?"
       // pattern="^[0-9]{0,12}([,][0-9]{2,2})?$"
    </script>

</body>
</html>