
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
    <title>Inicio sesion</title>
</head>
<body>
    <div class="row justify-content-center">
        
       
    <div>

    <div style="text-align: center;"><img src="logo.png"  width="200" height="200" ></div>
        
    <div class="row justify-content-center">
        <h1 class="display-3">Inicie Sesion</h1>
                <br>
    </div>

        <br>
   <div class="row justify-content-center" style="padding-top:10%">

   <form method="POST">

            <div class="form-floating mb-3">
            <label for="floatingInput">User name</label>
            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Username" required>
            
            </div>
            <div class="form-floating">
            <label for="floatingPassword">Password</label>
            <input type="password" class="form-control" id="contraseña" name="contraseña" placeholder="Password" required>
           
            </div>

    </div>
    <br>
    <div style="text-align: center;">
    <button name="btningresar" type="submit" class="btn btn-info">Iniciar Sesion</button>
    </div>
    </form>
    
</body>
</html>
<?php
session_start();
if(isset($_SESSION['nombredelusuario'])){
    header('location:pedidofarmaceutico.php');
}


if(isset($_POST['btningresar'])){ 
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','medicamentos_android');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (mysqli_connect_errno()) {
echo "Fallo al conectar con MySQL: " . mysqli_connect_error();
die(); 
}

$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];

$query=mysqli_query($conn,"SELECT * FROM usuariofarmacia WHERE usuario='".$usuario."' AND contraseña='".$contraseña."'");
$nr=mysqli_num_rows($query);

if(!isset($_SESSION['nombredelusuario'])){



if($nr == 1){
    $_SESSION['nombredelusuario']=$usuario;
    header("location:pedidofarmaceutico.php");
}
else if($nr ==0 ){
    echo "<script> alert('El usuario no existe');
    window.location='loginfarmacia.php'; </script>";
}
}
}
?>