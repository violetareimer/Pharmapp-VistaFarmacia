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


$stmt = $conn->prepare("SELECT medicamentoID, nombre, comprimido, stock, precio, imagen, receta FROM medicamentos;");

$stmt->execute();

$stmt->bind_result($id, $nombre, $comprimido, $stock, $precio, $imagen, $receta);

$medicamen = array();

while($stmt->fetch()){
$temp = array();
$temp['medicamentoID'] = $id;
$temp['nombre'] = $nombre;
$temp['comprimido'] = $comprimido;
$temp['stock'] = $stock;
$temp['precio'] = $precio;
$temp['imagen'] = $imagen;
$temp['receta'] = $receta;
array_push($medicamen, $temp);
}

echo json_encode($medicamen);

