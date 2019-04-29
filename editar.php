<?php
//echo 'editar.php?id=1&ropa=otro 
//ropa&zapatos=otra zapatos';
//echo '<br>';
$id = $_GET['id'];
$ropa = $_GET['ropa'];
$zapatos = $_GET['zapatos'];
echo $id;
echo '<br>';
echo $ropa;
echo '<br>';
echo $zapatos;
//un Update
include_once 'app.php';
$sql_editar = 'UPDATE cam_tienda_tabla SET ropa=?,zapatos=? WHERE id=?';
$sentencia_editar = $pdo->prepare($sql_editar);
$sentencia_editar->execute(array($ropa,$zapatos,$id));
//conexión de la base de datos se cierra
$pdo = null;
$sentencia_editar = null;
// 
header('location:index.php'); 
?>