<?php


define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','medicamentos_android');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (mysqli_connect_errno()) {
echo "Fallo al conectar con MySQL: " . mysqli_connect_error();
die(); 
}

$usuario=$_GET['usuario'];

$stmt = $conn->prepare("SELECT idorden, idpedido, usuario, estado, fecha, medicamentosid, cantidades, preciototal,motivo FROM ordenes WHERE usuario='".$usuario."' ORDER BY idpedido DESC;");

$stmt->execute();

$stmt->bind_result($idorden, $idpedido, $usuario, $estado, $fecha, $medicamentosid, $cantidades,$preciototal,$motivo);

$orden = array();

while($stmt->fetch()){
$temp = array();
$temp['idorden'] = $idorden;
$temp['idpedido'] = $idpedido;
$temp['usuario'] = $usuario;
$temp['estado'] = $estado;
$temp['fecha'] = $fecha;
$temp['medicamentosid'] = $medicamentosid;
$temp['cantidades'] = $cantidades;
$temp['preciototal'] = $preciototal;
$temp['motivo'] = $motivo;
array_push($orden, $temp);
}

echo json_encode($orden);

