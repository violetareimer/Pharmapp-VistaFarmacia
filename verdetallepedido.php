<?php

ConfirmarStock($_GET['no']);

function ConfirmarStock($no){
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
    <title>Detalle pedido</title>
    <style>
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
        }

        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }

        /* Add Animation */
        .modal-content {  
            -webkit-animation-name: zoom;
            -webkit-animation-duration: 0.6s;
            animation-name: zoom;
            animation-duration: 0.6s;
            }

            @-webkit-keyframes zoom {
            from {-webkit-transform:scale(0)} 
            to {-webkit-transform:scale(1)}
            }

            @keyframes zoom {
            from {transform:scale(0)} 
            to {transform:scale(1)}
        }

        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

    </style>
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

<a href="pedidofarmaceutico.php"><button type='button' class='btn btn-info'>Volver</button></a>

            <div class="row justify-content-center">
                <h1 class="display-3">Detalle pedido:</h1>
                <br>
            </div>
            <br>
            <br>

            
            <div class="row justify-content-center" >


                            <span class="border" style="padding:2%; background-color:white">

                                    <div class="row">

                                                <div class="col">
                                                    <b><label>ID:</label></b>
                                                    <p><?php  echo $ver['idpedido']; ?></p>
                                                </div>
                                                
                                                <div class="col">
                                                    <b><label>fecha:</label></b>
                                                    <p><?php  echo $ver['fecha']; ?></p>
                                                </div>

                                

                                    </div>

                                    <div class="row">

                                                <div class="col">
                                                    <b><label>nombre:</label></b>
                                                    <p><?php  echo $ver['nombrecomprador']; ?></p>
                                                </div>
                                                
                                                <div class="col">
                                                    <b><label>usuario:</label></b>
                                                    <p><?php  echo $ver['usuariocomprador']; ?></p>
                                                </div>

                                                <div class="col">
                                                    <b><label>Obra social:</label></b>
                                                    <p><?php  echo $ver['obrasocial']; ?></p>
                                                </div>

                                    </div>

                                    <div class="row">

                                                <div class="col">
                                                    <b> <label>Direccion:</label></b>
                                                    <p><?php  echo $ver['direccion']; ?></p>
                                                </div>

                                    </div>

                                    <div class="row">
                                                <div class="col">
                                                    <b>  <label>Medicamentos:</label></b>
                                                    <br>

                                                            <?php 

                                                                $array = $ver['medicamentosid'];
                                                                $array= explode(';',$array);

                                                                $longitud = count($array);

                                                                //Recorro todos los elementos

                                                                for($i=0; $i<$longitud; $i++)
                                                                {


                                                                //saco el valor de cada elemento
                                                                    $query2 = 'SELECT * FROM medicamentos';
                                                                    $resul2=mysqli_query($mysql,$query2);
                                                                    while($mostrar2=mysqli_fetch_array($resul2))
                                                                    {
                                                                        if($mostrar2['medicamentoID'] == $array[$i])
                                                                        {
                                                                            echo "-";
                                                                            echo $mostrar2['nombre'];
                                                                            echo "  ,";

                                                                            $arraycantidad = $ver['cantidades'];
                                                                            $arraycantidad= explode(';',$arraycantidad);


                                                                            echo "Cantidad comprada: $arraycantidad[$i]";
                                                                            echo "<br>";
                                                                        }
                                                                        
                                                                    }

                                                                }

                                                            ?> 
                                                </div>
                                    </div>
                                    <br>

                                    <div class="row">

                                        <div class="col">
                                            <?php $data3 = bcdiv($ver['preciototal'], '1', 2);?>
                                            <b> <label>Precio Total:</label></b>
                                            <p><?php  echo "$ $data3"; ?></p>
                                        </div>

                                    </div>

                                    <div class="row">
                                        
                                            <div class="col">
                                                    <b><label>Receta:</label></b>
                                                    <br>
                                                    <?php 

                                                        $array = $ver['idpedido'];
                                                            $i=0; 
                                                            $query2 = 'SELECT * FROM recetas';
                                                            $resul2=mysqli_query($mysql,$query2);
                                                            while($mostrar2=mysqli_fetch_array($resul2))
                                                            {
                                                                if($ver['idpedido'] == $mostrar2['idpedido'])
                                                                {
                                                                $i=$i+1; 
                                                                ?>
                                                                <img src="<?php  echo $mostrar2['foto']; ?>" id="<?php echo $i ?>" width="100" height="100"/>
                                                                
                                                                <div id="myModal<?php echo $i ?>" class="modal">
                                                                    <span class="close" id="cerrar<?php echo $i ?>">&times;</span>
                                                                    <img class="modal-content" id="img<?php echo $i ?>">
                                                                </div>
                                                                <script>

                                                                    var modal = document.getElementById("myModal<?php echo $i ?>");

                                                                    
                                                                    var img = document.getElementById("<?php echo $i?>");
                                                                    var modalImg = document.getElementById("img<?php echo $i ?>");
                                                                    img.onclick = function(){
                                                                    modal.style.display = "block";
                                                                    modalImg.src = "<?php  echo $mostrar2['foto'] ?>";
                                                                    }

                                                                    
                                                                    var span = document.getElementById("cerrar<?php echo $i ?>");

                                                                    
                                                                    span.onclick = function() { 
                                                                    modal.style.display = "none";
                                                                    }

                                                                </script>
                                                                
                                                                <?php

                                                                }
                                                                
                                                            }
                                                            if($i == 0){
                                                                ?>
                                                                <p>No hay recetas adjuntas a este pedido</p>
                                                                <?php
                                                            }
                                                        ?> 
                                                    

                                            </div>

                                    </div>
                                    <br>
                                <div class="row">
                                <div class="col">
                                  <?php echo "<a href='confirmarcompra.php?no=".$ver['idpedido']."&&usu=".$ver['usuariocomprador']."&&fech=".$ver['fecha']."&&idmed=".$ver['medicamentosid']."&&canti=".$ver['cantidades']."&&pre=".$data3."'> <button type='button' class='btn btn-success'>Confirmar</button> </a> "; ?>
                                </div>
                                <div class="col">
                                    <?php echo "<a href='cancelardetalle.php?no=".$ver['idpedido']."'> <button type='button' class='btn btn-danger'>Cancelar</button> </a>"; ?>   

                                </div>   
                            </div>     
                            </span>
                            <br>
                               


            </div>



<?php
        }

    }
}
?>


</body>
</html>